<?php
    require_once "./php/main.php";

    $conexion = conexion();

    $consulta_movimientos = $conexion->query("
        SELECT m.id_movimiento, m.fecha, m.observaciones, u.usuario_nombre, u.usuario_apellido, GROUP_CONCAT(d.nombre_producto SEPARATOR ', ') AS productos, GROUP_CONCAT(d.cantidad_entrada SEPARATOR ', ') AS cantidades_entrada, GROUP_CONCAT(d.cantidad_salida SEPARATOR ', ') AS cantidades_salida
        FROM movimientos m
        INNER JOIN detallemovimiento d ON m.id_movimiento = d.movimiento_id
        INNER JOIN usuario u ON m.id_registrador = u.usuario_id
        GROUP BY m.id_movimiento
        ORDER BY m.fecha DESC
    ");

    $movimientos = $consulta_movimientos->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container pb-6 pt-6" style="width: 80%;">
    <div class="container is-fluid mb-6">
        <div class="columns is-vcentered">
            <div class="column">
                <h1 class="title">Movimientos</h1>
                <h2 class="subtitle">Lista de Movimientos</h2>
            </div>
            <div class="column">
                <a href="index.php?vista=movement_new" class="button is-primary" style="float: right;">
                    <span class="icon-text">
                        <span class="icon">
                            <i class="fas fa-folder-plus"></i>
                        </span>
                        <span>Nuevo movimiento</span>
                    </span>
                </a>
            </div>
        </div>
        <br>
        <div>
            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Productos</th>
                        <th>Cantidad Entrada</th>
                        <th>Cantidad Salida</th>
                        <th>Registrado por</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($movimientos as $movimiento): ?>
                        <tr>
                            <td><?= $movimiento['fecha'] ?></td>
                            <td>
                                <ul>
                                    <?php
                                        $productos_entrada = explode(',', $movimiento['productos']);
                                        foreach ($productos_entrada as $producto) {
                                            echo '<li>' . $producto . '</li>';
                                        }
                                    ?>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <?php
                                        $cantidades_entrada = explode(',', $movimiento['cantidades_entrada']);
                                        foreach ($cantidades_entrada as $cantidad) {
                                            echo '<li>' . $cantidad . '</li>';
                                        }
                                    ?>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <?php
                                        $productos_salida = explode(',', $movimiento['cantidades_salida']);
                                        foreach ($productos_salida as $cantidad) {
                                            echo '<li>' . $cantidad . '</li>';
                                        }
                                    ?>
                                </ul>
                            </td>
                            <td><?= $movimiento['usuario_nombre'] ?> <?= $movimiento['usuario_apellido'] ?></td>
                            <td><?= $movimiento['observaciones'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    $conexion = null;
?>

