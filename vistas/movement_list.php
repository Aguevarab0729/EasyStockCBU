<div class="container pb-6 pt-6" style="width: 80%;">
    <div class="container is-fluid mb-6">
        <div class="columns is-vcentered">
            <div class="column">
                <h1 class="title">Movimientos</h1>
                <h2 class="subtitle">Lista de Movimientos</h2>
            </div>
            <?php
                require_once "./php/main.php";
            ?>
            <div class="column">
                <a href="" class="button is-primary" style="float: right;">
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
                        <th>Tipo de Movimiento</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once "../inc/session.php";
                        require_once "main.php";

                        // Obtener todos los movimientos de la base de datos
                        $conexion = conexion();
                        $consulta_movimientos = $conexion->query("SELECT * FROM Movimientos ORDER BY fecha DESC");
                        $movimientos = $consulta_movimientos->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php foreach ($movimientos as $movimiento): ?>
                        <tr>
                            <td><?= $movimiento['fecha'] ?></td>
                            <td><?= $movimiento['tipo_movimiento'] ?></td>
                            <td><?= $movimiento['observaciones'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
