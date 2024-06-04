<div class="container pb-6 pt-6" style="width: 80%;">
    <div class="container is-fluid mb-6">
        <div class="columns is-vcentered">
            <div class="column">
                <h1 class="title">Usuarios</h1>
                <h2 class="subtitle">Lista de usuarios</h2>
            </div>
            <div class="column">
                <a href="index.php?vista=user_new" class="button is-primary" style="float: right;">
                <span class="icon-text">
                    <span class="icon">
                        <i class="fas fa-folder-plus"></i>
                    </span>
                    <span>Nuevo usuario</span>
                </span>
                </a>
                <a href="index.php?vista=user_search" class="button is-link is-inverted" style="float: right;">
                    <span class="icon">
                        <i class="fas fa-search"></i>
                    </span>
                    <span> Buscar </span>
                </a>
            </div>
        </div>
        <br>
        <?php
            require_once "./php/main.php";

            # Eliminar usuario #
            if(isset($_GET['user_id_del'])){
                require_once "./php/usuario_eliminar.php";
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
            $url="index.php?vista=user_list&page=";
            $registros=15;
            $busqueda="";

            # Paginador usuario #
            require_once "./php/usuario_lista.php";
        ?>
    </div>
</div>
