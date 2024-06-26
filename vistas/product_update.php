<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		$id = (isset($_GET['product_id_up'])) ? $_GET['product_id_up'] : 0;
		$id=limpiar_cadena($id);

		/*== Verificando producto ==*/
    	$check_producto=conexion();
    	$check_producto=$check_producto->query("SELECT * FROM producto WHERE producto_id='$id'");

        if($check_producto->rowCount()>0){
        	$datos=$check_producto->fetch();
	?>
	<div class="container is-fluid mb-6">
		<h1 class="title">Productos</h1>
		<h2 class="subtitle">Actualizar producto</h2>

		<div class="form-rest mb-6 mt-6"></div>
	
		<h2 class="title has-text-centered"><?php echo $datos['producto_nombre']; ?></h2>

		<form action="./php/producto_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

			<input type="hidden" name="producto_id" value="<?php echo $datos['producto_id']; ?>" required >

			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Código de barra</label>
						<input class="input" type="text" name="producto_codigo" pattern="[a-zA-Z0-9- ]{1,70}" maxlength="70" required value="<?php echo $datos['producto_codigo']; ?>" >
					</div>
				</div>
				<div class="column">
					<div class="control">
						<label>Nombre</label>
						<input class="input" type="text" name="producto_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required value="<?php echo $datos['producto_nombre']; ?>" >
					</div>
				</div>
			</div>
			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Stock</label>
						<input class="input" type="text" name="producto_stock" pattern="[0-9]{1,25}" maxlength="25" value="<?php echo $datos['producto_stock']; ?>" disabled>
					</div>
				</div>
				<div class="column">
					<label>Categoría</label><br>
					<div class="select is-rounded">
						<select name="producto_categoria" >
							<?php
								$categorias=conexion();
								$categorias=$categorias->query("SELECT * FROM categoria");
								if($categorias->rowCount()>0){
									$categorias=$categorias->fetchAll();
									foreach($categorias as $row){
										if($datos['categoria_id']==$row['categoria_id']){
											echo '<option value="'.$row['categoria_id'].'" selected="" >'.$row['categoria_nombre'].' (Actual)</option>';
										}else{
											echo '<option value="'.$row['categoria_id'].'" >'.$row['categoria_nombre'].'</option>';
										}
									}
								}
								$categorias=null;
							?>
						</select>
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
				<button type="submit" class="button is-success">Actualizar</button>
			</p>
		</form>
		<?php 
			}else{
				include "./inc/error_alert.php";
			}
			$check_producto=null;
		?>
	</div>
</div>