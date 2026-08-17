<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mapa KMZ con Medición y Distancias</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    
    <style>
        body { margin: 0; padding: 0; display: flex; font-family: sans-serif; }
        #panel { width: 280px; height: 100vh; overflow-y: auto; padding: 10px; background: #f4f4f4; border-right: 1px solid #ccc; }
        #map { height: 100vh; flex-grow: 1; }
        .pin-item { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; border-bottom: 1px solid #ddd; padding-bottom: 4px; }
        .btn-add { width: 100%; padding: 10px; background: #28a745; color: white; border: none; cursor: pointer; margin-bottom: 10px; }
        .btn-del { background: #dc3545; color: white; border: none; cursor: pointer; padding: 2px 8px; border-radius: 3px; margin-left: 5px; }
        .label-container { position: relative; width: 120px; left: -60px; text-align: center; }
        .dot-icon { background-color: blue; border: 2px solid white; border-radius: 50%; width: 12px; height: 12px; display: block; margin: 0 auto; box-shadow: 0 0 3px rgba(0,0,0,0.5); }
        .permanent-label-text { background-color: rgba(255, 255, 255, 0.8); color: #000; font-weight: bold; font-size: 11px; padding: 2px 4px; border-radius: 4px; pointer-events: none; white-space: nowrap; margin-top: 2px; }
    </style>
</head>
<body>

    <div id="panel">
        <h3>Control</h3>
        <button class="btn-add" onclick="activarModoCreacion()">+ Añadir Pin</button>
        <div id="checkbox-list"></div>
    </div>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>

    <script>
        const map = L.map('map').setView([0, 0], 2);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OpenStreetMap' }).addTo(map);

        const checkboxList = document.getElementById('checkbox-list');
        const drawnItems = new L.FeatureGroup().addTo(map);

        const drawControl = new L.Control.Draw({
            draw: { polygon: false, rectangle: false, circle: false, marker: false, circlemarker: false, 
                    polyline: { shapeOptions: { color: '#3388ff' } } },
            edit: { featureGroup: drawnItems }
        });
        map.addControl(drawControl);

        map.on(L.Draw.Event.CREATED, function (e) {
            const layer = e.layer;
            if (layer instanceof L.Polyline) {
                const latlngs = layer.getLatLngs();
                let distance = 0;
                for (let i = 0; i < latlngs.length - 1; i++) {
                    distance += latlngs[i].distanceTo(latlngs[i + 1]);
                }
                const km = (distance / 1000).toFixed(2);
                layer.bindPopup(`Distancia: ${km} km`).openPopup();
            }
            drawnItems.addLayer(layer);
        });

        function getPinIcon(name) {
            return L.divIcon({
                className: 'custom-div-icon',
                html: `<div class="label-container"><div class="dot-icon"></div><div class="permanent-label-text">${name}</div></div>`,
                iconSize: [12, 12], iconAnchor: [6, 6]
            });
        }

        function actualizarLocalStorage() {
            const items = [...document.querySelectorAll('.pin-item[data-manual="true"]')].map(i => ({
                name: i.dataset.name, 
                lat: i.dataset.lat, 
                lng: i.dataset.lng
            }));
            localStorage.setItem('pines_manuales', JSON.stringify(items));
        }

        function registrarPinUI(marker, name, lat, lng, esManual = false) {
            const container = document.createElement('div');
            container.className = 'pin-item';
            container.dataset.name = name; container.dataset.lat = lat; container.dataset.lng = lng;

            if(esManual) {
                container.dataset.manual = "true";
                marker.dragging.enable();
                marker.on('dragend', (e) => {
                    const pos = e.target.getLatLng();
                    container.dataset.lat = pos.lat; container.dataset.lng = pos.lng;
                    actualizarLocalStorage();
                });
                // Evento para cambiar nombre al doble clic
                marker.on('dblclick', () => {
                    const nuevoNombre = prompt("Nuevo nombre del pin:", container.dataset.name);
                    if (nuevoNombre) {
                        container.dataset.name = nuevoNombre;
                        container.querySelector('span').textContent = nuevoNombre;
                        marker.setIcon(getPinIcon(nuevoNombre));
                        actualizarLocalStorage();
                    }
                });
            }

            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.checked = true;
            checkbox.addEventListener('change', (e) => e.target.checked ? marker.addTo(map) : marker.remove());

            container.innerHTML = `<span>${name}</span>`;
            if(esManual) {
                const btnDel = document.createElement('button');
                btnDel.textContent = '-';
                btnDel.className = 'btn-del';
                btnDel.onclick = () => { marker.remove(); container.remove(); actualizarLocalStorage(); };
                container.appendChild(btnDel);
            }
            container.prepend(checkbox);
            checkboxList.appendChild(container);
        }

        function crearMarcador(lat, lng, name, esManual) {
            const marker = L.marker([lat, lng], { icon: getPinIcon(name), draggable: esManual }).addTo(map);
            registrarPinUI(marker, name, lat, lng, esManual);
            return marker;
        }

        const kmzLayer = L.kmzLayer().addTo(map);
        kmzLayer.on('load', (e) => {
            map.fitBounds(e.layer.getBounds());
            e.layer.eachLayer(l => {
                if (l instanceof L.Marker && l.feature?.properties?.name) {
                    l.setIcon(getPinIcon(l.feature.properties.name));
                    registrarPinUI(l, l.feature.properties.name, l.getLatLng().lat, l.getLatLng().lng, false);
                }
            });
        });
        kmzLayer.load('control_sur.kmz');

        const guardados = JSON.parse(localStorage.getItem('pines_manuales') || "[]");
        guardados.forEach(p => crearMarcador(parseFloat(p.lat), parseFloat(p.lng), p.name, true));

        function activarModoCreacion() {
            map.getContainer().style.cursor = 'crosshair';
            map.once('click', (e) => {
                const nombre = prompt("Nombre del pin:");
                if (nombre) {
                    crearMarcador(e.latlng.lat, e.latlng.lng, nombre, true);
                    actualizarLocalStorage();
                }
                map.getContainer().style.cursor = '';
            });
        }
    </script>
</body>
</html>