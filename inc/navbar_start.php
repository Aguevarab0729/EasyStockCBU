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
            
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="js-modal-trigger button is-ghost" data-target="modal-login">
                        <span class="icon">
                            <i class="fas fa-user-alt"></i>
                        </span>
                        <span>Iniciar Sesión</span>
                    </a>

                    <div id="modal-login" class="modal">
                        <div class="modal-background"></div>
                        <div class="modal-card">
                            <header class="modal-card-head">
                                <button class="delete" aria-label="close"></button>
                            </header>
                            <section class="modal-card-body">
                                <form class="full-box login" action="" method="POST" autocomplete="off">
                                    <div class="field">
                                        <p class="control has-icons-left has-icons-right">
                                            <input class="input form-control" type="text" name="login_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" placeholder="Usuario" required>
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-user-alt"></i>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="field">
                                        <p class="control has-icons-left">
                                            <input class="input form-control" type="password" name="login_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" placeholder="Contraseña" required>
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                            <div class="row mb-4"></div>
                                        </p>
                                    </div>

                                    <div class="field">
                                        <label class="checkbox">
                                            <input type="checkbox" />
                                            Remember me
                                        </label>
                                    </div>

                                    <div class="field">
                                        <p class="control">
                                            <button class="button btn is-success" type="submit">
                                                Iniciar Sesión
                                            </button>
                                        </p>
                                    </div>
                                    
                                    <?php
                                        if (isset($_POST['login_usuario']) && isset($_POST['login_clave'])) {
                                            require_once "./php/main.php";
                                            require_once "./php/iniciar_sesion.php";
                                        }
                                    ?>
                                </form>
                            </section>
                        </div>
                    </div>
			    </div>
            </div>
        </div>
    </div>
    </div>
</nav>
