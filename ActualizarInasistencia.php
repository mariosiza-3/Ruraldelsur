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
<h1 class="kj2">Actualizar Inasistencia</h1>

<?php
if (isset($_GET['ACTUALIZAR'])) {
    $EDITAR_ID = $_GET['ACTUALIZAR'];
    $CONSULTA = "SELECT * FROM inasistencia WHERE IdExcusa='$EDITAR_ID'";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA) or die(mysqli_error($conexion));
    $FILA = mysqli_fetch_assoc($EJECUTAR);
    
    $IDINASITENCIA=$FILA['IdExcusa'];
    $FECHAI=$FILA['FechaInicio'];
    $FECHAF=$FILA['FechaFin'];  
    $CANTH=$FILA['CantidadHoras'];
    $EXCUSA=$FILA['Excusa'];
    $ESTUDIANTE=$FILA['Estudiante'];  
    $DOCENTE=$FILA['Docente']; 
}
?>
<form name="update" method="post" action="" enctype="multipart/form-data">


    <p>ID INASISTENCIA:
        <input type="text" name="IdExcusa" value="<?php echo $IDINASITENCIA; ?>" readonly DISABLED>
    </p>
    
    <p>FECHA INICIO:
        <input type="Text" name="caja1" class="kj6" value="<?php echo $FECHAI; ?>" required>
    </p>
    
    <p>FECHA FIN:
        <input type="Text" name="caja2" class="kj6" value="<?php echo $FECHAF; ?>" required>
    </p>
    <p>CANTIDAD DE HORAS:
        <input type="Text" name="caja3" class="kj6" value="<?php echo $CANTH; ?>" required>
    </p>
    
    <p>EXCUSA:
        <input type="Text" name="caja4" class="kj6" value="<?php echo $EXCUSA; ?>" required>
    </p>
    
    <label for="nombre">ESTUDIANTE:
        <select name="caja5" class="caja1" required>
            <option value="<?php echo $ESTUDIANTE; ?>"><?php echo $ESTUDIANTE; ?></option>
            <?php
                $CONSULTA2 = "SELECT * FROM estudiante";
                $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                    // Solo añadir las opciones de estudiantes que existan
                    echo "<option value='".$RESPUESTA2['IdEstudiante']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Apellido']."</option>";
                }
            ?>
        </select>
        <BR><BR>
    </label>
                
    <label for="nombre">DOCENTE:
        <select name="caja6" class="caja1" required>
            <option value="<?php echo $DOCENTE; ?>"><?php echo $DOCENTE; ?></option>
            <?php
                $CONSULTA2 = "SELECT * FROM docente";
                $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                    // Solo añadir las opciones de docentes que existan
                    echo "<option value='".$RESPUESTA2['IdDocente']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Apellido']."</option>";
                }
            ?>
        </select>
        <BR><BR>
    </label>

    <button type="submit" class="kj7" name="ACTUALIZAR">Actualizar</button>
</form>

<?php
if (isset($_POST['ACTUALIZAR'])) {
    $FECHAI = $_POST['caja1'];
    $FECHAF = $_POST['caja2'];
    $CANTH = $_POST['caja3'];
    $EXCUSA = $_POST['caja4'];
    $ESTUDIANTE = $_POST['caja5'];
    $DOCENTE = $_POST['caja6'];

    // Verificar que el estudiante existe en la tabla 'estudiante'
    $verificar_estudiante = "SELECT 1 FROM estudiante WHERE IdEstudiante='$ESTUDIANTE' LIMIT 1";
    $resultado_estudiante = mysqli_query($conexion, $verificar_estudiante);
    
    // Verificar que el docente existe en la tabla 'docente'
    $verificar_docente = "SELECT 1 FROM docente WHERE IdDocente='$DOCENTE' LIMIT 1";
    $resultado_docente = mysqli_query($conexion, $verificar_docente);

    if (mysqli_num_rows($resultado_estudiante) > 0 && mysqli_num_rows($resultado_docente) > 0) {
        // Si los IDs son válidos, proceder a actualizar
        $ACTUALIZAR = "UPDATE inasistencia SET FechaInicio='$FECHAI', FechaFin='$FECHAF', CantidadHoras='$CANTH', Excusa='$EXCUSA', Estudiante='$ESTUDIANTE', Docente='$DOCENTE' WHERE IdExcusa='$IDINASITENCIA'";

        if (mysqli_query($conexion, $ACTUALIZAR)) {
            echo '<script>alert("Inasistencia Actualizado");</script>';
            echo '<script>window.location.href="Inasistencia.php";</script>';
        } else {
            echo "Error al actualizar: " . mysqli_error($conexion);
        }
    } else {
        // Si los IDs no existen, mostrar un mensaje de error
        echo '<script>alert("El estudiante o el docente no existen en la base de datos.");</script>';
    }
}
?>

</div>



<?php INCLUDE ('../TEMPLATE/footer.php');?>
