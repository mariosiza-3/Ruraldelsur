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
    <title>Actividades</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido.php');?>
<div class="kj1">
    <h1 class="kj2">Insertar Actividad</h1>
</div>
<div class="kj3">
    <form name="INSERT" action="InsertarActividad.php" method="POST" enctype="multipart/form-data">
        <div class="kj4">            
            <div>
            <div class="kj5">
                <label for="NOMBRE">NOMBRE:</label><br>
                <input type="TEXT" class="kj6" id="fecha" name="caja1" required><br><br>
            </div>
            <div class="kj5">
                <label for="NOTA">NOTA:</label><br>
                <input type="DECIMAL" class="kj6" id="fecha" name="caja2" required><br><br>
            </div>
                <label for="MATERIA">MATERIA:
                <select name="caja3" class="kj6 " required>
                    <option value="0">-- Seleccione materia --</option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM materia";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdMateria']."'>".$RESPUESTA2['Nombre']."</option>";
                        }
                    ?>
                </select>
                <br><br>
                </label>
            </div>

            <button type="submit" class="kj7" name="ENVIAR">INSERTAR</button>
        </div>


    <?php
    if (isset($_POST['ENVIAR'])) {
        // Validación de campos seleccionados
        $NOMBRE = $_POST['caja1'];
        $NOTA = $_POST['caja2'];
        $MATERIA = $_POST['caja3'];

            $SQL = "INSERT INTO `actividad` (`Nombre`, `Nota`, `Materia`) VALUES ('$NOMBRE', '$NOTA', '$MATERIA')";
            $RESULT = mysqli_query($conexion, $SQL) or die(mysqli_error($conexion));

            echo '<script>alert("Actividad Insertado");</script>';
            echo '<script>window.location.href = "Actividad.php";</script>';
        }
    ?>
        </form>
</div>
    </div>

<?php INCLUDE ('../TEMPLATE/footer.php');?>
