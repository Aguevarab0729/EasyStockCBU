
<?php
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


?>