<?php
    $inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
    $tabla = "";

    $campos = "movimiento.movimiento_id, movimiento.movimiento_cantidad, movimiento.tipo_movimiento, movimiento.producto_id, movimiento.usuario_id, producto.producto_id, producto.producto_nombre, producto.producto_foto, usuario.usuario_id, usuario.usuario_nombre, usuario.usuario_apellido";

    if (isset($busqueda) && $busqueda != "") {
        $consulta_datos = "SELECT $campos FROM movimientos 
                        INNER JOIN producto ON movimiento.producto_id = producto.producto_id 
                        INNER JOIN usuario ON movimiento.usuario_id = usuario.usuario_id 
                        WHERE producto.producto_nombre LIKE '%$busqueda%' 
                        ORDER BY movimiento.movimiento_id ASC 
                        LIMIT $inicio, $registros";

        $consulta_total = "SELECT COUNT(movimiento_id) FROM movimientos 
                        INNER JOIN producto ON movimiento.producto_id = producto.producto_id 
                        WHERE producto.producto_nombre LIKE '%$busqueda%'";
    } else {
        $consulta_datos = "SELECT $campos FROM movimientos 
                        INNER JOIN producto ON movimiento.producto_id = producto.producto_id 
                        INNER JOIN usuario ON movimiento.usuario_id = usuario.usuario_id 
                        ORDER BY movimiento.movimiento_id ASC 
                        LIMIT $inicio, $registros";

        $consulta_total = "SELECT COUNT(movimiento_id) FROM movimientos";
    }

    $conexion = conexion();

    $datos = $conexion->query($consulta_datos);
    $datos = $datos->fetchAll();

    $total = $conexion->query($consulta_total);
    $total = (int)$total->fetchColumn();

    $Npaginas = ceil($total / $registros);

    if ($total >= 1 && $pagina <= $Npaginas) {
        $contador = $inicio + 1;
        $pag_inicio = $inicio + 1;
        foreach ($datos as $rows) {
            $tipo_movimiento = ($rows['tipo_movimiento'] == 'Ingreso') ? 'Ingresado' : 'Salida';
            $tabla .= '
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">';
            if (is_file("./img/producto/" . $rows['producto_foto'])) {
                $tabla .= '<img src="./img/producto/' . $rows['producto_foto'] . '">';
            } else {
                $tabla .= '<img src="./img/producto.png">';
            }
            $tabla .= '</p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            <strong>' . $contador . ' - ' . $rows['producto_nombre'] . '</strong><br>
                            <strong>Tipo de Movimiento : </strong> ' . $tipo_movimiento . ', <strong>Cantidad : </strong> ' . $rows['movimiento_cantidad'] . ', <strong>Registrado por: </strong> ' . $rows['usuario_nombre'] . ' ' . $rows['usuario_apellido'] . '
                        </p>
                        </div>
                    </div>
                </article>
                <hr>
            ';
            $contador++;
        }
        $pag_final = $contador - 1;
    } else {
        if ($total >= 1) {
            $tabla .= '
                <p class="has-text-centered">
                    <a href="' . $url . '1" class="button is-link is-rounded is-small mt-4 mb-4">
                        Haga clic acá para recargar el listado
                    </a>
                </p>
            ';
        } else {
            $tabla .= '
                <p class="has-text-centered">No hay registros en el sistema</p>
            ';
        }
    }

    if ($total > 0 && $pagina <= $Npaginas) {
        $tabla .= '<p class="has-text-right">Mostrando movimientos <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
    }

    $conexion = null;
    echo $tabla;

    if ($total >= 1 && $pagina <= $Npaginas) {
        echo paginador_tablas($pagina, $Npaginas, $url, 7);
    }
?>