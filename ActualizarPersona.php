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
    <title>Actualizar Persona</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php'); ?>
<?php INCLUDE ('../TEMPLATE/contenido.php'); ?>
<h1 class="kj2">Actualizar Persona</h1>

<?php
if (isset($_GET['ACTUALIZAR'])) {
    $EDITAR_ID = $_GET['ACTUALIZAR'];
    $CONSULTA = "SELECT * FROM persona WHERE IdPersona='$EDITAR_ID'";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA) or die(mysqli_error($conexion));
    $FILA = mysqli_fetch_assoc($EJECUTAR);
    
    $IDPERSONA = $FILA['IdPersona'];
    $NOMBRE = $FILA['Nombre'];
    $APELLIDO = $FILA['Apellido'];
    $TELEFONO = $FILA['Telefono'];
    $CORREOELECTRONICO = $FILA['CorreoElectronico'];
    $CONTRASENA = $FILA['Contrasena'];
    $ROL = $FILA['Rol'];
    $SEDE = $FILA['Institucion'];
}
?>

<form name="update" method="post" action="">
    <p>ID PERSONA:
        <input type="text" name="IdPersona" value="<?php echo $IDPERSONA; ?>" readonly DISABLED>
    </p>
    
    <p>NOMBRE:
        <input type="text" name="caja1" class="kj6" value="<?php echo $NOMBRE; ?>" required>
    </p>
    
    <p>APELLIDO:
        <input type="text" name="caja2" class="kj6" value="<?php echo $APELLIDO; ?>" required>
    </p>
    
    <p>TELÉFONO:
        <input type="text" name="caja3" class="kj6" value="<?php echo $TELEFONO; ?>" required>
    </p>
    
    <p>CORREO ELECTRÓNICO:
        <input type="text" name="caja4" class="kj6" value="<?php echo $CORREOELECTRONICO; ?>" required>
    </p>
    <p>CONTRASEÑA:
        <input type="text" name="caja7" class="kj6" value="<?php echo $CONTRASENA; ?>" required>
    </p>
    
    <label for="rol">ROL:</label>
    <select name="caja5" class="caja1" required>
        <option value="<?php echo $ROL; ?>"><?php echo $ROL; ?></option>
        <?php
        $CONSULTA2 = "SELECT * FROM rol";
        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
            echo "<option value='".$RESPUESTA2['IdRol']."'>".$RESPUESTA2['Nombre']."</option>";
        }
        ?>
    </select>
    <br><br>

    <label for="Sede">SEDE:</label>
    <select name="caja6" class="caja1" required>
        <option value="<?php echo $SEDE; ?>"><?php echo $SEDE; ?></option>
        <?php
        $CONSULTA3 = "SELECT * FROM institucion";
        $EJECUTAR3 = mysqli_query($conexion, $CONSULTA3);
        while ($RESPUESTA3 = mysqli_fetch_assoc($EJECUTAR3)) {
            echo "<option value='".$RESPUESTA3['Nombre']."'>".$RESPUESTA3['Nombre']."</option>";
        }
        ?>
    </select>
    <br><br>
    
    <button type="submit" class="kj7" name="ACTUALIZAR">Actualizar</button>
</form>

<?php
if (isset($_POST['ACTUALIZAR'])) {
    // Validar campos
    if (isset($_POST['caja1'], $_POST['caja2'], $_POST['caja3'], $_POST['caja4'], $_POST['caja5'], $_POST['caja6'])) {
        $NOMBRE = mysqli_real_escape_string($conexion, $_POST['caja1']);
        $APELLIDO = mysqli_real_escape_string($conexion, $_POST['caja2']);
        $TELEFONO = mysqli_real_escape_string($conexion, $_POST['caja3']);
        $CORREOELECTRONICO = mysqli_real_escape_string($conexion, $_POST['caja4']);
        $CONTRASENA = mysqli_real_escape_string($conexion, $_POST['caja7']);
        $ROL = mysqli_real_escape_string($conexion, $_POST['caja5']);
        $SEDE = mysqli_real_escape_string($conexion, $_POST['caja6']); // Debe coincidir con institucion.Nombre

        // Consulta SQL
        $ACTUALIZAR = "UPDATE persona SET 
                        Nombre='$NOMBRE', 
                        Apellido='$APELLIDO', 
                        Telefono='$TELEFONO', 
                        CorreoElectronico='$CORREOELECTRONICO', 
                        Contrasena='$CONTRASENA', 
                        Rol='$ROL', 
                        Institucion='$SEDE' 
                       WHERE IdPersona='$IDPERSONA'";

        if (mysqli_query($conexion, $ACTUALIZAR)) {
            echo '<script>alert("Persona actualizada exitosamente.");</script>';
            echo '<script>window.location.href="Persona.php";</script>';
        } else {
            echo "Error al actualizar: " . mysqli_error($conexion);
        }
    } else {
        echo '<script>alert("Todos los campos son obligatorios.");</script>';
    }
}
?>
</div>
<?php INCLUDE ('../TEMPLATE/footer.php'); ?>
