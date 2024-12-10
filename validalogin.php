<?php 
SESSION_START();
require_once('../CONEXION/conexion.php');

if (isset($_POST['username'])) {
    $EMAIL = $_POST['username'];
    $PSW = $_POST['password'];

    // Verificar en la tabla 'persona'
    $CONSULTA = "SELECT * FROM persona WHERE CorreoElectronico='" . $EMAIL . "' AND Contrasena='" . $PSW . "'";
    $SQL = mysqli_query($conexion, $CONSULTA);
    $RESPUESTA = mysqli_fetch_assoc($SQL);
    $NUM = mysqli_num_rows($SQL);

    if ($NUM != 0) {
        // Si el usuario es de la tabla 'persona'
        $_SESSION['CorreoElectronico'] = $RESPUESTA['CorreoElectronico'];
        $_SESSION['Nombre'] = $RESPUESTA['Nombre'];
        $_SESSION['ROL'] = 'persona'; // Guardar el rol de la persona
        header('Location: ../INICIO/inicio.php');
        exit();
    } 

    // Verificar en la tabla 'estudiante'
    $CONSULTA = "SELECT * FROM estudiante WHERE CorreoElectronico='" . $EMAIL . "' AND Contrasena='" . $PSW . "'";
    $SQL = mysqli_query($conexion, $CONSULTA);
    $RESPUESTA = mysqli_fetch_assoc($SQL);
    $NUM = mysqli_num_rows($SQL);

    if ($NUM != 0) {
        // Si el usuario es de la tabla 'estudiante'
        $_SESSION['CorreoElectronico'] = $RESPUESTA['CorreoElectronico'];
        $_SESSION['Nombre'] = $RESPUESTA['Nombre'];
        $_SESSION['IdEstudiante'] = $RESPUESTA['IdEstudiante'];
        $_SESSION['Rol'] = 'estudiante'; // Guardar el rol de estudiante
        header('Location: ../../index1.php');
        exit();
    }

    // Verificar en la tabla 'tutor'
    $CONSULTA = "SELECT * FROM tutor WHERE CorreoElectronico='" . $EMAIL . "' AND Contrasena='" . $PSW . "'";
    $SQL = mysqli_query($conexion, $CONSULTA);
    $RESPUESTA = mysqli_fetch_assoc($SQL);
    $NUM = mysqli_num_rows($SQL);

    if ($NUM != 0) {
        // Si el usuario es de la tabla 'tutor'
        $_SESSION['CorreoElectronico'] = $RESPUESTA['CorreoElectronico'];
        $_SESSION['Nombre'] = $RESPUESTA['Nombre'];
        $_SESSION['Rol
        '] = 'tutor'; // Guardar el rol de tutor
        header('Location: ../../index1.php');
        exit();
    }

    // Verificar en la tabla 'docente'
    $CONSULTA = "SELECT * FROM docente WHERE CorreoElectronico='" . $EMAIL . "' AND Contrasena='" . $PSW . "'";
    $SQL = mysqli_query($conexion, $CONSULTA);
    $RESPUESTA = mysqli_fetch_assoc($SQL);
    $NUM = mysqli_num_rows($SQL);

    if ($NUM != 0) {
        // Si el usuario es de la tabla 'docente'
        $_SESSION['CorreoElectronico'] = $RESPUESTA['CorreoElectronico'];
        $_SESSION['Nombre'] = $RESPUESTA['Nombre'];
        $_SESSION['Rol'] = 'docente'; // Guardar el rol de docente
        header('Location: ../INICIO/Inicio.php');
        exit();
    }
    $CONSULTA = "SELECT * FROM psicologo WHERE CorreoElectronico='" . $EMAIL . "' AND Contrasena='" . $PSW . "'";
    $SQL = mysqli_query($conexion, $CONSULTA);
    $RESPUESTA = mysqli_fetch_assoc($SQL);
    $NUM = mysqli_num_rows($SQL);

    if ($NUM != 0) {
        // Si el usuario es de la tabla 'docente'
        $_SESSION['CorreoElectronico'] = $RESPUESTA['CorreoElectronico'];
        $_SESSION['Nombre'] = $RESPUESTA['Nombre'];
        $_SESSION['Rol'] = 'docente'; // Guardar el rol de docente
        header('Location: ../CITA/Cita.php');
        exit();
    }

    // Si no se encuentra en ninguna tabla, mostrar error y redirigir al login
    $_SESSION['ERROR'] = "ERROR DE USUARIO Y CONTRASEÑA";
    header('Location: ../../index.php');
    exit();
}
?>
