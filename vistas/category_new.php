<div class="container pb-6 pt-6">
	<div class="container is-fluid mb-6" style="width: 90%;">
		<h2 class="title">Nueva categoría</h2>

		<div class="form-rest mb-6 mt-6"></div>
		<div class="container is-fluid mb">
			<form action="./php/categoria_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
				<div class="columns">
					<div class="column">
						<div class="control">
							<label>Nombre categoria : </label>
							<input class="input" type="text" name="categoria_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required >
						</div>
					</div>
					<div class="column">
						<div class="control">
							<label>Ubicación dentro del restaurante : </label>
							<input class="input" type="text" name="categoria_ubicacion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}" maxlength="150" >
						</div>
					</div>
				</div>
				<p class="has-text-centered">
					<button type="submit" class="button is-info is-rounded">Guardar</button>
				</p>
			</form>
		</div>
	</div>
</div>