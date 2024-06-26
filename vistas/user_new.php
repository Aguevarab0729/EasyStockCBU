<div class="container pb-6 pt-6">
	<div class="container is-fluid mb-6" style="width: 90%;">
		<h2 class="title">Nuevo Usuario</h2>
		<div class="form-rest mb-6 mt-6"></div>
		<div class="container is-fluid mb">
			<form action="./php/usuario_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
				<div class="columns">
					<div class="column">
						<div class="control">
							<label>Nombres : </label>
							<input class="input" type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
						</div>
					</div>
					<div class="column">
						<div class="control">
							<label>Apellidos : </label>
							<input class="input" type="text" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
						</div>
					</div>
				</div>
				<div class="columns">
					<div class="column">
						<div class="control">
							<label>Usuario : </label>
							<input class="input" type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
						</div>
					</div>
					<div class="column">
						<div class="control">
							<label>Correo: </label>
							<input class="input" type="email" name="usuario_email" maxlength="70" >
						</div>
					</div>
				</div>
				<div class="columns">
					<div class="column">
						<div class="control">
							<label>Contraseña : </label>
							<input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
						</div>
					</div>
					<div class="column">
						<div class="control">
							<label>Repetir contraseña : </label>
							<input class="input" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
						</div>
					</div>
				</div>
				<!-- <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Rol : </label>
                            <div class="select">
                                <select name="usuario_rol" required>
                                    <option value="" selected disabled>Selecciona un rol</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Usuario Normal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div> -->

				<p>
					<div class="notification is-info is-light">
						( * )  Este formulario permite: 
						<br>
						Nombres y apellidos: Cualquier combinación de letras (incluyendo acentos y ñ) y espacios en blanco 
						<br>
						Usuario: Cualquier combinación de letras (mayúsculas y minúsculas) y dígitos, con una longitud de entre 4 y 20 caracteres 
						<br>
						contraseña:	Minimo 7 carácteres - Cualquier combinación de letras (mayúsculas y minúsculas), números y los caracteres especiales $, @, . y -
		            </div>
				</p>
				<br>
				<p class="has-text-centered">
					<button type="submit" class="button is-success">Guardar</button>
				</p>
			</form>
		</div>
	</div>
</div>