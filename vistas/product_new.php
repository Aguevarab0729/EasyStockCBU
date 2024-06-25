<div class="container pb-6 pt-6">
	<div class="container is-fluid mb-6" style="width: 90%;">
		<h2 class="title">Nuevo producto</h2>
		<?php
			require_once "./php/main.php";
		?>
		<div class="form-rest mb-6 mt-6"></div>
		<div class="container is-fluid mb">
			<form action="./php/producto_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
				<div class="columns">
					<div class="column">
						<div class="control">
							<label class="label">Código de producto : </label>
							<input class="input" type="text" name="producto_codigo" pattern="[a-zA-Z0-9- ]{1,70}" maxlength="70" required >
						</div>
					</div>
					<div class="column">
						<div class="control">
							<label class="label">Nombre : </label>
							<input class="input" type="text" name="producto_nombre" placeholder="Ejemplo: Arroz Diana(Marca) 5Kg(peso)" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required>
						</div>
					</div>
				</div>
				<div class="columns">
					<div class="column">
						<div class="control">
							<label class="label">Stock : </label>
							<input class="input" type="text" name="producto_stock" pattern="[0-9]{1,25}" maxlength="25" disabled >
						</div>
					</div>
					<div class="column">
						<label class="label">Categoría : </label>
						<div class="select">
							<select name="producto_categoria" >
								<option value="" selected="" >Seleccione una categoria : </option>
								<?php
									$categorias=conexion();
									$categorias=$categorias->query("SELECT * FROM categoria");
									if($categorias->rowCount()>0){
										$categorias=$categorias->fetchAll();
										foreach($categorias as $row){
											echo '<option value="'.$row['categoria_id'].'" >'.$row['categoria_nombre'].'</option>';
										}
									}
									$categorias=null;
								?>
							</select>
						</div>
					</div>
					<div class="column">
						<label class="label">Foto o imagen del producto : </label>
						<div class="control">
							<div class="file is-info has-name">
								<label class="file-label">
									<input class="file-input" type="file" name="producto_foto" accept=".jpg, .png, .jpeg">
									<span class="file-cta">
										<span class="file-icon">
											<i class="fas fa-upload"></i>
										</span>
										<span class="file-label">Imagen:</span>
									</span>
									<span class="file-name">Jpg, Jpeg, Png. (Max 3MB)</span>
								</label>
							</div>
						</div>
					</div>
				</div>
				
				<p>
					<div class="notification is-info is-light">
						( * )  Este formulario permite: 
						<br>
						Código de producto: cualquier combinación de letras (mayúsculas y minúsculas), números, el guion y espacios en blanco.
						<br>
						Nombre producto: Cualquier combinación de letras (incluyendo acentos y ñ), números, estos caracteres ().,$#\-\/ y espacios en blanco.
						<br>
						precio - stock:	permite cualquier combinación de dígitos y el punto decimal
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