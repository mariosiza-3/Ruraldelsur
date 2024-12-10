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
    <title>Materia</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido.php');?>
<div class="kj1">
    <h1 class="kj2">Insertar Materia</h1>
</div>
<div class="kj3">
    <form name="INSERT" action="InsertarGrado.php" method="POST" enctype="multipart/form-data" >
        <div class="kj4">
            
            <div class="kj5">
                <label for="fecha">NOMBRE:</label><br>
                <input type="Text" class="kj6" id="fecha" name="caja1" required><br><br>
            </div>

            <button type="submit" class="kj7" name="ENVIAR">REGISTRAR</button>
        </div>
    </form>

    <?php
    if (isset($_POST['ENVIAR'])) {
        // Validación de campos seleccionados
        $NOMBRE = $_POST['caja1'];

            $SQL = "INSERT INTO materia (Nombre) VALUES ('$NOMBRE')";
            $RESULT = mysqli_query($conexion, $SQL) or die(mysqli_error($conexion));

            echo '<script>alert("Materia Insertada");</script>';
            echo '<script>window.location.href = "Materia.php";</script>';
        }
    ?>
</div>
    </div>

<?php INCLUDE ('../TEMPLATE/footer.php');?>
