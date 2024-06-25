<?php
	require_once "./php/main.php";
    $id = (isset($_GET['user_id_up'])) ? $_GET['user_id_up'] : 0;
    $id=limpiar_cadena($id);
?>
<div class="container pb-6 pt-6">
	<h2>
		<?php
			include "./inc/btn_back.php";
		?>
	</h2>
	<div class="container is-fluid mb-6" style="width: 90%;">
		<?php if($id==$_SESSION['id']){ ?>
			<h1 class="title">Mi cuenta</h1>
			<h2 class="subtitle">Actualizar datos de cuenta</h2>
		<?php }else{ ?>
			<h1 class="title">Usuarios</h1>
			<h2 class="subtitle">Actualizar usuario</h2>
		<?php } ?>
	
		<?php
			/*-------------------------- Verificando usuario -----------------------*/
			$check_usuario=conexion();
			$check_usuario=$check_usuario->query("SELECT * FROM usuario WHERE usuario_id='$id'");

			if($check_usuario->rowCount()>0){
				$datos=$check_usuario->fetch();
		?>

		<div class="form-rest mb-6 mt-6"></div>

		<div class="container is-fluid mb" style="width: 90%;">
			<form action="./php/usuario_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

				<input type="hidden" name="usuario_id" value="<?php echo $datos['usuario_id']; ?>" required >
				
				<div class="columns">
					<div class="column">
						<div class="control">
							<label>Nombres : </label>
							<input class="input" type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required value="<?php echo $datos['usuario_nombre']; ?>" >
						</div>
					</div>
					<div class="column">
						<div class="control">
							<label>Apellidos : </label>
							<input class="input" type="text" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required value="<?php echo $datos['usuario_apellido']; ?>" >
						</div>
					</div>
				</div>
				<div class="columns">
					<div class="column">
						<div class="control">
							<label>Usuario : </label>
							<input class="input" type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required value="<?php echo $datos['usuario_usuario']; ?>" >
						</div>
					</div>
					<div class="column">
						<div class="control">
							<label>Correo : </label>
							<input class="input" type="email" name="usuario_email" maxlength="70" value="<?php echo $datos['usuario_email']; ?>" >
						</div>
					</div>
				</div>
				<br>
				<p class="has-text-centered subtitle is-5">
					SI desea actualizar la contraseña de este usuario llene los 2 campos.
					<br>Si NO, deje los campos vacíos.
				</p>
				<div class="columns">
					<div class="column">
						<div class="control">
							<label>Contraseña : </label>
							<input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" >
						</div>
					</div>
					<div class="column">
						<div class="control">
							<label>Confirmar contraseña : </label>
							<input class="input" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" >
						</div>
					</div>
				</div>
				<br>
				<p class="has-text-centered subtitle is-5">
					Ingrese USUARIO y CONTRASEÑA (Administrador) para actualizar los datos de usuario
				</p>
				<div class="columns">
					<div class="column">
						<div class="control">
							<label>Usuario : </label>
							<input class="input" type="text" name="administrador_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
						</div>
					</div>
					<div class="column">
						<div class="control">
							<label>Contraseña : </label>
							<input class="input" type="password" name="administrador_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
						</div>
					</div>
				</div>
				<p>
					<div class="notification is-info is-light">
						( * )  Este formulario permite: 
						<br>
						Nombres y apellidos: Cualquier combinación de letras (incluyendo acentos y ñ) y espacios en blanco 
						<br>
						Usuario: Cualquier combinación de letras (mayúsculas y minúsculas) y dígitos, con una longitud de entre 4 y 20 caracteres 
						<br>
						contraseña:	Cualquier combinación de letras (mayúsculas y minúsculas), números y los caracteres especiales $, @, . y -
		            </div>
				</p>
				<br>
				<p class="has-text-centered">
					<button type="submit" class="button is-success is-rounded">Actualizar</button>
				</p>
			</form>
			<?php 
				}else{
					include "./inc/error_alert.php";
				}
				$check_usuario=null;
			?>
		</div>
	</div>
</div>