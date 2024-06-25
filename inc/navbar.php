<nav class="navbar is-spaced is-light" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">
        <a class="navbar-item" href="index.php?vista=home">
            <img src="./assets/img/negroLogo.svg" width="152" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start is-active">
            <div class="navbar-item has-dropdown is-hoverable">
                <a href="index.php?vista=user_list" class="navbar-link is-arrowless">Usuarios</a>
            </div>
            
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Inventario</a>
                <div class="navbar-dropdown">
                    <a href="index.php?vista=category_list" class="navbar-item">Categorias</a>
                    <a href="index.php?vista=product_list" class="navbar-item">Productos</a>
                    <a href="index.php?vista=product_category" class="navbar-item">Productos por categoría</a>
                    <a href="index.php?vista=consumer_new" class="navbar-item">Consumo</a>
                </div>
            </div>
        </div>
        <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    <?php echo $_SESSION['usuario']; ?>
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="index.php?vista=user_update&user_id_up=<?php echo $_SESSION['id']; ?>">
                        Mi cuenta
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="index.php?vista=logout">Salir</a>
                </div>
            </div>
        </div>
    </div>
</nav>