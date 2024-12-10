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
    <title>Grados</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido.php');?>
<div class="kj1">
    <h1 class="kj2">Insertar Boletin</h1>
</div>
<div class="kj3">
    <form name="INSERT" action="InsertarBoletin.php" method="POST" enctype="multipart/form-data">
        <div class="kj4">
            
            <div>
                <label for="nombre">ESTUDIANTE:
                <select name="caja1" class="caja1" required>
                    <option value="0">-- Seleccione Estudiante --</option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM Estudiante";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdEstudiante']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Apellido']."</option>";
                        }
                    ?>
                </select>
                <br><br>
                </label>
            </div>

            <div>
                <label for="nombre">RECTOR:
                <select name="caja2" class="caja1" required>
                    <option value="0">-- Seleccione --</option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM persona";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdPersona']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Apellido']."</option>";
                        }
                    ?>
                </select>
                <br><br><br>
                </label>
            </div>

            <div>
                <label for="nombre">MATERIA:
                <select name="caja3" class="caja1">
                    <option value="0">-- Seleccione Materia --</option>
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
            <div>
                <label for="nombre">PERIODO:
                <select name="caja4" class="caja1">
                    <option value="0">-- Seleccione Periodo --</option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM periodo";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdPeriodo']."'>".$RESPUESTA2['Nombre']."</option>";
                        }
                    ?>
                </select>
                <br><br>
                </label>
            </div>
            <div>
                <label for="nombre">GRADO:
                <select name="caja5" class="caja1">
                    <option value="0">-- Seleccione Grado --</option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM grado";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdGrado']."'>".$RESPUESTA2['Nombre'].",".$RESPUESTA2['Curso']."</option>";
                        }
                    ?>
                </select>
                <br><br>
                </label>
            </div>
            <div class="kj5">
                <label for="fecha">PUESTO ACADEMICO:</label><br>
                <input type="TEXT" class="kj6" id="fecha" name="caja6" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">OBSERVACIONES:</label><br>
                <input type="TEXT" class="kj6" id="fecha" name="caja7" required><br><br>
            </div>
            <button type="submit" class="kj7" name="ENVIAR">INSERTAR</button>
        </div>
    </form>


    <?php
    if (isset($_POST['ENVIAR'])) {
        // Validación de campos seleccionados
        $ESTUDIANTE = $_POST['caja1'];
        $RECTOR = $_POST['caja2'];
        $MATERIA = $_POST['caja3'];
        $PERIODO = $_POST['caja4'];
        $GRADO = $_POST['caja5'];
        $PUESTOACADEMICO = $_POST['caja6'];
        $OBSERVACIONES = $_POST['caja7'];

            $SQL = "INSERT INTO boletin ( Estudiante, Rector, Materia, Periodo, Grado, PuestoAcademico, Observaciones) VALUES ('$ESTUDIANTE', '$RECTOR', '$MATERIA', '$PERIODO', '$GRADO', '$PUESTOACADEMICO', '$OBSERVACIONES');";
            $RESULT = mysqli_query($conexion, $SQL) or die(mysqli_error($conexion));

            echo '<script>alert("Boletin Insertado");</script>';
            echo '<script>window.location.href = "Boletin.php";</script>';
        }
    ?>
</div>
    </div>

<?php INCLUDE ('../TEMPLATE/footer.php');?>
