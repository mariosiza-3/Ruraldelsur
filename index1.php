<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
SESSION_START();

// Verifica si la variable de sesión contiene los datos necesarios
if (!isset($_SESSION['IdEstudiante'])) {
    echo '<script>alert("Debe iniciar sesión para acceder a esta página.");</script>';
    echo '<script>window.location.href = "index.php";</script>';
    exit;
}
REQUIRE_ONCE('paginas/CONEXION/conexion.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Rural del sur</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Schooling Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/jquery-ui.css" type='text/css' />
<link rel="stylesheet" href="css/smoothbox.css" type='text/css' >
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->

</head>
<body>
<script src="js/jquery.vide.min.js"></script>
	<div data-vide-bg="video/srix">
		<div class="center-container">
			<div class="navigation">
				<div class="container">
					<div class="logo">
						<h2><a href="index.html">Rural del Sur</a></h2>
					</div>
					<div class="navigation-right">
						<span class="menu"><img src="images/menu.png" alt=" " /></span>
						<nav class="link-effect-3" id="link-effect-3">
							<ul class="nav1 nav nav-wil">
								<li class="active"><a data-hover="Home" href="index.html">Inicio</a></li>
								<li><a data-hover="About" href="#about" class="scroll">Matriculas</a></li>
								<li><a data-hover="Team" href="#team" class="scroll">Noticias</a></li>
								<li><a data-hover="Gallery" href="#reserva" class="scroll">Citas Psicológicas</a></li>
								<li><a data-hover="Testimonials" href="#testimonials" class="scroll">Boletín</a></li>
								<li><a data-hover="Contact" href="#contact" class="scroll">Asistencia</a></li>
								<li><a href="paginas/CERRARSESION/CerrarSesion.php"><img src="images/cerrarsesion.png" style="height: 40px; width: 40px;"></a></li>

							</ul>
						</nav>
							<!-- script-for-menu -->
								<script>
								   $( "span.menu" ).click(function() {
									 $( "ul.nav1" ).slideToggle( 300, function() {
									 // Animation complete.
									  });
									 });
								</script>
							<!-- /script-for-menu -->
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="w3ls_banner_info">
				<div class="container">
				<div style="display: flex; justify-content: center; align-items: center; margin-top: -40px;">
  						<img src="images/IERS.png" style="height: auto; width: 100%; max-width: 150px;">
				</div>
					<h3>INSTITUCIÓN EDUCATIVA RURAL DEL SUR</h3>
					<p>¡Bienvenidos! Aquí fomentamos el aprendizaje, la creatividad y el crecimiento personal. ¡Explora y descubre todo lo que tenemos para ofrecer! </p>

				</div>
			</div>
		</div>
	</div>
<!-- about -->
	<div class="about">
		<div class="container">
			<div class="agileits_about_grids">
				<div class="col-md-6 agileits_about_grid_left">
					<h3>Misión</h3>
					<p>La Institución Educativa Rural del Sur tiene como misión contribuir a la formación de seres humanos integrales, autónomos, críticos, competentes para promover su propio desarrollo, fundamentados en principios éticos del respeto, la tolerancia y la responsabilidad individual y colectiva, para mejorar su calidad de vida, fortaleciendo su sentido democrático, ecológico, y social, a través de la implementación de una modalidad técnica que permita trascender en la transformación de su contexto.</p>
				</div>
				<div class="col-md-6 agileits_about_grid_right">
					<img src="images/imagen3.jpg" alt=" " class="img-responsive" />
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="col-md-4 wthree_banner_bottom_left">
				<img src="images/1.jpg" alt=" " class="img-responsive" />
			</div>
			<div class="col-md-8 wthree_banner_bottom_right">
				<h3>Visión</h3>
				<p>La Institución Educativa Rural del Sur para el 2030 será reconocida por su calidad, excelencia, productividad y por ser generadora de cambios sociales a través de la formación integral de niños y jóvenes emprendedores, competentes y con principios éticos para desempeñarse en el mundo globalizado.</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //banner-bottom -->
<!-- banner-bottom-image-text -->
	<div id="about" class="banner-bottom-image-text">
		<div class="col-md-8 banner-bottom-image-text-left">
			<h3>Requisitos Matricula</h3>
			<p>- Nombres y apellidos del estudiante<br>
				- Registro civil<br>
				- Documento de identidad del estudiante<br>
				- Documento de identidad del padre de familia o tutor<br>
				- Recibo de la luz<br>
				- Cartilla de vacunación<br>
				- Fotografías del estudiante<br>
				- Adress<br>
				- Sisbén<br>
				- Formato de matrícula</p>
		</div>
		<div class="col-md-4 banner-bottom-image-text-right">
			<img src="images/imagenlol.jpg" alt=" " class="img-responsive" />
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- //banner-bottom-image-text -->
<!-- team -->



	<div class="team" id="team">
	<div class="container">
		<h3>Noticias y Novedades</h3>
		<p class="nostrud">Conoce las novedades que tenemos para mostrarte de nuestra Institución</p>
		<div class="agile_team_grids">
			<div class="col-md-3 agile_team_grid">
				<div class="view view-sixth">
					<img src="images/imagen4.jpg" alt=" " class="img-responsive" />
					<div class="mask">
						<h5>Presentaciones</h5>
						<p>Presentación de danzas y programas a cargo de nuestros estudiantes</p>
						<div class="agileits_social_icons">
							<a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a>
							<a href="#" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a>
							<a href="#" class="icon-button google-plus"><i class="icon-google-plus"></i><span></span></a>
						</div>
					</div>
				</div>
				<h4>Mario Siza</h4>
				<p>01-11-2024</p>
			</div>
	
				<div class="col-md-3 agile_team_grid">
					<div class="view view-sixth">
						<img src="images/imagen5.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h5>Charla Semana de la Páz</h5>
							<p>Nuestros estudiantes disfrutaron de una charla sobre la Paz, invitacion de la Alcaldia </p>
							<div class="agileits_social_icons">
								<a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a>
								<a href="#" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a>
								<a href="#" class="icon-button google-plus"><i class="icon-google-plus"></i><span></span></a>
							</div>
						</div>
					</div>
					<h4>Mario</h4>
					<p>Docente</p>
				</div>
				<div class="col-md-3 agile_team_grid">
					<div class="view view-sixth">
						<img src="images/imagen6.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h5>Dia del boyacensimo</h5>
							<p>Mostramos lo orgullosos que estna nuestros estudiantes de sus raices con una oresentacion gastronomica de Boyáca</p>
							<div class="agileits_social_icons">
								<a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a>
								<a href="#" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a>
								<a href="#" class="icon-button google-plus"><i class="icon-google-plus"></i><span></span></a>
							</div>
						</div>
					</div>
					<h4>Mario </h4>
					<p>Docente</p>
				</div>
				<div class="col-md-3 agile_team_grid">
					<div class="view view-sixth">
						<img src="images/imagen7.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h5>Planeta</h5>
							<p>Quisimos junto a nustros estudiantes ayudar al planeta con la siempra de arboles.</p>
							<div class="agileits_social_icons">
								<a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a>
								<a href="#" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a>
								<a href="#" class="icon-button google-plus"><i class="icon-google-plus"></i><span></span></a>
							</div>
						</div>
					</div>
					<h4>Andres</h4>
					<p>Docente</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //team -->
<!-- gallery -->
	<div class="gallery" id="gallery">
		<h3>Galleria de noticias</h3>
		<p class="nostrud">Te tenemos una serie de noticas relevantes de nuestra institucion.</p>
		<div class="w3agile_gallery_grids">
			<div class="col-md-3 w3agile_gallery_grid">
				<div class="w3agile_gallery_image">
					<a class="sb" href="images/imagen9.jpg" title="Integracion con otras instituciones donde nuestra intutución participo gracias a la colaboracion de nuestros docentes y estudiantes">
						<figure>
							<img src="images/imagen9.jpg" alt="" class="img-responsive" />
							<figcaption>
								<h4>Participacion Carros Electricos</h4>
								<p>
									Esto se realizo en dia 29 de Octubre de 2024 
								</p>
							</figcaption>
						</figure>
					</a>
				</div>
			</div>
			<div class="col-md-3 w3agile_gallery_grid">
				<div class="w3agile_gallery_image">
					<a class="sb"  href="images/imagen10.jpg" title="Celebramos el cumpleaños de nuestra instutucion educativa, con una integracion entre estduiantes y docentes donde de esto salieron muchas presentaciones, felicidad y orgullo por la IERS">
						<figure>
							<img src="images/imagen10.jpg" alt="" class="img-responsive" />
							<figcaption>
								<h4>Cumpleaños de nuestra Institucion</h4>
								<p>
									¡Feliz cumpleaños a nuestra amada Rural del Sur, felices 22 años!
								</p>
							</figcaption>
						</figure>
					</a>
				</div>
			</div>
			<div class="col-md-3 w3agile_gallery_grid">
				<div class="w3agile_gallery_image">
					<a class="sb" title="Los padres de nuestros estudiantes realizaron una integracion debido a su satisfaccion de que casi culminan con el periodo academico sus hijos" href="images/imagen11.jpg">
						<figure>
							<img src="images/imagen11.jpg" alt="" class="img-responsive" />
							<figcaption>
								<h4>Compartir Padres de familia </h4>
								<p>
									Los padres de familia realizon una integracion encabezado por loa padres de familia representantes.
								</p>
							</figcaption>
						</figure>
					</a>
				</div>
			</div>
			<div class="col-md-3 w3agile_gallery_grid">
				<div class="w3agile_gallery_image">
					<a class="sb" title="Nuestros estdiantes organizaron una serie de presentaciones de diferentes tipos donde nos mostraban danzas, coplas, poemas, dialectos de nuestras regiones" href="images/imagen12.jpg">
						<figure>
							<img src="images/imagen12.jpg" alt="" class="img-responsive" />
							<figcaption>
								<h4>Presentaciones</h4>
								<p>
									Presentanciones culturales de las regiones de Colombia
								</p>
							</figcaption>
						</figure>
					</a>
				</div>
			</div>
			<div class="col-md-3 w3agile_gallery_grid">
				<div class="w3agile_gallery_image">
					<a class="sb" title="Realizamos celebracion eucaristica en honor al cumpleaños del colegio agradeciendo a un ser superior por darnos el privilegio de seguir enseñandoles a nuestros estudiantes" href="images/imagen13.jpg">
						<figure>
							<img src="images/imagen13.jpg" alt="" class="img-responsive" />
							<figcaption>
								<h4>Celebracion Ecuristica</h4>
								<p>
									En honor a nuestro colegio.
								</p>
							</figcaption>
						</figure>
					</a>
				</div>
			</div>
			<div class="col-md-3 w3agile_gallery_grid">
				<div class="w3agile_gallery_image">
					<a class="sb" title="La alcaldia de la ciudad de Tunja realizo una serie de charlas sobre la paz donde fue invitada nuestra institucion, creando un entorno de integracion con experiencias, opiniones y demas." href="images/imagen14+.jpg">
						<figure>
							<img src="images/imagen14+.jpg" alt="" class="img-responsive" />
							<figcaption>
								<h4>integracion con otras instituciones</h4>
								<p>
									Charla de integracion entre instituciones municipales
								</p>
							</figcaption>
						</figure>
					</a>
				</div>
			</div>
			<div class="col-md-3 w3agile_gallery_grid">
				<div class="w3agile_gallery_image">
					<a class="sb" title="Charla a nivel municipal en temas de sociedad y paz con nuestros estudiantes de Once B" href="images/imagen15.jpg">
						<figure>
							<img src="images/imagen15.jpg" alt="" class="img-responsive" />
							<figcaption>
								<h4>Charla a estudiantes de undecimo</h4>
								<p>
								Charla para los estudiantes de undecimo-B
								</p>
							</figcaption>
						</figure>
					</a>
				</div>
			</div>
			<div class="col-md-3 w3agile_gallery_grid">
				<div class="w3agile_gallery_image">
					<a class="sb" title="El banco bogota trajo su carro movible a nuestras instalaciones para poder compartir sus conocimientos mediante tecnologia y economia" href="images/imagen16.jpg">
						<figure>
							<img src="images/imagen16.jpg" alt="" class="img-responsive" />
							<figcaption>
								<h4> Visita Banco de bogota</h4>
								<p>
									Esta entidad comparte sus conocimientos y tecnològia con nuestros estudiantes
								</p>
							</figcaption>
						</figure>
					</a>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
		<script type="text/javascript" src="js/smoothbox.jquery2.js"></script>
	</div>
<!-- //gallery -->
 <!-- team-bottom -->
 <div class="team-bottom" id="reserva">
	<div class="container">
		<h3>Cita Psicologica</h3>
		<p>Tu salud mental es importante para nosotros. Cuéntanos, estamos aquí para apoyarte.</p>
	<div class="reservation">
			<div class="w3_book_date">
				<form action="#" method="POST">
					<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					<input class="date" id="datepicker" type="text" name="Fecha" value="Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Date';}" required="">
				</form>
			</div>
			<div class="w3_working_time">
				<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
				<input id="country1" onchange="change_country(this.value)" type="Time"  name="Hora" class="frm-field required sect"  required="" style:" background-color:White;">
				
			</div>
			<div class="w3_working_time w3_working_time1">
				<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
				<select id="country" onchange="change_country(this.value)" class="frm-field required sect"  name="Motivo">
					<option value="null">--Tipo--</option>
					<option value="null">Personal</option>
					<option value="null">Familiar</option> 
					<option value="null">Social</option>						
				</select>
			</div>				
			<div class="clearfix"> </div>	
			<form action="#" method="post">
				<input type="submit" value="Submit">
			</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y recibir los datos del formulario
    $motivo = isset($_POST['motivo']) ? trim($_POST['motivo']) : '';
    $hora = isset($_POST['hora']) ? trim($_POST['hora']) : '';
    $fecha = isset($_POST['fecha']) ? trim($_POST['fecha']) : '';

    if (empty($motivo) || empty($hora) || empty($fecha)) {
        die("Error: Todos los campos del formulario son obligatorios.");
    }

    // Seleccionar un psicólogo aleatorio de la base de datos
    $psicologoQuery = "SELECT IdPsicologo FROM psicologo ORDER BY RAND() LIMIT 1";
    $resultado = $conexion->query($psicologoQuery);
    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $psicologo = $fila['IdPsicologo'];
    } else {
        die("No hay psicólogos disponibles.");
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO Cita (Motivo, Hora, Fecha, Estudiante, Psicologo) VALUES (?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssii", $motivo, $hora, $fecha, $estudiante, $psicologo);

        // Ejecutar la declaración
        if ($stmt->execute()) {
            echo "Cita registrada exitosamente.";
        } else {
            echo "Error al registrar la cita: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
}

// Cerrar la conexión
$conexion->close();
?>
		</div>
		<!-- start-date-piker -->
			<script src="js/jquery-ui.js"></script>
			  <script>
					$(function() {
						$( "#datepicker" ).datepicker();
					});
			  </script>
		<!-- //End-date-piker -->
	</div>
</div>
<!-- //team-bottom -->
<!-- testimonials -->
<div class="testimonials" id="testimonials">
    <div class="container">
        <h3>Boletín</h3>
        <p class="nostrud">Consulta tu boletín acá.</p>
        <div class="testimonials-grids">
            <form action="" method="post" class="mario1">
                <h2>Consulta de Identificación</h2>
        
                <label for="tipo-identificacion" class="alberto">Tipo de Identificación:</label>
                <select id="tipo-identificacion" name="tipo-identificacion" class="jimenez" required>
                    <option value="">Seleccione...</option>
                    <option value="DNI">Cédula de ciudadanía</option>
                    <option value="Pasaporte">Tarjeta de identidad</option>
                    <option value="Licencia">Documento de extranjería</option>
                </select>
        
                <label for="numero-identificacion" class="alberto">Número de Identificación:</label>
                <input type="text" id="numero-identificacion" name="numero-identificacion" class="jimenez" required>
        
                <button type="submit" class="siza">Buscar</button>
            </form>
			<?php
// Incluir la biblioteca FPDF
require('fpdf/fpdf.php');

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $tipoIdentificacion = isset($_POST['tipo-identificacion']) ? $_POST['tipo-identificacion'] : null;
    $numeroIdentificacion = isset($_POST['numero-identificacion']) ? $_POST['numero-identificacion'] : null;

    // Verificar si los valores existen
    if ($tipoIdentificacion && $numeroIdentificacion) {
        // Paso 1: Buscar al estudiante en la tabla 'estudiante'
        $sqlEstudiante = "SELECT IdEstudiante FROM estudiante WHERE NumeroDocumento = ?";
        $stmtEstudiante = $conexion->prepare($sqlEstudiante);

        if ($stmtEstudiante === false) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }

        // Vincular los parámetros de forma segura
        $stmtEstudiante->bind_param("s", $numeroIdentificacion);
        $stmtEstudiante->execute();
        $resultEstudiante = $stmtEstudiante->get_result();

        // Verificar si se encontró al estudiante
        if ($resultEstudiante->num_rows > 0) {
            // Obtener el ID del estudiante
            $rowEstudiante = $resultEstudiante->fetch_assoc();
            $idEstudiante = $rowEstudiante['IdEstudiante'];

            // Paso 2: Buscar el boletín del estudiante en la tabla 'boletin'
            $sqlBoletin = "SELECT * FROM boletin WHERE Estudiante = ?";
            $stmtBoletin = $conexion->prepare($sqlBoletin);

            if ($stmtBoletin === false) {
                die("Error en la preparación de la consulta: " . $conexion->error);
            }

            // Vincular el parámetro de forma segura
            $stmtBoletin->bind_param("i", $idEstudiante);
            $stmtBoletin->execute();
            $resultBoletin = $stmtBoletin->get_result();

            // Verificar si se encontró el boletín
            if ($resultBoletin->num_rows > 0) {
                // Obtener los datos del boletín
                $rowBoletin = $resultBoletin->fetch_assoc();
                $idMatricula = isset($rowBoletin['IdMatricula']) ? $rowBoletin['IdMatricula'] : 'N/A';
                $fechaInicio = isset($rowBoletin['FechaInicio']) ? $rowBoletin['FechaInicio'] : 'N/A';
                $fechaFin = isset($rowBoletin['FechaFin']) ? $rowBoletin['FechaFin'] : 'N/A';
                $grado = isset($rowBoletin['Grado']) ? $rowBoletin['Grado'] : 'N/A';
                $estudiante = isset($rowBoletin['Estudiante']) ? $rowBoletin['Estudiante'] : 'N/A';

                // Crear el objeto PDF
                $pdf = new FPDF();
                $pdf->AddPage();

                // Establecer título y contenido
                $pdf->SetFont('Arial', 'B', 16);
                $pdf->Cell(200, 10, 'Boletín de Notas', 0, 1, 'C');

                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(100, 10, "Estudiante: " . $estudiante, 0, 1);
                $pdf->Cell(100, 10, "Matrícula: " . $idMatricula, 0, 1);
                $pdf->Cell(100, 10, "Grado: " . $grado, 0, 1);
                $pdf->Cell(100, 10, "Fecha de Inicio: " . $fechaInicio, 0, 1);
                $pdf->Cell(100, 10, "Fecha de Fin: " . $fechaFin, 0, 1);

                // Salida del PDF para descarga
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="Boletin_' . $estudiante . '.pdf"');
                $pdf->Output();
                exit; // Detener el script después de generar el PDF
            } else {
                echo "No se encontró el boletín del estudiante.";
            }
        } else {
            echo "No se encontró el estudiante con el número de identificación proporcionado.";
        }
    } else {
        echo "Por favor, complete todos los campos del formulario.";
    }
}
?>
        </div>
    </div>
