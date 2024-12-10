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
    <title>Horario</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido.php');?>
<div class="kj1">
    <h1 class="kj2">Insertar Horario</h1>
</div>
<div class="kj3">
    <form name="INSERT" action="InsertarHorario.php" method="POST" enctype="multipart/form-data" >
        <div class="kj4">
            
            <div class="kj5">
                <label for="fecha">HORA INICIO:</label><br>
                <input type="Time" class="kj6" id="fecha" name="caja1" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">HORA FIN:</label><br>
                <input type="Time" class="kj6" id="fecha" name="caja2" required><br><br>
            </div>
            <DIV>
                <label for="nombre">GRADO:
                <select name="caja3" class="caja1" required>
                    <option value="0">-- Seleccione Grado --</option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM grado";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdGrado']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Curso']."</option>";
                        }
                    ?>
                </select>
                <BR><BR>
                </label>
                </DIV>
                <DIV>
                <label for="nombre">DOCENTE:
                <select name="caja4" class="caja1" required>
                    <option value="0">-- Seleccione Docente --</option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM docente";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdDocente']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Apellido']."</option>";
                        }
                    ?>
                </select>
                <BR><BR>
                </label>
                </DIV>

            <button type="submit" class="kj7" name="ENVIAR">REGISTRAR</button>
        </div>
    </form>

    <?php
    if (isset($_POST['ENVIAR'])) {
        // Validación de campos seleccionados
        $HORAI = $_POST['caja1'];
        $HORAF = $_POST['caja2'];
        $GRADO = $_POST['caja3'];
        $DOCENTE = $_POST['caja4'];

            $SQL = "INSERT INTO horario (HoraInicio, HoraFin, Grado, Docente) VALUES ('$HORAI', '$HORAF', '$GRADO', '$DOCENTE');";
            $RESULT = mysqli_query($conexion, $SQL) or die(mysqli_error($conexion));

            echo '<script>alert("Horario Insertado");</script>';
            echo '<script>window.location.href = "Horario.php";</script>';
        }
    ?>
</div>
    </div>

<?php INCLUDE ('../TEMPLATE/footer.php');?>
