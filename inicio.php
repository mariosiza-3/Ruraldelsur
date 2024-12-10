<?php
SESSION_START();
REQUIRE_ONCE('../CONEXION/Conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>INICIO</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header2.php');?>
<?php INCLUDE ('../TEMPLATE/contenido1.php');?>
<div class="container34">
        <h1>Bienvenido al Panel del Colegio</h1>
        <p>Selecciona una de las opciones a continuación para acceder a la sección correspondiente.</p>
        <div class="card-grid">
    <a href="../../index1.php" class="card" id="inicio">
        <div class="card-icon">🏠</div>
        <h3>Inicio</h3>
        <p>Volver a la página principal.</p>
    </a>
    <a href="../ESTUDIANTE/Estudiante.php" class="card" id="estudiante">
        <div class="card-icon">🎓</div>
        <h3>Estudiante</h3>
        <p>Gestión de estudiantes y sus perfiles.</p>
    </a>
    <a href="../DOCENTE/Docente.php" class="card" id="docente">
        <div class="card-icon">📚</div>
        <h3>Docente</h3>
        <p>Acceso a información de los profesores.</p>
    </a>
    <a href="../NOTICIA/Noticia.php" class="card" id="noticias">
        <div class="card-icon">📰</div>
        <h3>Noticias</h3>
        <p>Publicaciones y noticias importantes.</p>
    </a>
    <a href="../CITA/Cita.php" class="card" id="cita-psicologicas">
        <div class="card-icon">🧠</div>
        <h3>Citas Psicológicas</h3>
        <p>Gestión de citas con el psicólogo.</p>
    </a>
    <a href="../BOLETIN/Boletin.php" class="card" id="boletin">
        <div class="card-icon">📄</div>
        <h3>Boletín</h3>
        <p>Consulta de calificaciones y reportes.</p>
    </a>
    <a href="../MATRICULA/Matricula.php" class="card" id="matricula">
        <div class="card-icon">📝</div>
        <h3>Matrícula</h3>
        <p>Proceso de inscripción y matrícula.</p>
    </a>
    <a href="../INASISTENCIA/Inasistencia.php" class="card" id="asistencia">
        <div class="card-icon">✅</div>
        <h3>Asistencia</h3>
        <p>Control de asistencia de estudiantes.</p>
    </a>
    <a href="../ACTIVIDAD/Actividad.php" class="card" id="actividad">
        <div class="card-icon">🏃</div>
        <h3>Actividad</h3>
        <p>Registro y seguimiento de actividades.</p>
    </a>
    <a href="../GRADO/Grado.php" class="card" id="grado">
        <div class="card-icon">🏫</div>
        <h3>Grado</h3>
        <p>Gestión de niveles académicos.</p>
    </a>
    <a href="../HORARIO/Horario.php" class="card" id="horario">
        <div class="card-icon">⏰</div>
        <h3>Horario</h3>
        <p>Consulta y gestión de horarios.</p>
    </a>
    <a href="../PERSONAS/Persona.php" class="card" id="persona">
        <div class="card-icon">👤</div>
        <h3>Persona</h3>
        <p>Gestión de usuarios del sistema.</p>
    </a>
    <a href="../TUTOR/Tutor.php" class="card" id="tutor">
        <div class="card-icon">👩‍👦</div>
        <h3>Tutor</h3>
        <p>Información y seguimiento de tutores.</p>
    </a>
    <a href="../MATERIA/Materia.php" class="card" id="materia">
        <div class="card-icon">📘</div>
        <h3>Materia</h3>
        <p>Consulta y administración de materias.</p>
    </a>
    <a href="../PSICOLOGO/Psicologo.php" class="card" id="psicologo">
        <div class="card-icon">🧑‍⚕️</div>
        <h3>Psicólogo</h3>
        <p>Información sobre el equipo psicológico.</p>
    </a>
    <a href="../CERRARSESION/CerrarSesion.php" class="card" id="cerrar-sesion">
        <div class="card-icon">🚪</div>
        <h3>Cerrar Sesión</h3>
        <p>Salir del sistema de manera segura.</p>
    </a>
</div>

        </div>

<?php INCLUDE('../TEMPLATE/footer.php');?>