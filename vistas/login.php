<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Easy Stock</title>
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
	<?php
		include "./inc/navbar_start.php";
	?>

	<section class="hero is-medium banner">
		<div class="hero-body banner-body">
			<p class="title text-uppercase bienvenida">Bienvenido a Easy Stock</p>
			<p class="bienvenida2 has-text-centered is-family-sans-serif">El mejor sistema de administración para restaurantes</p>
			<!-- <a href="menu.html" class="btn btn-warning"><i class="fas fa-hamburger fa-fw"></i> &nbsp; Ir al menu</a> -->
		</div>
	</section>

	<div class="container is-max-desktop is-family-sans-serif">
		<section class="section">
			<h1 class="title is-4 has-text-centered is-uppercase">Simplifica tu gestión y flujo de inventario</h1>
			<br>
			<p class="subtitle has-text-justified">
				Con nuestro sistema obtendras uno de los mejores sistemas para administrar la recepción de pedidos a proveedores y el flujo de inventario de tu negocio en tiempo real,
				podrás ver cada ingreso, con información detallada que te permite configurar alertas, cuando el stock disponible es bajo, así puedes realizar tus pedidos con información actualizada
				y sin los molestos inventarios manuales que pueden ser confusos y suceptibles a errores.
			</p>
		</section>
	</div>

	<hr>

	<div class="container is-max-desktop is-family-sans-serif">
	<h2 class="title is-4 has-text-centered is-uppercase" style="margin-bottom: 0;">Nuestros servicios</h2>	
		<section class="section">
			<div class="columns">
				<div class="column">
					<div class="box" style="box-shadow: none;">
						<p class="has-text-centered"><i class="fas fa-clipboard-list fa-5x"></i></p>
						<br>
						<h5 class="has-text-centered is-uppercase has-text-weight-bold">Registro de inventario</h5>
						<br>
						<p class="has-text-centered">Registro de productos por categoria con ubicación dentro del establecimiento</p>
					</div>
				</div>
				<div class="column">
					<div class="box" style="box-shadow: none;">
						<p class="has-text-centered"><i class="fas fa-clipboard-check fa-5x"></i></p>
						<br>
						<h5 class="has-text-centered is-uppercase has-text-weight-bold">Check list</h5>
						<br>
						<p class="has-text-centered">Visualiza en tiempo real el inventario y toma desiciones basadas en este</p>
					</div>
				</div>
				<div class="column">
					<div class="box" style="box-shadow: none;">
						<p class="has-text-centered"><i class="fas fa-object-group fa-5x"></i></p>
						<br>
						<h5 class="has-text-centered is-uppercase has-text-weight-bold">Modulos especificos</h5>
						<br>
						<p class="has-text-centered">Organizamos todo en modulos, así es más fácil de encontrar </p>
					</div>
				</div>
			</div>
			
			<div class="columns">
				<div class="column">
					<div class="box" style="box-shadow: none;">
						<p class="has-text-centered"><i class="fas fa-receipt fa-5x"></i></p>
						<br>
						<h5 class="has-text-centered is-uppercase has-text-weight-bold">Informes y organización</h5>
						<br>
						<p class="has-text-centered">Organiza los inventarios de acuerdo a tus necesidades</p>
					</div>
				</div>
				<div class="column">
					<div class="box" style="box-shadow: none;">
						<p class="has-text-centered"><i class="fas fa-barcode fa-5x"></i></p>
						<br>
						<h5 class="has-text-centered is-uppercase has-text-weight-bold">Identificacion única</h5>
						<br>
						<p class="has-text-centered">Cada uno de los productos del inventario estará identificado y así mismo clasificado dentro del sistema.</p>
					</div>
				</div>
				<div class="column">
					<div class="box" style="box-shadow: none;">
						<p class="has-text-centered"><i class="fas fa-bell fa-5x"></i></p>
						<br>
						<h5 class="has-text-centered is-uppercase has-text-weight-bold">Alertas de stock</h5>
						<br>
						<p class="has-text-centered">El sistema podrá generar alertas cuando el stock este bajo los parámetros establecidos.</p>
					</div>
				</div>
			</div>
		</section>
	</div>

	<hr>

	<div class="container is-max-desktop">
		<section class="section">
		<div class="columns">
			<div class="column">
				<figure class="full-box2">
					<img src="./assets/img/registration.png" alt="registration" class="img-fluid">
				</figure>
				<h3 class="has-text-centered is-uppercase">Crea tu cuenta</h3>
				<p class="has-text-centered">
					Si deseas crear una cuenta y probar la aplicación, es muy fácil y rápido.
				</p>
				<p class="has-text-centered">
					<button class="btn btn-primary" id="mostrarFormulario">Contáctanos</button>
				</p>


				<div class="rounded p-4" style="width: 100%;">
					<div id="formularioContainer" class="hidden">
						<h6 class="text-center poppins-regular font-weight-medium">Nos comunicaremos contigo</h6>
						<form class="full-box" id="formulario" action="formulario.php" method="POST" autocomplete="off">
							<div class="field">
								<label class="label">Nombre</label>
								<p class="control">
									<input class="input form-control" type="text" name="introducir_nombre" id="nombre" required="obligatorio" placeholder="Escribe tu nombre">
								</p>
							</div>
							<div class="field">
								<label class="label">Correo</label>
								<p class="control">
									<input class="input form-control" type="email"  name="introducir_email" id="email" required="obligatorio" placeholder="Escribe tu Email">
								</p>
							</div>

							<div class="field">
								<label class="label">Mensaje</label>
								<div class="control">
									<textarea class="textarea" placeholder="Textarea" name="introducir_asunto" id="asunto" required="obligatorio" placeholder="Escribe un asunto"></textarea>
								</div> 
							</div>

							<div class="field is-grouped is-grouped-centered">
								<p class="control">
									<button class="button btn is-success" type="submit" name="enviar_formulario" id="enviar">
										Enviar
									</button>
								</p>
							</div>

							<p class="aviso">
								<span class="obligatorio"> *</span> Los campos son obligatorios.
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		</section>
	</div>
	
	<footer class="footer">
		<div class="content has-text-centered">
			<p>
				<strong><i class="far fa-copyright"></i>2023 EasyStock</strong> by <a href="https://github.com/Aguevarab0729">AnyeDeveloper</a>.
				The source code is licensed
				<a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The
				website content is licensed
				<a href="http://creativecommons.org/licenses/by-nc-sa/4.0/"
					>CC BY NC SA 4.0</a
				>.
			</p>
		</div>
	</footer>

	<!-- Footer -->
	<!-- <footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<ul class="list-unstyled">
						<li>
							<h5 class="font-weight-bold"><i class="far fa-copyright"></i>2023 EasyStock, AnyeDeveloper</h5>
						</li>
						<li> Todos los derechos reservados </li>
					</ul>
				</div>
				<div class="col-12 col-md-4">
					<ul class="list-unstyled">
						<li>
							<h5 class="font-weight-bold">Colombia</h5>
						</li>
						<li><i class="fas fa-map-marker-alt fa-fw"></i>Bogotá D.C.</li>
					</ul>
				</div>
				<div class="col-12 col-md-4">
					<ul class="list-unstyled">
						<li>
							<h5 class="font-weight-bold">Siguenos en:</h5>
						</li>
						<li>
							<a href="" class="footer-link" target="_blank">
								<i class="fab fa-facebook fa-fw"></i> Facebook
							</a>
						</li>

						<li>
							<a href="" class="footer-link" target="_blank">
								<i class="fab fa-whatsapp fa-fw"></i>
								Whatsapp
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer> -->
	<script src="./js/mdb.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="./js/main.js"></script>
	</body>
</html>