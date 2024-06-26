<div class="container pb-6 pt-6">
	<div class="container is-fluid mb-6" style="width: 90%;">
		<h2 class="title">Nuevo Movimiento</h2>
        <h3 class="subtitle">Gestión de Productos</h3>
		<div class="form-rest mb-6 mt-6"></div>
        <div class="container is-fluid mb"></div>
            <form action="./php/movimiento_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Tipo de Movimiento : </label>
                            <div class="select">
                                <select name="movimiento_tipo" required>
                                    <option value="Ingreso">Ingreso</option>
                                    <option value="Salida">Salida</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table is-fullwidth is-striped">
                    <thead>
                        <tr>
                            <th>Seleccionar</th>
                            <th>Nombre del Producto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody id="productTableBody">
                        <?php
                            require_once 'php/main.php';
                            $productos = obtener_productos();
                            foreach ($productos as $index => $producto) {
                                if (isset($_POST['productos'][$index]['seleccionado'])) {
                                    $stock = $_POST['productos'][$index]['producto_stock'];
                                    if ($stock == "") {
                                        echo '
                                            <div class="notification is-danger is-light">
                                                <strong>¡Ocurrió un error inesperado!</strong><br>
                                                Diligencia todos los campos, son obligatorios
                                            </div>
                                        ';
                                        exit();
                                    }
                                }
                                echo "
                                <tr>
                                    <td>
                                        <input type='checkbox' name='productos[$index][seleccionado]'>
                                        <input type='hidden' name='productos[$index][id]' value='{$producto['producto_id']}'>
                                    </td>
                                    <td>{$producto['producto_nombre']}</td>
                                    <td>
                                        <input class='input is-small' type='number' name='productos[$index][producto_stock]' pattern='[0-9]{1,25}' maxlength='25'>
                                    </td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <div class="field is-grouped is-grouped-centered">
                    <div class="control">
                        <button class="button is-success" type="submit" id="registrarBtn">Registrar</button>
                    </div>
                    <!-- <div class="control">
                        <button class="button is-danger" type="reset">Cancelar</button>
                    </div> -->
                </div>
            </form>
            <div id="result" class="notification is-hidden mt-4"></div>
        </div>
    </div>
</section>
