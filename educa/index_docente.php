<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu Conecta - Dashboard Escolar</title>
	<!-- Favicon -->
    <link rel="icon" type="image/png" href="../images/ico.png">
    <!-- Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            /* Paleta de colores extraída del logo Edu Conecta */
            --primary-dark: #072b4f; /* Azul oscuro del texto Edu y la figura */
            --primary-light: #0082e6; /* Azul claro del texto Conecta */
            --accent-green: #10c497; /* Verde/Turquesa del arco superior */
            --bg-color: #f4f7f6;
            --white: #ffffff;
            --text-dark: #333333;
            --text-gray: #777777;
            --border-color: #e0e0e0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-dark);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar (Menú Lateral) */
        .sidebar {
            width: 250px;
            background-color: var(--primary-dark);
            color: var(--white);
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .logo-container {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .logo-container h2 {
            color: var(--white);
            font-size: 24px;
            font-weight: bold;
        }

        .logo-container h2 span {
            color: var(--primary-light);
        }

        .slogan {
            font-size: 11px;
            color: var(--accent-green);
            margin-top: 5px;
            font-weight: 500;
        }

        .nav-links {
            list-style: none;
            padding: 20px 0;
            flex-grow: 1;
        }

        .nav-links li {
            padding: 10px 20px;
            transition: 0.3s;
        }

        .nav-links li a {
            color: #d1d8e0;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 15px;
        }

        .nav-links li:hover, .nav-links li.active {
            background-color: var(--primary-light);
            border-left: 4px solid var(--accent-green);
        }

        .nav-links li:hover a, .nav-links li.active a {
            color: var(--white);
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
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .header-search {
            position: relative;
        }
        
        .header-search input {
            padding: 8px 15px 8px 35px;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            width: 300px;
            outline: none;
        }

        .header-search i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-profile .avatar {
            width: 40px;
            height: 40px;
            background-color: var(--primary-light);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Dashboard Body */
        .dashboard-body {
            padding: 30px;
        }

        .welcome-banner {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-light) 100%);
            border-radius: 10px;
            padding: 30px;
            color: var(--white);
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .welcome-banner h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .welcome-banner p {
            font-size: 16px;
            opacity: 0.9;
        }

        /* Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--white);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 4px solid var(--primary-light);
        }

        .stat-card.green { border-color: var(--accent-green); }
        .stat-card.dark { border-color: var(--primary-dark); }

        .stat-info h3 {
            font-size: 24px;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .stat-info span {
            color: var(--text-gray);
            font-size: 14px;
        }

        .stat-icon {
            font-size: 30px;
            color: var(--primary-light);
            opacity: 0.8;
        }

        .stat-card.green .stat-icon { color: var(--accent-green); }
        .stat-card.dark .stat-icon { color: var(--primary-dark); }

        /* Tables & Lists */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        .panel {
            background: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 10px;
        }

        .panel-header h3 {
            color: var(--primary-dark);
        }

        .btn {
            background-color: var(--accent-green);
            color: var(--white);
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn:hover {
            background-color: #0da881;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        table th {
            color: var(--text-gray);
            font-weight: 600;
            font-size: 14px;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge.active { background: #e0f8f1; color: var(--accent-green); }
        .badge.pending { background: #fff3e0; color: #ff9800; }

        .grade-list {
            list-style: none;
        }

        .grade-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .grade-item:last-child {
            border-bottom: none;
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .student-avatar {
            width: 32px;
            height: 32px;
            background-color: #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: var(--primary-dark);
        }

        .grade-score {
            font-weight: bold;
            color: var(--primary-light);
        }

        @media (max-width: 900px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
            .sidebar {
                width: 70px;
            }
            .nav-links li a span, .logo-container h2, .slogan {
                display: none;
            }
            .header-search input {
                width: 200px;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="logo-container">
            <h2>Edu<span>Conecta</span></h2>
            <div class="slogan">Aprende hoy, transforma tu futuro</div>
        </div>
        <ul class="nav-links">
            <li class="active"><a href="#"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="#"><i class="fas fa-book-open"></i> <span>Gestión de Tareas</span></a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> <span>Registro de Notas</span></a></li>
            <li><a href="#"><i class="fas fa-users"></i> <span>Mis Alumnos</span></a></li>
            <li><a href="#"><i class="fas fa-cog"></i> <span>Configuración</span></a></li>
        </ul>
    </nav>

    <!-- Contenido Principal -->
    <main class="main-content">
        <!-- Barra Superior -->
        <header>
            <div class="header-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Buscar alumnos, tareas...">
            </div>
            <div class="user-profile">
                <span><i class="far fa-bell"></i></span>
                <div class="avatar">Prof</div>
                <div class="user-info">
                    <strong>Profesor(a)</strong>
                </div>
            </div>
        </header>

        <!-- Cuerpo del Dashboard -->
        <div class="dashboard-body">
            
            <!-- Banner de Bienvenida -->
            <div class="welcome-banner">
                <h1>¡Hola, Profesor!</h1>
                <p>Gestiona las tareas para la casa y mantén el registro de notas al día. El conocimiento transforma el futuro.</p>
            </div>

            <!-- Tarjetas de Estadísticas -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-info">
                        <h3>12</h3>
                        <span>Tareas Activas</span>
                    </div>
                    <div class="stat-icon"><i class="fas fa-book"></i></div>
                </div>
                <div class="stat-card green">
                    <div class="stat-info">
                        <h3>85%</h3>
                        <span>Entrega Promedio</span>
                    </div>
                    <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                </div>
                <div class="stat-card dark">
                    <div class="stat-info">
                        <h3>4</h3>
                        <span>Exámenes por Calificar</span>
                    </div>
                    <div class="stat-icon"><i class="fas fa-edit"></i></div>
                </div>
            </div>

            <!-- Tablas y Paneles -->
            <div class="content-grid">
                <!-- Panel de Tareas -->
                <div class="panel">
                    <div class="panel-header">
                        <h3><i class="fas fa-tasks"></i> Registro de Tareas para Casa</h3>
                        <button class="btn"><i class="fas fa-plus"></i> Nueva Tarea</button>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Asignatura</th>
                                    <th>Descripción</th>
                                    <th>Fecha Límite</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Matemáticas</td>
                                    <td>Ejercicios de Álgebra Cap. 3</td>
                                    <td>15 Ago 2026</td>
                                    <td><span class="badge active">Publicado</span></td>
                                    <td><a href="#" style="color: var(--primary-light);"><i class="fas fa-edit"></i> Revisar</a></td>
                                </tr>
                                <tr>
                                    <td>Historia</td>
                                    <td>Ensayo: Revolución Industrial</td>
                                    <td>18 Ago 2026</td>
                                    <td><span class="badge pending">Borrador</span></td>
                                    <td><a href="#" style="color: var(--primary-light);"><i class="fas fa-edit"></i> Editar</a></td>
                                </tr>
                                <tr>
                                    <td>Ciencias</td>
                                    <td>Maqueta Sistema Solar</td>
                                    <td>20 Ago 2026</td>
                                    <td><span class="badge active">Publicado</span></td>
                                    <td><a href="#" style="color: var(--primary-light);"><i class="fas fa-edit"></i> Revisar</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Panel de Notas Recientes -->
                <div class="panel">
                    <div class="panel-header">
                        <h3><i class="fas fa-star"></i> Últimas Calificaciones</h3>
                    </div>
                    <ul class="grade-list">
                        <li class="grade-item">
                            <div class="student-info">
                                <div class="student-avatar">AM</div>
                                <div>
                                    <div style="font-weight: 500; font-size: 14px;">Ana Martínez</div>
                                    <div style="font-size: 12px; color: var(--text-gray);">Matemáticas - Prueba 1</div>
                                </div>
                            </div>
                            <div class="grade-score">9.5 / 10</div>
                        </li>
                        <li class="grade-item">
                            <div class="student-info">
                                <div class="student-avatar">LG</div>
                                <div>
                                    <div style="font-weight: 500; font-size: 14px;">Luis García</div>
                                    <div style="font-size: 12px; color: var(--text-gray);">Historia - Ensayo</div>
                                </div>
                            </div>
                            <div class="grade-score">8.0 / 10</div>
                        </li>
                        <li class="grade-item">
                            <div class="student-info">
                                <div class="student-avatar">CR</div>

                                <div>
                                    <div style="font-weight: 500; font-size: 14px;">Carlos Ruiz</div>
                                    <div style="font-size: 12px; color: var(--text-gray);">Matemáticas - Prueba 1</div>
                                </div>
                            </div>
                            <div class="grade-score" style="color: #e74c3c;">6.5 / 10</div>
                        </li>
                        <li class="grade-item">
                            <div class="student-info">
                                <div class="student-avatar">SM</div>
                                <div>
                                    <div style="font-weight: 500; font-size: 14px;">Sofía Méndez</div>
                                    <div style="font-size: 12px; color: var(--text-gray);">Ciencias - Proyecto</div>
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