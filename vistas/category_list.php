<div class="container pb-6 pt-6" style="width: 80%;">
    <div class="container is-fluid mb-6">
        <div class="columns is-vcentered">
            <div class="column">
                <h1 class="title">Categorías</h1>
                <h2 class="subtitle">Lista de categoría</h2>
            </div>
            <div class="column">
                <a href="index.php?vista=category_new" class="button is-primary" style="float: right;">
                <span class="icon-text">
                    <span class="icon">
                        <i class="fas fa-folder-plus"></i>
                    </span>
                    <span>Nueva categoria</span>
                </span>
                </a>
            </div>
        </div>
        <br>
        <?php
            require_once "./php/main.php";

            # Eliminar categoria #
            if(isset($_GET['category_id_del'])){
                require_once "./php/categoria_eliminar.php";
            }

            if(!isset($_GET['page'])){
                $pagina=1;
            }else{
                $pagina=(int) $_GET['page'];
                if($pagina<=1){
                    $pagina=1;
                }
            }

            $pagina=limpiar_cadena($pagina);
            $url="index.php?vista=category_list&page="; /* <== */
            $registros=15;
            $busqueda="";

            # Paginador categoria #
            require_once "./php/categoria_lista.php";
        ?>
    </div>
</div>