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
    <title>Estudiante</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php'); ?>
<?php INCLUDE ('../TEMPLATE/contenido.php'); ?>
<h1 class="kj2">Actualizar Estudiante</h1>

<?php
if (isset($_GET['ACTUALIZAR'])) {
    $EDITAR_ID = $_GET['ACTUALIZAR'];
    $CONSULTA = "SELECT * FROM estudiante WHERE IdEstudiante='$EDITAR_ID'";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA) or die(mysqli_error($conexion));
    $FILA = mysqli_fetch_assoc($EJECUTAR);
    
    $IDESTUDIANTE = $FILA['IdEstudiante'];
    $NOMBRE = $FILA['Nombre'];
    $APELLIDO = $FILA['Apellido'];
    $TELEFONO = $FILA['Telefono'];
    $NUMERODOC = $FILA['NumeroDocumento'];
    $CORREOELECTRONICO = $FILA['CorreoElectronico'];
    $CONTRASENA = $FILA['Contrasena'];
    $TUTOR = $FILA['Tutor']; 
}
?>

<form name="update" method="post" action="" enctype="multipart/form-data">
    <p>ID ESTUDIANTE:
        <input type="text" name="IdEstudiante" value="<?php echo $IDESTUDIANTE; ?>" readonly DISABLED>
    </p>

    <p>NOMBRE:
        <input type="Text" name="caja1" class="kj6" value="<?php echo $NOMBRE; ?>" required>
    </p>

    <p>APELLIDO:
        <input type="Text" name="caja2" class="kj6" value="<?php echo $APELLIDO; ?>" required>
    </p>
    
    <p>TELEFONO:
        <input type="text" name="caja3" value="<?php echo $TELEFONO; ?>" required>
    </p>
    <p>NUMERO DOCUMENTO:
        <input type="text" name="caja7" value="<?php echo $NUMERODOC; ?>" required>
    </p>
    
    <p>CORREO ELECTRONICO:
        <input type="Text" name="caja4" class="kj6" value="<?php echo $CORREOELECTRONICO; ?>" required>
    </p>
    
    <p>CONTRASEÑA:
        <input type="Text" name="caja6" class="kj6" value="<?php echo $CONTRASENA; ?>" required>
    </p>

    <label for="nombre">TUTOR:
        <select name="caja5" class="caja1" required>
            <option value="<?php echo $TUTOR; ?>"><?php echo $TUTOR; ?></option>
            <?php
                $CONSULTA2 = "SELECT * FROM tutor";
                $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                    echo "<option value='".$RESPUESTA2['IdTutor']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Apellido']."</option>";
                }
            ?>
        </select>
    </label>

    <br><br>
    <button type="submit" class="kj7" name="ACTUALIZAR">Actualizar</button>
</form>

<?php
if (isset($_POST['ACTUALIZAR'])) {
    // Recogemos los datos del formulario
    $NOMBRE = $_POST['caja1'];
    $APELLIDO = $_POST['caja2'];
    $TELEFONO = $_POST['caja3'];
    $NUMERODOC = $_POST['caja7'];
    $CORREOELECTRONICO = $_POST['caja4'];
    $CONTRASENA = $_POST['caja6'];
    $TUTOR = $_POST['caja5'];

    // Validación: asegurarse de que el tutor seleccionado sea un valor válido (un ID de tutor existente)
    if (empty($TUTOR) || !is_numeric($TUTOR)) {
        echo '<script>alert("El tutor seleccionado no es válido o no existe.");</script>';
    } else {
        // Realizamos la actualización
        $ACTUALIZAR = "UPDATE estudiante SET Nombre = '$NOMBRE', Apellido = '$APELLIDO', Telefono = '$TELEFONO', NumeroDocumento='$NUMERODOC', CorreoElectronico = '$CORREOELECTRONICO', Contrasena = '$CONTRASENA', Tutor = '$TUTOR' WHERE IdEstudiante = '$IDESTUDIANTE'";

        // Ejecutamos la consulta
        if (mysqli_query($conexion, $ACTUALIZAR)) {
            echo '<script>alert("Estudiante Actualizado");</script>';
            echo '<script>window.location.href="Estudiante.php";</script>';
        } else {
            // Si ocurre un error en la actualización
            echo "Error al actualizar: " . mysqli_error($conexion);
        }
    }
}
?>
</div>
<?php INCLUDE ('../TEMPLATE/footer.php'); ?>

