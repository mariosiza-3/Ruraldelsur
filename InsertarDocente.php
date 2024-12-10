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
    <title>Docente</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido.php');?>
<div class="kj1">
    <h1 class="kj2">Insertar Docente</h1>
</div>
<div class="kj3">
    <form name="INSERT" action="InsertarDocente.php" method="POST" enctype="multipart/form-data" >
        <div class="kj4">
            
            <div class="kj5">
                <label for="fecha">NOMBRE:</label><br>
                <input type="Text" class="kj6" id="fecha" name="caja1" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">APELLIDO:</label><br>
                <input type="text" class="kj6" id="fecha" name="caja2" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">TELEFONO:</label><br>
                <input type="Text" class="kj6" id="fecha" name="caja3" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">CORREO ELECTRONICO:</label><br>
                <input type="text" class="kj6" id="fecha" name="caja4" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">CONTRASEÑA:</label><br>
                <input type="text" class="kj6" id="fecha" name="caja5" required><br><br>
            </div>

            <button type="submit" class="kj7" name="ENVIAR">INSERTAR</button>
        </div>
    </form>

    <?php
    if (isset($_POST['ENVIAR'])) {
        // Validación de campos seleccionados
        $NOMBRE = $_POST['caja1'];
        $APELLIDO = $_POST['caja2'];
        $TELEFONO = $_POST['caja3'];
        $CORREO = $_POST['caja4'];
        $CONTRASENA = $_POST['caja5'];

            $SQL = "INSERT INTO docente (Nombre, Apellido, Telefono, CorreoElectronico, Contrasena) VALUES ('$NOMBRE', '$APELLIDO', '$TELEFONO', '$CORREO','$CONTRASENA')";
            $RESULT = mysqli_query($conexion, $SQL) or die(mysqli_error($conexion));

            echo '<script>alert("Docente Insertado Exitosamente");</script>';
            echo '<script>window.location.href = "Docente.php";</script>';
        }
    ?>
</div>
    </div>

<?php INCLUDE ('../TEMPLATE/footer.php');?>