</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //testimonials -->
<!-- contact -->
	<div class="contact" id="contact">
		<div class="col-md-6 w3agile_contact_left">
			<h3>Asistencia</h3>
			<p>Asistencia de nuestros estudiantes acá.</p>
			<form class="for1">
				<label for="for2">Tipo de documento *</label>
				<select id="for2" name="tipo-documento" required>
					<option value="">Seleccione tipo de documento...</option>
					<option value="dni">Cedula de ciudadania</option>
					<option value="pasaporte">Tarjeta de identidad</option>
					<option value="carnet">Documento extrangeria</option>
					<!-- Añadir más opciones si es necesario -->
				</select>
		
				<label for="for3">Número de documento *</label>
				<input type="text" id="for3" name="numero-documento" placeholder="Número de documento" required>
		
				<button type="submit" id="for4">Consultar</button>
			</form>
		</div>
		<div class="col-md-6 w3agile_contact_right">
			<h3><a href="index.html">Rural del sur</a></h3>
			<div class="col-xs-6 w3agile_contact_right_agileinfo">
				<h4>Direcciín</h4>
				<p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Vereda Runta - Tunja , Tunja, Colombia.</i></p>
				<p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>(+57) 310 5547 144</i></p>
				<p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="ricardo.estupinan@ruraldelsur.edu.co">ricardo@ruraldelsur.edu.co</a></p>
			</div>
			<div class="col-xs-6 w3agile_contact_right_agileinfo">
				<h4>Redes Sociales</h4>
				<div class="agileits_social_icons">
					<a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a>
					<a href="#" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a>
					<a href="#" class="icon-button google-plus"><i class="icon-google-plus"></i><span></span></a>
				</div>
			</div>
			<div class="clearfix"> </div>
			<div class="w3_copy_right">
				<p>©2024 Institucion Educativa Rural del Sur.|Diseñada por: <a href="https://www.instagram.com/hesizas_3?igsh=MXhleXBsMnVubmJvcA==">Mario S</a></p>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- //contact -->
<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>