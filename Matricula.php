<?php
SESSION_START();
require_once('../CONEXION/Conexion.php');

// Verificar si la conexión es válida
if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>Listado de Matrículas</title>
</head>
<body>
<?php INCLUDE('../TEMPLATE/header.php'); ?>
<?php INCLUDE('../TEMPLATE/contenido1.php'); ?>

<h2>LISTADO DE MATRÍCULAS</h2>
<br>
<a id="insertboton1" href="../ESTUDIANTE/InsertarEstudiante.php">+ ESTUDIANTE</a>
<a id="insertboton1" href="InsertarMatricula.php">+ MATRICULA</a>
<br><br>

<table border="1">
    <thead>
        <tr>
            <th>ID MATRICULA</th>
            <th>FECHA INICIO</th>
            <th>FECHA FIN</th>
            <th>DOCUMENTOS</th>
            <th>SECRETARIO</th>
            <th>GRADO</th>
            <th>ESTUDIANTE</th>
            <th>ACTUALIZAR</th>
            <th>ELIMINAR</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Configuración de paginación
        $SQL_REGISTROS = mysqli_query($conexion, "SELECT COUNT(*) AS TOTAL FROM matricula");
        $RESULT_REGISTROS = mysqli_fetch_array($SQL_REGISTROS);
        $TOTAL = $RESULT_REGISTROS['TOTAL'];
        $POR_PAGINA = 5;

        $PAGINA = isset($_GET['PAGINA']) ? (int)$_GET['PAGINA'] : 1;
        $DESDE = ($PAGINA - 1) * $POR_PAGINA;
        $TOTAL_PAGINAS = ceil($TOTAL / $POR_PAGINA);

        // Consulta para obtener datos de matrícula
        $CONSULTA = "
        SELECT 
            m.IdMatricula, 
            m.FechaInicio, 
            m.FechaFin, 
            m.Documentos, 
            m.Secretario, 
            g.Nombre AS NombreGrado, 
            e.Nombre AS NombreEstudiante
        FROM 
            matricula m
        LEFT JOIN grado g ON m.Grado = g.IdGrado
        LEFT JOIN estudiante e ON m.Estudiante = e.IdEstudiante
        LIMIT $DESDE, $POR_PAGINA";
        $EJECUTAR = mysqli_query($conexion, $CONSULTA);

        // Mostrar resultados
        while ($FILA = mysqli_fetch_assoc($EJECUTAR)) {
            $IDMATRICULA = $FILA['IdMatricula'];
            $FECHAI = $FILA['FechaInicio'];
            $FECHAF = $FILA['FechaFin'];
            $DOCUMENTOS = $FILA['Documentos']; // Mostrar solo el nombre del archivo
            $SECRETARIO = $FILA['Secretario'];
            $GRADO = $FILA['NombreGrado'] ? $FILA['NombreGrado'] : "No asignado";
            $ESTUDIANTE = $FILA['NombreEstudiante'] ? $FILA['NombreEstudiante'] : "No asignado";
        ?>
        <tr>
            <td><?php echo $IDMATRICULA; ?></td>
            <td><?php echo $FECHAI; ?></td>
            <td><?php echo $FECHAF; ?></td>
            <td><a href="../uploads/<?php echo $DOCUMENTOS; ?>" target="_blank"><?php echo $DOCUMENTOS; ?></a></td>
            <td><?php echo $SECRETARIO; ?></td>
            <td><?php echo $GRADO; ?></td>
            <td><?php echo $ESTUDIANTE; ?></td>
            <td>
                <a href="ActualizarMatricula.php?ACTUALIZAR=<?php echo $IDMATRICULA; ?>">  
                    <img style="width: 50px;height: 50px;" src="../IMG/actualizar.png" alt="Actualizar">
                </a>
            </td>
            <td>
                <a href="Matricula.php?ELIMINAR=<?php echo $IDMATRICULA; ?>" onclick="return confirm('¿Estás seguro de eliminar esta matrícula?');"> 
                    <img style="width: 50px;height: 50px;" src="../IMG/eliminar.png" alt="Eliminar">
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<br>

<!-- Paginación -->
<div class="pagination">
    <center>
        <a href="Matricula.php?PAGINA=1">Primera</a>
        <?php for ($i = 1; $i <= $TOTAL_PAGINAS; $i++): ?>
            <a href="Matricula.php?PAGINA=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
        <a href="Matricula.php?PAGINA=<?php echo $TOTAL_PAGINAS; ?>">Última</a>
    </center>
</div>

<?php INCLUDE('../TEMPLATE/footer.php'); ?>
</body>
</html>
