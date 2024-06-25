<section class="section">
    <div class="container">
        <h1 class="title has-text-centered">Gestión de Productos</h1>
        <div class="columns is-centered">
            <div class="column is-three-quarters">
                <form id="productForm" action="process.php" method="POST">
                    <div class="field">
                        <label class="label">Tipo de Movimiento</label>
                        <div class="control">
                            <div class="select">
                                <select name="movementType" required>
                                    <option value="Ingreso">Ingreso</option>
                                    <option value="Salida">Salida</option>
                                </select>
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
                                    echo "
                                    <tr>
                                        <td>
                                            <input type='checkbox' name='products[$index][selected]'>
                                            <input type='hidden' name='products[$index][id]' value='{$producto['producto_id']}'>
                                        </td>
                                        <td>{$producto['producto_nombre']}</td>
                                        <td>
                                            <input class='input is-small' type='number' name='products[$index][producto_stock]' pattern='[0-9]{1,25}' maxlength='25'>
                                        </td>
                                    </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button class="button is-success" type="submit">Enviar</button>
                        </div>
                        <div class="control">
                            <button class="button is-danger" type="reset">Cancelar</button>
                        </div>
                    </div>
                </form>
                <div id="result" class="notification is-hidden mt-4"></div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('productForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

        let formData = new FormData(this);

        fetch('process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            let result = document.getElementById('result');
            result.classList.remove('is-hidden');
            result.classList.add('is-info');
            result.innerHTML = data;
        })
        .catch(error => {
            let result = document.getElementById('result');
            result.classList.remove('is-hidden');
            result.classList.add('is-danger');
            result.innerHTML = 'Error: ' + error;
        });
    });
</script>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $movementType = $_POST['movementType'];
        $products = $_POST['products'];

        $responses = [];

        foreach ($products as $product) {
            if (isset($product['selected'])) {
                $productId = $product['id'];
                $quantity = intval($product['quantity']);

                // Aquí se podría agregar lógica para registrar el movimiento en una base de datos.

                // Ejemplo de respuesta
                if ($movementType === 'Ingreso') {
                    $responses[] = "Se ha registrado el ingreso de $quantity unidades del producto ID $productId.";
                } else {
                    $responses[] = "Se ha registrado la salida de $quantity unidades del producto ID $productId.";
                }
            }
        }

        if (empty($responses)) {
            echo "No se seleccionaron productos.";
        } else {
            echo implode("<br>", $responses);
        }
    } else {
        echo "Método no permitido.";
    }
?>