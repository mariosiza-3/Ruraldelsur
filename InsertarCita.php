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
    <title>Cita Psicológica</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php'); ?>
<?php INCLUDE ('../TEMPLATE/contenido.php'); ?>

<div class="kj1">
    <h1 class="kj2">Insertar Cita Psicológica</h1>
</div>
<div class="kj3">
    <form name="INSERT" action="InsertarCita.php" method="POST" enctype="multipart/form-data">
        <div class="kj5">
            <label for="motivo">MOTIVO:</label><br>
            <input type="text" class="kj6" id="motivo" name="caja1" required><br><br>
        </div>
        <div class="kj5">
            <label for="hora">HORA (cada 30 minutos, entre 07:00 y 13:00):</label><br>
            <input 
                type="time" 
                class="kj6" 
                id="hora" 
                name="caja2" 
                min="07:00" 
                max="13:00" 
                step="1800" 
                required
            >
            <br><br>
        </div>
        <div class="kj5">
            <label for="fecha">FECHA:</label><br>
            <input type="date" class="kj6" id="fecha" name="caja3" min="<?php echo date('Y-m-d'); ?>" required><br><br>
        </div>
        <div>
            <label for="estudiante">ESTUDIANTE:</label><br>
            <select name="caja4" class="caja1" required>
                <option value="0">-- Seleccione Estudiante --</option>
                <?php
                $consultaEstudiantes = "SELECT * FROM estudiante";
                $resultadoEstudiantes = mysqli_query($conexion, $consultaEstudiantes);
                while ($estudiante = mysqli_fetch_assoc($resultadoEstudiantes)) {
                    echo "<option value='".$estudiante['IdEstudiante']."'>".$estudiante['Nombre']." ".$estudiante['Apellido']."</option>";
                }
                ?>
            </select>
            <br><br>
        </div>
        <div>
            <label for="psicologo">PSICÓLOGO:</label><br>
            <select name="caja5" class="caja1" required>
                <option value="0">-- Seleccione Psicólogo --</option>
                <?php
                $consultaPsicologos = "SELECT * FROM psicologo";
                $resultadoPsicologos = mysqli_query($conexion, $consultaPsicologos);
                while ($psicologo = mysqli_fetch_assoc($resultadoPsicologos)) {
                    echo "<option value='".$psicologo['IdPsicologo']."'>".$psicologo['Nombre']." ".$psicologo['Apellido']."</option>";
                }
                ?>
            </select>
            <br><br>
        </div>
        <button type="submit" class="kj7" name="ENVIAR">INSERTAR</button>
    </form>

    <?php
    if (isset($_POST['ENVIAR'])) {
        // Validación de campos seleccionados
        $MOTIVO = $_POST['caja1'];
        $HORA = $_POST['caja2'];
        $FECHA = $_POST['caja3'];
        $ESTUDIANTE = $_POST['caja4'];
        $PSICOLOGO = $_POST['caja5'];

        // Validación de duplicados
        $validacionCita = "
            SELECT * FROM cita 
            WHERE Fecha = '$FECHA' AND Hora = '$HORA' AND Psicologo = '$PSICOLOGO'";
        $resultadoValidacion = mysqli_query($conexion, $validacionCita);

        if (mysqli_num_rows($resultadoValidacion) > 0) {
            echo '<script>alert("Esta cita ya está ocupada. Elige otra hora.");</script>';
        } else {
            // Insertar la cita
            $SQL = "INSERT INTO cita (Motivo, Hora, Fecha, Estudiante, Psicologo) 
                    VALUES ('$MOTIVO', '$HORA', '$FECHA', '$ESTUDIANTE', '$PSICOLOGO')";
            $RESULT = mysqli_query($conexion, $SQL) or die(mysqli_error($conexion));

            if ($RESULT) {
                echo '<script>alert("Cita Insertada");</script>';
                echo '<script>window.location.href = "Cita.php";</script>';
            } else {
                echo '<script>alert("Error al insertar la cita.");</script>';
            }
        }
    }
    ?>
</div>
<?php INCLUDE ('../TEMPLATE/footer.php'); ?>
</body>
</html>
