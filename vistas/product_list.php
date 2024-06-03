<div class="container pb-6 pt-6" style="width: 80%;">
    <div class="container is-fluid mb-6">
        <div class="columns is-vcentered">
            <div class="column">
                <h1 class="title">Productos</h1>
                <h2 class="subtitle">Lista de productos</h2>
            </div>
            <?php
                require_once "./php/main.php";
            ?>
            <div class="column">
                <a href="index.php?vista=product_new" class="button is-primary" style="float: right;">
                <span class="icon-text">
                    <span class="icon">
                        <i class="fas fa-folder-plus"></i>
                    </span>
                    <span>Agregar producto</span>
                </span>
                </a>
            </div>
        </div>
        <br>
        
        <?php
            require_once "./php/main.php";

            # Eliminar producto #
            if(isset($_GET['product_id_del'])){
                require_once "./php/producto_eliminar.php";
            }

            if(!isset($_GET['page'])){
                $pagina=1;
            }else{
                $pagina=(int) $_GET['page'];
                if($pagina<=1){
                    $pagina=1;
                }
            }

            $categoria_id = (isset($_GET['category_id'])) ? $_GET['category_id'] : 0;

            $pagina=limpiar_cadena($pagina);
            $url="index.php?vista=product_list&page="; /* <== */
            $registros=15;
            $busqueda="";

            # Paginador producto #
            require_once "./php/producto_lista.php";
        ?>            
    </div>
</div>