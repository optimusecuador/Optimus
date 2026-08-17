/* =========================================
   MAYUSCULAS AUTOMATICAS
========================================= */

document.getElementById("nombres")
.addEventListener("input", function(){

    this.value = this.value.toUpperCase();

});

document.getElementById("representante")
.addEventListener("input", function(){

    this.value = this.value.toUpperCase();

});

/* =========================================
   GUARDAR CLIENTE
========================================= */

document.getElementById("btnGuardarCliente")
.addEventListener("click", function(){

    let formData = new FormData();

    formData.append(
        "codigo",
        document.getElementById("codigo").value
    );

    formData.append(
        "nombres",
        document.getElementById("nombres").value
    );

    formData.append(
        "representante",
        document.getElementById("representante").value
    );

    formData.append(
        "fuente",
        document.getElementById("fuente").value
    );

    formData.append(
        "iva",
        document.getElementById("iva").value
    );

    formData.append(
        "juridica",
        document.getElementById("juridica").value
    );

    formData.append(
        "multimedia",
        document.getElementById("multimedia").value
    );

    formData.append(
        "direccion",
        document.getElementById("direccion").value
    );

    formData.append(
        "telefono1",
        document.getElementById("telefono1").value
    );

    formData.append(
        "telefono2",
        document.getElementById("telefono2").value
    );

    formData.append(
        "mail",
        document.getElementById("mail").value
    );

    formData.append(
        "usuario",
        document.getElementById("usuario").value
    );

    formData.append(
        "contrasena",
        document.getElementById("contrasena").value
    );

    formData.append(
        "isp",
        document.getElementById("isp").value
    );

    formData.append(
        "proveedorisp",
        document.getElementById("proveedorisp").value
    );

    fetch("guardar_cliente.php",{

        method:"POST",
        body:formData

    })

    .then(response => response.json())

    .then(data => {

        if(data.estado == "OK"){

            alert("Cliente guardado correctamente");

        }else{

            alert(data.mensaje);

        }

    })

    .catch(error => {

        alert("Error del servidor");

    });

});