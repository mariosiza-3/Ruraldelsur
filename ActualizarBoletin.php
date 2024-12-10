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
<h1 class="kj2">Actualizar Boletin</h1>

<?php
if (isset($_GET['ACTUALIZAR'])) {
    $EDITAR_ID = $_GET['ACTUALIZAR'];
    $CONSULTA = "SELECT * FROM boletin WHERE IdBoletin ='$EDITAR_ID'";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA) or die(mysqli_error($conexion));
    $FILA = mysqli_fetch_assoc($EJECUTAR);
    
    $IDBOLETIN=$FILA['IdBoletin'];
    $ESTUDIANTE=$FILA['Estudiante'];
    $RECTOR=$FILA['Rector'];    
    $MATERIA=$FILA['Materia']; 
    $PERIODO=$FILA['Periodo'];
    $GRADO=$FILA['Grado'];    
    $PUESTOACADEMICO=$FILA['PuestoAcademico']; 
    $OBSERVACIONES=$FILA['Observaciones'];
}
?>

<form name="update" method="post" action="" enctype="multipart/form-data">
    

    <p>ID BOLETIN:
        <input type="text" name="IdBoletin" value="<?php echo $IDBOLETIN; ?>" readonly disabled>
    </p>
    
        <label for="nombre">ESTUDIANTE:
                <select name="caja1" class="caja1" required>
                    <option><?php echo $ESTUDIANTE; ?></option>
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
    

        <label for="nombre">RECTOR:
                <select name="caja2" class="caja1" required>
                    <option><?php echo $RECTOR; ?></option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM persona";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdPersona']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Apellido']."</option>";
                        }
                    ?>
                </select>
                <br><br>
                </label>
        <label for="nombre">MATERIA:
                <select name="caja3" class="caja1">
                    <option ><?php echo $MATERIA; ?></option>
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

    
        <label for="nombre">PERIODO:
                <select name="caja4" class="caja1">
                    <option><?php echo $PERIODO; ?></option>
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
    
        <label for="nombre">GRADO:
                <select name="caja5" class="caja1">
                    <option ><?php echo $GRADO; ?></option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM grado";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdGrado']."'>".$RESPUESTA2['Nombre'].",".$RESPUESTA2['Curso']."</option>";
                        }
                    ?>
                </select>
                <br>
                </label>

    <p>PUESTO ACADEMICO:
        <input type="text" name="caja6" value="<?php echo $PUESTOACADEMICO; ?>" required>
    </p>
    
    <p>OBSERVACIONES:
        <input type="Text" name="caja7" class="kj6" value="<?php echo $OBSERVACIONES; ?>" required>
    </p>
    

    
    <button type="submit" class="kj7" name="ACTUALIZAR">Actualizar</button>
</form>

<?php
if (isset($_POST['ACTUALIZAR'])) {
    $ESTUDIANTE = $_POST['caja1'];
    $RECTOR = $_POST['caja2'];
    $MATERIA = $_POST['caja3'];
    $PERIODO = $_POST['caja4'];
    $GRADO = $_POST['caja5'];
    $PUESTOACADEMICO = $_POST['caja6'];
    $OBSERVACIONES = $_POST['caja7'];
    
    $ACTUALIZAR = "UPDATE boletin SET Estudiante='$ESTUDIANTE', Rector='$RECTOR', Materia='$MATERIA', Periodo='$PERIODO', Grado='$GRADO', PuestoAcademico='$PUESTOACADEMICO', Observaciones='$OBSERVACIONES' WHERE IdBoletin='$IDBOLETIN'";
    
    if (mysqli_query($conexion, $ACTUALIZAR)) {
        echo '<script>alert("Boletin Actualizado");</script>';
        echo '<script>window.location.href="Boletin.php";</script>';
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}
?>
</div>
</div>


<?php INCLUDE ('../TEMPLATE/footer.php');?>
