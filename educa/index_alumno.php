<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu Conecta - Portal del Estudiante</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../images/ico.png">
    <!-- Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Paleta de colores de Edu Conecta */
            --primary-dark: #072b4f; 
            --primary-light: #0082e6; 
            --accent-green: #10c497; 
            --accent-red: #ff4757;
            --accent-orange: #ffa502;
            --bg-color: #f0f4f8;
            --white: #ffffff;
            --text-dark: #2f3542;
            --text-gray: #747d8c;
            --border-color: #f1f2f6;
            
            /* Variables de sombras */
            --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.04);
            --shadow-md: 0 10px 20px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 15px 30px rgba(0, 130, 230, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-dark);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar (Menú Lateral) */
        .sidebar {
            width: 260px;
            background-color: var(--primary-dark);
            color: var(--white);
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            box-shadow: 4px 0 10px rgba(0,0,0,0.05);
            z-index: 10;
        }

        .logo-container {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        /* Estilo para la imagen del logo */
        .logo-container img {
            max-width: 150px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .nav-links {
            list-style: none;
            padding: 20px 15px;
            flex-grow: 1;
        }

        .nav-links li {
            margin-bottom: 8px;
        }

        .nav-links li a {
            color: #a4b0be;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 15px;
            padding: 12px 20px;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-links li:hover a {
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--white);
            transform: translateX(5px);
        }

        .nav-links li.active a {
            background-color: var(--primary-light);
            color: var(--white);
            box-shadow: 0 4px 15px rgba(0, 130, 230, 0.4);
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Header */
        header {
            background-color: var(--white);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 5;
        }

        .header-search { position: relative; }
        
        .header-search input {
            padding: 10px 20px 10px 40px;
            border: 1px solid var(--border-color);
            background-color: var(--bg-color);
            border-radius: 30px;
            width: 320px;
            outline: none;
            font-size: 14px;
            transition: all 0.3s;
        }

        .header-search input:focus {
            background-color: var(--white);
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(0, 130, 230, 0.1);
        }

        .header-search i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-bell {
            position: relative;
            color: var(--text-gray);
            font-size: 20px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .notification-bell:hover { color: var(--primary-light); }

        .notification-dot {
            position: absolute;
            top: 0;
            right: -2px;
            width: 8px;
            height: 8px;
            background-color: var(--accent-red);
            border-radius: 50%;
            border: 2px solid var(--white);
        }

        .user-profile .avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--accent-green) 0%, #0ab88a 100%);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 10px rgba(16, 196, 151, 0.3);
            cursor: pointer;
        }

        /* Dashboard Body */
        .dashboard-body { padding: 30px 40px; }

        .welcome-banner {
            background: linear-gradient(135deg, var(--primary-light) 0%, #0056b3 100%);
            border-radius: 20px;
            padding: 40px;
            color: var(--white);
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 130, 230, 0.2);
        }

        .welcome-banner::after {
            content: '\f19d'; 
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: -20px;
            bottom: -40px;
            font-size: 200px;
            color: rgba(255, 255, 255, 0.1);
            transform: rotate(-15deg);
        }

        .welcome-banner h1 {
            font-size: 32px;
            margin-bottom: 10px;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }

        .welcome-banner p {
            font-size: 16px;
            opacity: 0.9;
            font-weight: 300;
            position: relative;
            z-index: 1;
        }

        /* Alerta / Novedad del Docente */
        .teacher-alert {
            background-color: #fff9e6;
            border-left: 5px solid var(--accent-orange);
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow-sm);
            animation: slideInDown 0.5s ease-out;
        }

        @keyframes slideInDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .teacher-alert-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .teacher-alert-icon {
            background: rgba(255, 165, 2, 0.15);
            color: var(--accent-orange);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .teacher-alert-text strong {
            display: block;
            color: #d35400;
            font-size: 15px;
            margin-bottom: 3px;
        }

        .teacher-alert-text p {
            font-size: 13px;
            color: #7f8c8d;
            margin: 0;
            line-height: 1.4;
        }

        .teacher-alert-close {
            background: none;
            border: none;
            color: #bdc3c7;
            font-size: 18px;
            cursor: pointer;
            transition: color 0.2s;
            padding: 5px;
        }

        .teacher-alert-close:hover {
            color: var(--accent-red);
        }

        /* Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--white);
            padding: 25px;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-top: 4px solid transparent;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .stat-card.orange { border-top-color: var(--accent-orange); }
        .stat-card.green { border-top-color: var(--accent-green); }
        .stat-card.blue { border-top-color: var(--primary-light); } 

        .stat-info h3 {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .stat-info span {
            color: var(--text-gray);
            font-size: 14px;
            font-weight: 500;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .stat-card.orange .stat-icon { background: rgba(255, 165, 2, 0.1); color: var(--accent-orange); }
        .stat-card.green .stat-icon { background: rgba(16, 196, 151, 0.1); color: var(--accent-green); }
        .stat-card.blue .stat-icon { background: rgba(0, 130, 230, 0.1); color: var(--primary-light); }

        /* Tables & Lists */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1.2fr; 
            gap: 30px;
        }

        .panel {
            background: var(--white);
            border-radius: 20px;
            padding: 25px;
            box-shadow: var(--shadow-sm);
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .panel-header h3 {
            color: var(--primary-dark);
            font-size: 18px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-header h3 i { color: var(--primary-light); }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        table th {
            color: var(--text-gray);
            font-weight: 500;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 15px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
        }

        table td {
            padding: 16px 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
            vertical-align: top;
        }

        tbody tr { transition: background-color 0.2s ease; }
        tbody tr:hover { background-color: #f8fbff; }
        tbody tr:last-child td { border-bottom: none; }

        /* Estilos de las Tareas y Badges de Recursos */
        .task-title {
            color: var(--text-dark);
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .resource-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .res-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .res-badge.download { background: #e0f2fe; color: #0284c7; } 
        .res-badge.video { background: #ffe4e6; color: #e11d48; }    
        .res-badge.photo { background: #dcfce7; color: #16a34a; }    

        /* Botones y Badges de Estado */
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            white-space: nowrap;
        }

        .badge.todo { background: rgba(255, 165, 2, 0.15); color: #d35400; }
        .badge.done { background: rgba(16, 196, 151, 0.15); color: #028f68; }
        .badge.late { background: rgba(255, 71, 87, 0.15); color: #c0392b; }

        .btn-upload, .btn-view {
            padding: 8px 16px;
            border-radius: 20px; 
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .btn-upload {
            background-color: var(--primary-light);
            color: var(--white);
            border: none;
        }

        .btn-upload:hover {
            background-color: #006bbd;
            box-shadow: 0 4px 10px rgba(0, 130, 230, 0.3);
            transform: translateY(-2px);
        }

        .btn-view {
            background-color: transparent;
            color: var(--text-dark);
            border: 1px solid #dcdde1;
        }

        .btn-view:hover {
            background-color: #f5f6fa;
            border-color: #b2bec3;
        }

        /* Lista de Calificaciones */
        .grade-list { list-style: none; }
        .grade-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
            transition: transform 0.2s;
        }
        
        .grade-item:hover { transform: translateX(5px); }
        .grade-item:last-child { border-bottom: none; }

        .subject-icon {
            width: 40px;
            height: 40px;
            background-color: #f1f2f6;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: var(--primary-light);
            margin-right: 15px;
        }

        .subject-info { display: flex; align-items: center; }
        .subject-info .materia-nombre {
            font-weight: 600;
            font-size: 14px;
            color: var(--text-dark);
        }

        .grade-score {
            font-weight: 700;
            font-size: 15px;
            color: var(--primary-light);
            background: rgba(0, 130, 230, 0.1);
            padding: 6px 12px;
            border-radius: 8px;
        }
        .grade-score.low {
            color: var(--accent-red);
            background: rgba(255, 71, 87, 0.1);
        }

        @media (max-width: 1024px) {
            .content-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .sidebar { width: 80px; }
            .logo-container img { max-width: 45px; }
            .nav-links li a span, .slogan { display: none; }
            .nav-links li a { justify-content: center; padding: 15px; }
            .header-search input { width: 200px; }
            .dashboard-body { padding: 20px; }
            .teacher-alert-content { flex-direction: column; align-items: flex-start; gap: 10px; }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="logo-container">
            <!-- Imagen del logo -->
            <img src="educa.png" alt="Edu Conecta Logo">
        </div>
        <ul class="nav-links">
            <li class="active"><a href="#"><i class="fas fa-home"></i> <span>Mi Resumen</span></a></li>
            <li><a href="#"><i class="fas fa-book"></i> <span>Mis Tareas</span></a></li>
            <li><a href="#"><i class="fas fa-star"></i> <span>Calificaciones</span></a></li>
            <li><a href="#"><i class="fas fa-calendar-alt"></i> <span>Mi Horario</span></a></li>
            <li><a href="#"><i class="fas fa-folder-open"></i> <span>Material</span></a></li>
        </ul>
    </nav>

    <!-- Contenido Principal -->
    <main class="main-content">
        <!-- Barra Superior -->
        <header>
            <div class="header-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Buscar tareas, materias...">
            </div>
            <div class="user-profile">
                <div class="notification-bell">
                    <i class="far fa-bell"></i>
                    <div class="notification-dot"></div>
                </div>
                <div class="avatar">AL</div>
                <div class="user-info">
                    <strong style="font-size: 14px;">Alejandro L.</strong>
                    <div style="font-size: 12px; color: var(--text-gray);">10° EGB "A"</div>
                </div>
            </div>
        </header>

        <!-- Cuerpo del Dashboard -->
        <div class="dashboard-body">
            
            <!-- Banner de Bienvenida -->
            <div class="welcome-banner">
                <h1>¡Hola, Alejandro! 👋</h1>
                <p>Bienvenido a tu panel de estudio. Tienes <strong>2 tareas pendientes</strong> para esta semana. ¡Sigue así!</p>
            </div>

            <!-- Alerta / Novedades del Docente -->
            <div class="teacher-alert">
                <div class="teacher-alert-content">
                    <div class="teacher-alert-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="teacher-alert-text">
                        <strong>Novedad de Historia (Prof. Martínez)</strong>
                        <p>Recuerden que para el ensayo sobre la Revolución Industrial es obligatorio revisar el documental subido en la plataforma y citar al menos 2 fuentes.</p>
                    </div>
                </div>
            </div>

            <!-- Tarjetas de Estadísticas -->
            <div class="stats-grid">
                <div class="stat-card orange">
                    <div class="stat-info">
                        <h3>2</h3>
                        <span>Tareas Pendientes</span>
                    </div>
                    <div class="stat-icon"><i class="fas fa-clock"></i></div>
                </div>
                <div class="stat-card green">
                    <div class="stat-info">
                        <h3>9.2</h3>
                        <span>Promedio General</span>
                    </div>
                    <div class="stat-icon"><i class="fas fa-graduation-cap"></i></div>
                </div>
                <div class="stat-card blue">
                    <div class="stat-info">
                        <h3>18</h3>
                        <span>Tareas Entregadas</span>
                    </div>
                    <div class="stat-icon"><i class="fas fa-check-double"></i></div>
                </div>
            </div>

            <!-- Tablas y Paneles -->
            <div class="content-grid">
                <!-- Panel de Tareas Pendientes -->
                <div class="panel">
                    <div class="panel-header">
                        <h3><i class="fas fa-tasks"></i> Mis Tareas para Casa</h3>
                    </div>
                    <div style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Materia</th>
                                    <th>Tarea / Detalles</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Matemáticas</strong></td>
                                    <td>
                                        <span class="task-title">Ejercicios de Álgebra Cap. 3</span>
                                        <div class="resource-badges">
                                            <span class="res-badge download"><i class="fas fa-file-pdf"></i> PDF adjunto</span>
                                            <span class="res-badge photo"><i class="fas fa-camera"></i> Subir foto</span>
                                        </div>
                                    </td>
                                    <td>15 Ago 2026</td>
                                    <td><span class="badge todo">Por entregar</span></td>
                                    <td><a href="#" class="btn-upload"><i class="fas fa-upload"></i> Subir</a></td>
                                </tr>
                                <tr>
                                    <td><strong>Historia</strong></td>
                                    <td>
                                        <span class="task-title">Ensayo: Revolución Industrial</span>
                                        <div class="resource-badges">
                                            <span class="res-badge video"><i class="fas fa-play-circle"></i> Ver Documental</span>
                                        </div>
                                    </td>
                                    <td>18 Ago 2026</td>
                                    <td><span class="badge todo">Por entregar</span></td>
                                    <td><a href="#" class="btn-upload"><i class="fas fa-upload"></i> Subir</a></td>
                                </tr>
                                <tr>
                                    <td><strong>Ciencias</strong></td>
                                    <td>
                                        <span class="task-title">Maqueta Sistema Solar</span>
                                        <div class="resource-badges">
                                            <span class="res-badge photo"><i class="fas fa-camera"></i> 3 Fotos subidas</span>
                                        </div>
                                    </td>
                                    <td>10 Ago 2026</td>
                                    <td><span class="badge done">Entregado</span></td>
                                    <td><a href="#" class="btn-view"><i class="fas fa-eye"></i> Revisar</a></td>
                                </tr>
                                <tr>
                                    <td><strong>Literatura</strong></td>
                                    <td>
                                        <span class="task-title">Resumen "Don Quijote"</span>
                                        <div class="resource-badges">
                                            <span class="res-badge download"><i class="fas fa-file-word"></i> Doc Guía</span>
                                        </div>
                                    </td>
                                    <td>08 Ago 2026</td>
                                    <td><span class="badge late">Atrasado</span></td>
                                    <td><a href="#" class="btn-upload" style="background-color: var(--accent-red);"><i class="fas fa-exclamation-circle"></i> Enviar</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Panel de Notas Recientes -->
                <div class="panel">
                    <div class="panel-header">
                        <h3><i class="fas fa-star"></i> Notas Recientes</h3>
                    </div>
                    <ul class="grade-list">
                        <li class="grade-item">
                            <div class="subject-info">
                                <div class="subject-icon"><i class="fas fa-square-root-alt"></i></div>
                                <div>
                                    <div class="materia-nombre">Matemáticas</div>
                                    <div style="font-size: 12px; color: var(--text-gray);">Prueba Parcial 1</div>
                                    <div style="font-size: 11px; color: var(--text-gray); margin-top: 2px;"><i class="far fa-calendar-alt"></i> 14 Ago 2026</div>
                                </div>
                            </div>
                            <div class="grade-score">9.5 / 10</div>
                        </li>
                        <li class="grade-item">
                            <div class="subject-info">
                                <div class="subject-icon"><i class="fas fa-globe-americas"></i></div>
                                <div>
                                    <div class="materia-nombre">Geografía</div>
                                    <div style="font-size: 12px; color: var(--text-gray);">Mapa Político</div>
                                    <div style="font-size: 11px; color: var(--text-gray); margin-top: 2px;"><i class="far fa-calendar-alt"></i> 12 Ago 2026</div>
                                </div>
                            </div>
                            <div class="grade-score">8.0 / 10</div>
                        </li>
                        <li class="grade-item">
                            <div class="subject-info">
                                <div class="subject-icon"><i class="fas fa-flask"></i></div>
                                <div>
                                    <div class="materia-nombre">Química</div>
                                    <div style="font-size: 12px; color: var(--text-gray);">Informe Laboratorio</div>
                                    <div style="font-size: 11px; color: var(--text-gray); margin-top: 2px;"><i class="far fa-calendar-alt"></i> 09 Ago 2026</div>
                                </div>
                            </div>
                            <div class="grade-score">10 / 10</div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </main>

</body>
</html>