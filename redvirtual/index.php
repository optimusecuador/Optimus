<?php
$conn = new mysqli("localhost", "root", "", "optimus_global_telecom");
if ($conn->connect_error) { die("Error de conexión: " . $conn->connect_error); }

if (isset($_GET['buscar'])) {
    $busqueda = $conn->real_escape_string($_GET['buscar']);
    $sql = "SELECT nombres, numero FROM contratos WHERE nombres LIKE '%$busqueda%'";
    $result = $conn->query($sql);
    $resultados = [];
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { $resultados[] = $row; }
    }
    header('Content-Type: application/json');
    echo json_encode($resultados);
    exit;
}

if (isset($_GET['cargar_archivo'])) {
    $archivo = $_GET['cargar_archivo'] . ".json";
    if (file_exists($archivo)) { echo file_get_contents($archivo); }
    else { echo json_encode(["elementos" => [], "conexiones" => []]); }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['archivo_nombre'])) {
        file_put_contents($data['archivo_nombre'] . ".json", json_encode($data));
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Red</title>
    <style>
        body { display: flex; font-family: 'Segoe UI', sans-serif; height: 100vh; margin: 0; background: #eef2f5; overflow: hidden; }
        #sidebar { width: 280px; background: #2c3e50; color: white; padding: 20px; overflow-y: auto; }
        #canvas-container { flex-grow: 1; position: relative; margin: 20px; background: #ffffff; border: 4px solid #34495e; border-radius: 10px; overflow: auto; display: flex; flex-direction: column; }
        #zoom-wrapper { width: 3000px; height: 3000px; transform-origin: 0 0; transition: transform 0.1s; }
        #canvas { width: 100%; height: 100%; position: relative; }
        #capa-lineas { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
        
        .equipo { width: 150px; text-align: center; padding: 10px; border-radius: 10px; background: white; border: 1px solid #ddd; position: absolute; cursor: move; user-select: none; z-index: 5; }
        .texto-nodo { width: 140px; text-align: center; padding: 10px; border: 1px dashed #95a5a6; background: #f9f9f9; position: absolute; cursor: move; user-select: none; z-index: 5; }
        
        .equipo img { width: 50px; height: 50px; pointer-events: none; }
        .info-txt { font-size: 9px; color: #555; text-align: left; margin: 5px 0; }
        .int-row { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; font-size: 10px; }
        .controls-bar { display: flex; gap: 5px; justify-content: center; margin-top: 5px; }
        
        .btn-mini { border-radius: 50%; width: 20px; height: 20px; cursor: pointer; font-size: 14px; text-align: center; line-height: 18px; color: white; border: none; }
        .btn-plus { background: #27ae60; }
        .btn-minus { background: #e74c3c; }
        .btn-eliminar { position: absolute; top: -8px; right: -8px; background: #e74c3c; color: white; border-radius: 50%; width: 20px; height: 20px; cursor: pointer; font-size: 12px; text-align: center; line-height: 20px; z-index: 10; }
        .disp-item { background: #34495e; padding: 8px; margin-bottom: 5px; border-radius: 4px; cursor: pointer; font-size: 12px; border: 1px solid #455a64; }
        line { cursor: pointer; stroke-width: 6; }
        .btn-descargar { background: #2980b9; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .btn-descargar:hover { background: #3498db; }
    </style>
</head>
<body>
<div id="sidebar">
    <button onclick="toggleConexion()" id="btn-conectar" style="width:100%; padding:10px; cursor:pointer; margin-bottom:15px;">🔗 Activar Conectar</button>
    <select id="tipo-conexion" style="width:100%;"><option value="cable">Cable</option><option value="wifi">Wi-Fi</option><option value="fibra">Fibra Óptica</option></select>
    <input type="color" id="color-linea" value="#27ae60" style="width:100%; margin: 10px 0;">
    <div id="lista-dispositivos">
        <?php $d = ["PC", "Texto", "Router_ISP", "ONU", "Mikrotik_Hex", "Switch_L2", "Switch_L3", "Access_Point", "Router_Mesh", "Repetidor_WiFi", "Smart_TV", "Impresora_Red", "Servidor_NAS", "Camara_IP", "NVR", "Telefono_IP", "Tableta", "Smartphone", "Laptop", "Firewall", "Sensor_IoT"];
        foreach($d as $item) echo "<div class='disp-item' onclick=\"agregarDispositivo('$item')\">$item</div>"; ?>
    </div>
</div>
<div id="canvas-container">
    <div style="padding:15px; border-bottom: 1px solid #ddd; display: flex; gap: 10px; align-items: center;">
        <input type="text" id="txt-busqueda" placeholder="Buscar nombre...">
        <button onclick="buscarRegistros()">Buscar</button>
        <button class="btn-descargar" onclick="descargarJSON()">📥 Descargar JSON</button>
        <div id="resultado-seleccionado" style="font-weight: bold; color: #2c3e50;"></div>
        <div id="lista-resultados" style="position: absolute; top: 55px; background: white; z-index: 100; box-shadow: 0 4px 6px rgba(0,0,0,0.1);"></div>
    </div>
    <div id="zoom-wrapper"><div id="canvas" ondrop="drop(event)" ondragover="allowDrop(event)"><svg id="capa-lineas"></svg></div></div>
</div>

<script>
    let modoConexion = false, nodoOrigen = null, conexiones = [], zoom = 1, clienteSeleccionado = null;

    async function cargarEstado(nombreArchivo) {
        let res = await fetch('?cargar_archivo=' + encodeURIComponent(nombreArchivo));
        let data = await res.json();
        document.querySelectorAll('.equipo, .texto-nodo').forEach(n => n.remove());
        conexiones = data.conexiones || [];
        (data.elementos || []).forEach(d => {
            if(d.type === 'pc') crearNodo(d.id, d.left, d.top, d.label, d.interfaces, d.tipoBase);
            else crearNodoTexto(d.id, d.left, d.top, d.label);
        });
        dibujarLineas();
    }

    async function sync() {
        if (!clienteSeleccionado) return;
        let elementos = [];
        document.querySelectorAll('.equipo, .texto-nodo').forEach(el => {
            elementos.push({ id: el.id, type: el.classList.contains('equipo') ? 'pc' : 'text', tipoBase: el.getAttribute('data-tipo'), left: el.style.left, top: el.style.top, label: el.querySelector('.label') ? el.querySelector('.label').innerText : el.innerText.replace('×',''), interfaces: el.querySelector('.info-txt') ? el.querySelector('.info-txt').innerHTML : "" });
        });
        await fetch('index.php', { method: 'POST', body: JSON.stringify({ archivo_nombre: clienteSeleccionado, elementos, conexiones }), headers: {'Content-Type': 'application/json'} });
    }

    function descargarJSON() {
        let elementos = [];
        document.querySelectorAll('.equipo, .texto-nodo').forEach(el => {
            elementos.push({ 
                id: el.id, 
                type: el.classList.contains('equipo') ? 'pc' : 'text', 
                tipoBase: el.getAttribute('data-tipo'), 
                left: el.style.left, 
                top: el.style.top, 
                label: el.querySelector('.label') ? el.querySelector('.label').innerText : el.innerText.replace('×',''), 
                interfaces: el.querySelector('.info-txt') ? el.querySelector('.info-txt').innerHTML : "" 
            });
        });

        let dataGuardar = {
            archivo_nombre: clienteSeleccionado || "red_config",
            elementos: elementos,
            conexiones: conexiones
        };

        let jsonStr = JSON.stringify(dataGuardar, null, 2);
        let blob = new Blob([jsonStr], { type: "application/json" });
        let url = URL.createObjectURL(blob);
        let a = document.createElement("a");
        
        let nombreDescarga = (clienteSeleccionado ? clienteSeleccionado : "red_config") + ".json";
        a.href = url;
        a.download = nombreDescarga;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }

    function dibujarLineas() {
        let svg = document.getElementById('capa-lineas');
        svg.innerHTML = "";
        conexiones.forEach((c, i) => {
            let o = document.getElementById(c.from), d = document.getElementById(c.to);
            if(o && d) {
                let l = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                l.setAttribute('x1', parseInt(o.style.left)+75); l.setAttribute('y1', parseInt(o.style.top)+75);
                l.setAttribute('x2', parseInt(d.style.left)+75); l.setAttribute('y2', parseInt(d.style.top)+75);
                l.setAttribute('stroke', c.color);
                l.onclick = () => { conexiones.splice(i, 1); sync(); dibujarLineas(); };
                svg.appendChild(l);
            }
        });
    }

    async function buscarRegistros() {
        let res = await fetch('?buscar=' + encodeURIComponent(document.getElementById('txt-busqueda').value));
        let data = await res.json();
        let lista = document.getElementById('lista-resultados');
        lista.innerHTML = "";
        data.forEach(item => {
            let div = document.createElement('div');
            div.className = 'res-item';
            div.style.padding = '8px'; div.style.cursor = 'pointer';
            div.innerText = item.nombres + " (" + item.numero + ")";
            div.onclick = () => {
                clienteSeleccionado = item.nombres + "." + item.numero;
                document.getElementById('resultado-seleccionado').innerText = "Contrato: " + item.nombres + " - " + item.numero;
                lista.style.display = 'none';

                cargarEstado(clienteSeleccionado);
            };
            lista.appendChild(div);
        });
        lista.style.display = 'block';
    }

    function allowDrop(e) { e.preventDefault(); }
    function drag(e) { e.dataTransfer.setData("text", e.target.id); e.dataTransfer.setData("offX", e.clientX - e.target.getBoundingClientRect().left); e.dataTransfer.setData("offY", e.clientY - e.target.getBoundingClientRect().top); }
    function drop(e) { e.preventDefault(); let el = document.getElementById(e.dataTransfer.getData("text")); let cr = document.getElementById('canvas').getBoundingClientRect(); el.style.left = (e.clientX - cr.left - parseFloat(e.dataTransfer.getData("offX"))) + "px"; el.style.top = (e.clientY - cr.top - parseFloat(e.dataTransfer.getData("offY"))) + "px"; dibujarLineas(); sync(); }
    function agregarDispositivo(n) { let id = n + "_" + Date.now(); if(n === "Texto") crearNodoTexto(id, "50px", "50px", "Texto"); else crearNodo(id, "50px", "50px", n, "", n); sync(); }
    
    function crearNodo(id, l, t, lb, inf, tb) {
        let el = document.createElement("div"); el.className = "equipo"; el.id = id; el.style.left = l; el.style.top = t; el.setAttribute("data-tipo", tb); el.setAttribute("draggable", "true"); el.ondragstart = drag;
        el.innerHTML = `<img src="iconos/${tb.toLowerCase().replace(/ /g, "_")}.png" onerror="this.src='iconos/default.png'"><div class="label">${lb}</div><div class="info-txt">${inf}</div><div class="controls-bar"></div>`;
        let b = document.createElement("div"); b.className = "btn-eliminar"; b.innerHTML = "×"; b.onclick = (e) => { e.stopPropagation(); el.remove(); sync(); dibujarLineas(); }; el.appendChild(b);
        let a = document.createElement("div"); a.className = "btn-mini btn-plus"; a.innerHTML = "+"; a.onclick = (e) => { e.stopPropagation(); let n = prompt("Interfaz:"), i = prompt("IP:"); if(n && i) { let r = document.createElement('div'); r.className = 'int-row'; r.innerHTML = `<span>${n}:${i}</span><div class='btn-mini btn-minus' onclick='this.parentElement.remove(); sync();'>-</div>`; el.querySelector('.info-txt').appendChild(r); sync(); } };
        el.querySelector('.controls-bar').appendChild(a); el.onclick = () => manejarClick(el.id); el.ondblclick = () => { let n = prompt("Nombre:", el.querySelector('.label').innerText); if(n) { el.querySelector('.label').innerText = n; sync(); } }; document.getElementById('canvas').appendChild(el);
    }

    function crearNodoTexto(id, l, t, tx) {
        let el = document.createElement("div"); el.className = "texto-nodo"; el.id = id; el.style.left = l; el.style.top = t; el.setAttribute("draggable", "true"); el.ondragstart = drag;
        let b = document.createElement("div"); b.className = "btn-eliminar"; b.innerHTML = "×"; b.onclick = (e) => { e.stopPropagation(); el.remove(); sync(); }; el.appendChild(b);
        let label = document.createElement("div"); label.className = "label"; label.innerText = tx; el.appendChild(label); el.onclick = () => manejarClick(el.id); el.ondblclick = () => { let n = prompt("Texto:", el.querySelector('.label').innerText); if(n) { el.querySelector('.label').innerText = n; sync(); } }; document.getElementById('canvas').appendChild(el);
    }

    function manejarClick(id) { if(!modoConexion) return; if(!nodoOrigen) { nodoOrigen = id; document.getElementById(id).style.border = "2px solid #f1c40f"; } else { conexiones.push({ from: nodoOrigen, to: id, color: document.getElementById("color-linea").value }); document.getElementById(nodoOrigen).style.border = "1px solid #ddd"; nodoOrigen = null; sync(); dibujarLineas(); } }
    function toggleConexion() { modoConexion = !modoConexion; document.getElementById("btn-conectar").style.background = modoConexion ? "#f1c40f" : "#ddd"; }
</script>
</body>
</html>