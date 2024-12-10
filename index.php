<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
SESSION_START();
REQUIRE_ONCE('paginas/CONEXION/conexion.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Rural del Sur</title>
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
						<h2><a href="index.php">Rural del Sur</a></h2>
					</div>
					<div class="navigation-right">
						<span class="menu"><img src="images/menu.png" alt=" " /></span>
						<nav class="link-effect-3" id="link-effect-3">
							<ul class="nav1 nav nav-wil">
								<li class="active"><a data-hover="Home" href="index.html">Inicio</a></li>
								<li><a data-hover="About" href="#about" class="scroll">Matriculas</a></li>
								<li><a data-hover="Team" href="#team" class="scroll">Noticias</a></li>
								<li><a data-hover="Gallery" href="#reserva" class="scroll">Citas Psicológicas</a></li>
								<li><a data-hover="Testimonials" href="#testimonials" class="scroll">PQR</a></li>
								<li><a data-hover="Contact" href="#contact" class="scroll">Contáctanos</a></li>
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
				<div style="display: flex; justify-content: center; align-items: center; margin-top: -20px;">
  						<img src="images/IERS.png" style="height: auto; width: 98%; max-width: 150px;">
				</div>

					<h3>INSTITUCIÓN EDUCATIVA RURAL DEL SUR</h3>
					<p>¡Bienvenidos! Aquí fomentamos el aprendizaje, la creatividad y el crecimiento personal. ¡Explora y descubre todo lo que tenemos para ofrecer! </p>
					<div class="more">
						<a href="#" class="hvr-underline-from-center" data-toggle="modal" data-target="#myModal">INICIAR SESION</a>
					</div>
					<!--modal-video-->
					<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									INICIAR SESIÓN
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
								</div>
								<section>
									<div class="modal-body">
										<img src="images/imagen1.jpg" alt=" " class="img-responsive" />
										<div class="form-container12">
											<h2>¡Bienvenidos!</h2>
											<form action="paginas/INICIODESESION/validalogin.php" method="POST">
												<input type="text" name="username" class="input-field" placeholder="Usuario" required>
												<input type="password" name="password" class="input-field" placeholder="Contraseña" required>
												<button type="submit" class="btn">Iniciar Sesión</button>
												
												<?php
											
												IF(ISSET($_SESSION['ERROR'])){
													$ERROR = $_SESSION["ERROR"];
													echo "<span> $ERROR </SPAN>";
												}
												?>
											</form>
											<!-- Enlaces a otros modales -->
											<a href="#forgotPasswordModal" data-toggle="modal" data-dismiss="modal" class="link">¿Olvidaste tu contraseña?</a>
										</div>
									</div>
								</section>
							</div>
						</div>
					</div>
<!-- Modal de Recuperar Contraseña -->
<div class="modal video-modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                RECUPERAR CONTRASEÑA
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>                        
            </div>
            <section>
                <div class="modal-body">
                    <img src="images/imagen1.jpg" alt=" " class="img-responsive" />
                    <div class="form-container12">
                        <h2>Recupera tu contraseña</h2>
                        <form action="index.php" method="POST">
							<input type="email" name="caja1" class="input-field" placeholder="Usuario" required >
                            <input type="password" name="caja2" class="input-field" placeholder="Contraseña nueva" required>
                            <input type="password" name="caja3" class="input-field" placeholder="Confirmar contraseña nueva" required>

							<button type="submit" class="btn" name="Recuperar">Recuperar contraseña</button>
							<div>


                        </form>
						<?php
if (isset($_POST['Recuperar'])) {
    // Recogemos los datos del formulario
    $USUARIO = $_POST['caja1'];
	$CONTRASENA = $_POST['caja2'];
 	$CONFIRMACION = $_POST['caja3'];
	// Validación: asegurarse de que los campos no estén vacíos
	if (empty($USUARIO) || empty($CONTRASENA) || empty($CONFIRMACION)) {
		echo '<script>alert("Todos los campos deben estar llenos.");</script>';
    } else {
		// Validación: asegurarse de que la contraseña y la confirmación coincidan
		if ($CONTRASENA!= $CONFIRMACION) {
            echo '<script>alert("Las contraseñas no coinciden.");</script>';
        } else {
            // Realizamos la actualización de la contraseña en la base de datos
            $ACTUALIZAR = "UPDATE estudiante SET Contrasena = '$CONTRASENA' WHERE CorreoElectronico = '$USUARIO'";
			
            // Ejecutamos la consulta
			if (mysqli_query($conexion, $ACTUALIZAR)) {
                echo '<script>alert("Contraseña actualizada.");</script>';
                echo '<script>window.location.href="index.php";</script>';
            } else {
                echo "Error al actualizar: ". mysqli_error($conexion);
            }
        }
    }
}
?>
                        <a href="#myModal" data-toggle="modal" data-dismiss="modal" class="link">Regresar a Iniciar Sesión</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
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
							<h5>Presentaciones Finales</h5>
							<p>Presentacion cultural de los estudiantes, esta siendo la última</p>
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
						<img src="images/imagen5.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h5>Charla Semana de la Páz</h5>
							<p>Nuestros estudiantes disfrutaron de una charla sobre la Páz, invitación de la Alcaldia </p>
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
							<p>Mostramos lo orgullosos que estna nuestros estudiantes de sus raices con una presentación gastronomica de Boyáca</p>
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
							<p>Quisimos junto a nustros estudiantes ayudar al planeta con la siempra de arbóles.</p>
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
		<h3>Galeria de noticias</h3>
		<p class="nostrud">Te tenemos una serie de noticas relevantes de nuestra institución.</p>
		<div class="w3agile_gallery_grids">
			<div class="col-md-3 w3agile_gallery_grid">
				<div class="w3agile_gallery_image">
					<a class="sb" href="images/imagen9.jpg" title="Integracion con otras instituciones donde nuestra intutución participo gracias a la colaboracion de nuestros docentes y estudiantes">
						<figure>
							<img src="images/imagen9.jpg" alt="" class="img-responsive" />
							<figcaption>
								<h4>Participación Carros Electricós</h4>
								<p>
									Esto se realizo en día 29 de Octubre de 2024 
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
								<h4>Cumpleaños de nuestra Institución</h4>
								<p>
									¡Feliz cumpleaños a nuestra amada Rural del Sur, felíces 22 años!
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
									Los padres de familia realizarón una integración encabezado por los padres de familia representantes.
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
								<h4>integración con otras instituciones</h4>
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
								<h4> Visita Banco de Bogotá</h4>
								<p>
									Esta entidad comparte sus conocimientos y tecnológia con nuestros estudiantes
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
				<form action="#" method="post">
					<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					<input class="date" id="datepicker" type="text" name="Fecha" value="Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Date';}" required="" disabled>
				</form>
			</div>
			<div class="w3_working_time">
				<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
				<select id="country1" onchange="change_country(this.value)" class="frm-field required sect" disabled>
					<option value="null">Hora</option>
					<option value="null">07:00 AM - 09:00 AM</option> 
					<option value="null">10:00 AM - 12:00 PM</option>	
					<option value="null">02:00 PM - 04:00 PM</option>							
				</select>
			</div>
			<div class="w3_working_time w3_working_time1">
				<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
				<select id="country" onchange="change_country(this.value)" class="frm-field required sect" disabled>
					<option value="null">--Tipo--</option>
					<option value="null">Personal</option>
					<option value="null">Familiar</option> 
					<option value="null">Social</option>						
				</select>
			</div>				
			<div class="clearfix"> </div>	
			<form action="#" method="post">
				<input type="submit" value="Confirmar" disabled >
			</form>
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
			<h3>PQR</h3>
			<p class="nostrud">Creá tu PQR acá</p>
			<div class="testimonials-grids">
				<form action="index.php" method="post" class="mario1">
					<h2>Formulario PQR</h2>
					<label for="nombre" class="alberto" required >Nombre:</label>
					<input type="text" id="numero-identificacion" name="nombre" class="jimenez" required>

					<label for="tipo-identificacion" class="alberto">Tipo de Identificación:</label>
					<select id="tipo-identificacion" name="tipo-identificacion" class="jimenez" required>
						<option value="">Seleccione...</option>
						<option value="DNI">Cedula de ciudadania</option>
						<option value="Pasaporte">Tarjeta de identidad</option>
						<option value="Licencia">Documento de extrangeria</option>
					</select>
			
					<label for="numero-identificacion" class="alberto" required >Número de Identificación:</label>
					<input type="text" id="numero-identificacion" name="numero-identificacion" class="jimenez" required>

					<label for="correoelectronico" class="alberto">Correo Electrónico:</label>
					<input type="text" id="numero-identificacion" name="CorreoElectronico" class="jimenez" required>

					<label for="telefono" class="alberto">Teléfono:</label>
					<input type="text" id="numero-identificacion" name="Telefono" class="jimenez" required>

					<label for="tiposolicitud" class="alberto">Típo de solicitud:</label>
					<select id="tipo-identificacion" name="Tiposolicitud" class="jimenez" required>
						<option value="">Seleccione...</option>
						<option value="Peticion">Petición</option>
						<option value="Queja">Quejá</option>
						<option value="Reclamo">Reclamó</option>
						<option value="Sugerencia">Sugerencia</option>
					</select>
<label for="Motivo" class="alberto">Motivó:</label>
<input type="text" id="numero-identificacion" name="Motivo" class="jimenez" required style="height: 100px; font-size: 16px; padding: 5px; line-height: normal; vertical-align: top; text-align: left;"">
					<label for="Fecha" class="alberto">Fecha:</label>
					<input type="date" id="numero-identificacion" name="FechaCreacion" class="jimenez" required>
			
					<button type="submit" class="siza" name="ENVIAR">Enviar</button>
				</form>
				<?php
    if (isset($_POST['ENVIAR'])) {
        // Validación de campos seleccionados
        $NOMBRE = $_POST['Nombre'];
		$TIDENT= $_POST['tipo-identificacion'];
		$NIDENT= $_POST['numero-identificacion'];
		$CORREO= $_POST['CorreoElectronico'];
		$TELEFONO= $_POST['Telefono'];
		$TIPOSOLICITUD= $_POST['Tiposolicitud'];
		$MOTIVO= $_POST['Motivo'];	
		$FECHACREACION= $_POST['FechaCreacion'];
	


            $SQL = "INSERT INTO pqr (Nombre, TipoIdentificacion, NumeroIdentificacion, CorreoElectronico, Telefono, TipoSolicitud, Motivo, Fecha) VALUES ('$NOMBRE', '$TIDENT','$NIDENT', '$CORREO', '$TELEFONO', '$TIPOSOLICITUD', '$MOTIVO', '$FECHACREACION')";
            $RESULT = mysqli_query($conexion, $SQL) or die(mysqli_error($conexion));

            echo '<script>alert("Tu PQR a sido enviada correctamente");</script>';
            echo '<script>window.location.href = "Index.php";</script>';
        }
	
    ?>
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
		<h3>Contactanos</h3>
			<p>Conoce mas de nosotros poniendote en contacto con nosotross</p>
			<form action="index.php" method="post">
				<input type="text" name="Name" value="Nombre" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
				<input type="email" name="Email" value="Correo" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
				<input type="text" name="Telefono" value="Telefono" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">

				<textarea name="Mensaje" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Mensaje...</textarea>
				<input type="submit" value="Enviar" name="ENVIAR">
				<?php
    if (isset($_POST['ENVIAR'])) {
        // Validación de campos seleccionados
        $NOMBRE = $_POST['Name'];
        $APELLIDO = $_POST['Email'];
        $TELEFONO = $_POST['Telefono'];
        $CORREO = $_POST['Mensaje'];

            $SQL = "INSERT INTO contacto (Nombre, Correo, Telefono, Mensaje) VALUES ('$NOMBRE', '$APELLIDO', '$TELEFONO', '$CORREO')";
            $RESULT = mysqli_query($conexion, $SQL) or die(mysqli_error($conexion));

            echo '<script>alert("Reserva con nosotros Confirmada");</script>';
            echo '<script>window.location.href = "Index.php";</script>';
        }
    ?>
			</form>
		</div>
		<div class="col-md-6 w3agile_contact_right">
			<h3><a href="index.html">Rural del sur</a></h3>
			<div class="col-xs-6 w3agile_contact_right_agileinfo">
				<h4>Dirección</h4>
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
				<p>©2024 Institución Educativa Rural del Sur.|Diseñada por: <a href="https://www.instagram.com/hesizas_3?igsh=MXhleXBsMnVubmJvcA==">Mario Siza</a></p>
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