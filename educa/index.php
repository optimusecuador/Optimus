<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="img/ico.png" />
<title>GlobalNET - Plataforma Educativa</title>
<!-- Favicon -->
    <link rel="icon" type="image/png" href="../images/ico.png">
<style>

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url("../img/login.png");
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px; /* Espacio entre las 3 tarjetas */
}

/* Caja unificada para que las 3 tengan exactamente el mismo tamaño */
.card-box {
    width: 380px;
    height: 500px;
    padding: 30px;
    background: rgba(0, 0, 0, 0.4);
    border-radius: 15px;
    text-align: center;
    color: white;
    backdrop-filter: blur(10px);
    border: 2px solid white;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-box h2 {
    margin: 0 0 15px 0;
    font-size: 22px;
}

.input-box {
    margin: 15px 0;
}

.input-box input {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    outline: none;
    box-sizing: border-box;
}

.btn {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 20px;
    background: linear-gradient(to right, #0066ff, #00ccff);
    color: white;
    font-size: 15px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    box-sizing: border-box;
    transition: opacity 0.2s;
    font-weight: bold;
}

.btn:hover {
    opacity: 0.9;
}

/* Estilo unificado para las imágenes de cada sección */
.section-img {
    max-width: 150px;
    height: auto;
    margin: 0 auto 10px auto;
    border-radius: 8px;
    display: block;
}

.section-desc {
    font-size: 13px;
    color: #e0e0e0;
    margin: 10px 0;
    line-height: 1.4;
}

.footer-text {
    font-size: 12px;
}

a {
    color: #00ccff;
    text-decoration: none;
}

/* Ajuste responsivo para pantallas medianas o pequeñas */
@media (max-width: 1250px) {
    body {
        flex-direction: column;
        height: auto;
        padding: 30px 0;
    }
}

</style>

</head>

<body>

<!-- Sección 1: Educa Alumno -->
<div class="card-box">
    <div>
        <h2>Educa Alumno</h2>
        <img src="../educa/educa.png" alt="Educa Alumno" class="section-img">
        <p class="section-desc">Accede a tus cursos, revisa tus calificaciones, materiales de estudio y tareas asignadas.</p>
    </div>

    <div>
        <a href="../educa/index_alumno.php" class="btn">INGRESAR ALUMNO</a>
        <div class="footer-text" style="margin-top: 15px;">
            <p style="margin: 5px 0;">Portal Educación</p>
        </div>
    </div>
</div>

<!-- Sección 2: Educa Docente -->
<div class="card-box">
    <div>
        <h2>Educa Docente</h2>
        <img src="../educa/educa.png" alt="Educa Docente" class="section-img">
        <p class="section-desc">Gestiona tus clases, sube contenidos académicos, evalúa a tus estudiantes y lleva el control.</p>
    </div>

    <div>
        <a href="../educa/index_docente.php" class="btn">INGRESAR DOCENTE</a>
        <div class="footer-text" style="margin-top: 15px;">
            <p style="margin: 5px 0;">Portal Académico</p>
        </div>
    </div>
</div>

<!-- Sección 3: Clases Virtuales -->
<div class="card-box">
    <div>
        <h2>Clases Virtuales</h2>
        <img src="../educa/educa.png" alt="Clases Virtuales" class="section-img">
        <p class="section-desc">Conéctate a las salas de videoconferencia en tiempo real para tus clases y tutorías online.</p>
    </div>

    <div>
        <a href="../educa/index_videollamada.html" class="btn">CLASES VIRTUALES</a>
        <div class="footer-text" style="margin-top: 15px;">
            <p style="margin: 5px 0;">Videoconferencia</p>
        </div>
    </div>
</div>

</body>
</html>