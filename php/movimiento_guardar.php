<?php
require_once "../inc/session_start.php";
require_once "main.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movementType = limpiar_cadena($_POST['movimiento_tipo']);
    $productos = $_POST['productos'];

    if (empty($productos)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No se seleccionaron productos.
            </div>    
        ';
        exit();
    }

    $conexion = conexion();
    $conexion->beginTransaction();

    try {
        $insertar_movimiento = $conexion->prepare("
            INSERT INTO Movimientos (fecha, id_registrador, observaciones)
            VALUES (NOW(), :usuario, :observaciones)
        ");
        $insertar_movimiento->execute([
            ':usuario' => $_SESSION['id'],
            ':observaciones' => "Registro de $movementType de productos"
        ]);

        $movimiento_id = $conexion->lastInsertId();

        $insertar_detalle = $conexion->prepare("
            INSERT INTO DetalleMovimiento (movimiento_id, nombre_producto, cantidad_entrada, cantidad_salida, stock_actual)
            VALUES (:movimiento_id, :nombre_producto, :cantidad_entrada, :cantidad_salida, :stock_actual)
        ");

        foreach ($productos as $producto) {
            $producto_id = $producto['id'];
            $cantidad = intval($producto['producto_stock']);

            $obtener_nombre_producto = $conexion->prepare("
                SELECT producto_nombre
                FROM Producto
                WHERE producto_id = :producto_id
            ");

            $obtener_nombre_producto->execute([':producto_id' => $producto_id]);
            $nombre_producto = $obtener_nombre_producto->fetchColumn();

            $obtener_stock_actual = $conexion->prepare("
                SELECT producto_stock
                FROM Producto
                WHERE producto_id = :producto_id
            ");

            $obtener_stock_actual->execute([':producto_id' => $producto_id]);
            $stock_actual = $obtener_stock_actual->fetchColumn();

            if ($movementType === 'Ingreso') {
                $cantidad_entrada = $cantidad;
                $cantidad_salida = 0;
                $nuevo_stock = $stock_actual + $cantidad;
            } else {
                $cantidad_entrada = 0;
                $cantidad_salida = $cantidad;
                $nuevo_stock = $stock_actual - $cantidad;

                if ($nuevo_stock < 0) {
                    throw new Exception("No hay suficiente stock para realizar la salida del producto ID $producto_id.");
                }
            }

            $actualizar_stock = $conexion->prepare("
                UPDATE Producto
                SET producto_stock = :nuevo_stock
                WHERE producto_id = :producto_id
            ");
            $actualizar_stock->execute([
                ':nuevo_stock' => $nuevo_stock,
                ':producto_id' => $producto_id
            ]);

            $insertar_detalle->execute([
                ':movimiento_id' => $movimiento_id,
                ':nombre_producto' => $nombre_producto,
                ':cantidad_entrada' => $cantidad_entrada,
                ':cantidad_salida' => $cantidad_salida,
                ':stock_actual' => $nuevo_stock
            ]);
        }

        $conexion->commit();
        echo '
            <div class="notification is-info is-light">
                <button class="delete"></button>
                <strong>¡Movimiento registrado!</strong><br>
                Movimiento de ' . htmlspecialchars($movementType) . ' registrado correctamente.
            </div>
        ';
    } catch (PDOException $e) {
        $conexion->rollBack();
        echo '
            <div class="notification is-danger is-light">
                <button class="delete"></button>
                <strong>¡Ocurrió un error inesperado!</strong><br>
                Error al registrar el movimiento: ' . $e->getMessage() . '
            </div>
        ';
    } catch (Exception $e) {
        $conexion->rollBack();
        echo '
            <div class="notification is-danger is-light">
                <button class="delete"></button>
                <strong>¡Ocurrió un error inesperado!</strong><br>
                Error: ' . $e->getMessage() . '
            </div>
        ';
    
    }
    $conexion = null;
} else {
    echo '
        <div class="notification is-danger is-light">
            <button class="delete"></button>
            <strong>¡Ocurrió un error inesperado!</strong><br>
            Error: No se han recibido datos por POST.
        </div>
    ';
}


/* <?php
    require_once "../inc/session_start.php";

    require_once "main.php";

    function verifyAdmin($admin_usuario, $admin_clave) {
        $check_admin = conexion();
        $check_admin = $check_admin->query("SELECT usuario_usuario,usuario_clave FROM usuario WHERE usuario_usuario='$admin_usuario' AND usuario_id='".$_SESSION['id']."'");
    
        if($check_admin->rowCount() == 1){
            $check_admin = $check_admin->fetch();
            if($check_admin['usuario_usuario'] != $admin_usuario || !password_verify($admin_clave, $check_admin['usuario_clave'])){
                echo '
                    <div class="notification is-danger is-light">
                        <strong>¡Ocurrio un error inesperado!</strong><br>
                        USUARIO o CLAVE de administrador incorrectos
                    </div>
                ';
                exit();
            } else {
                // Si la verificación es exitosa, muestra el contenido del nav para usuarios
                echo '
                <div class="navbar-item has-dropdown is-hoverable">
                    <a href="index.php?vista=user_list" class="navbar-link is-arrowless">Usuarios</a>
                </div>
                ';
            }
        } else {
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    USUARIO o CLAVE de administrador incorrectos
                </div>
            ';
            exit();
        }
    
        $check_admin = null;
    }


?> */