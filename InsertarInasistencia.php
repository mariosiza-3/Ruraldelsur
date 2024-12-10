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
    <title>Inasistencia</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido.php');?>
<div class="kj1">
    <h1 class="kj2">Insertar Inasistencia</h1>
</div>
<div class="kj3">
    <form name="INSERT" action="InsertarInasistencia.php" method="POST" enctype="multipart/form-data" >
        <div class="kj4">
            
            <div class="kj5">
                <label for="fecha">FECHA INICIO:</label><br>
                <input type="date" class="kj6" id="fecha" name="caja1" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">FECHA FIN:</label><br>
                <input type="date" class="kj6" id="fecha" name="caja2" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">CANTIDAD DE HORAS:</label><br>
                <input type="integer" class="kj6" id="fecha" name="caja3" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">EXCUSA:</label><br>
                <input type="text" class="kj6" id="fecha" name="caja4" required><br><br>
            </div>
            <DIV>
                <label for="nombre">ESTUDIANTE:
                <select name="caja5" class="caja1" required>
                    <option value="0">-- Seleccione Estudiante --</option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM estudiante";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdEstudiante']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Apellido']."</option>";
                        }
                    ?>
                </select>
                <BR><BR>
                </label>
                </DIV>
                <DIV>
                <label for="nombre">DOCENTE:
                <select name="caja6" class="caja1" required>
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
        $FECHAI = $_POST['caja1'];
        $FECHAF = $_POST['caja2'];
        $CANTH = $_POST['caja3'];
        $EXCUSA = $_POST['caja4'];
        $ESTUDIANTE = $_POST['caja5'];
        $DOCENTE = $_POST['caja6'];

            $SQL = "INSERT INTO inasistencia (FechaInicio, FechaFin, CantidadHoras, Excusa, Estudiante, Docente) VALUES ('$FECHAI', '$FECHAF', '$CANTH', '$EXCUSA', '$ESTUDIANTE', '$DOCENTE');";
            $RESULT = mysqli_query($conexion, $SQL) or die(mysqli_error($conexion));

            echo '<script>alert("Inasistencia Insertado");</script>';
            echo '<script>window.location.href = "Inasistencia.php";</script>';
        }
    ?>
</div>
    </div>
    

<?php INCLUDE ('../TEMPLATE/footer.php');?>
