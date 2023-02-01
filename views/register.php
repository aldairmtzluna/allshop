<?php
    session_start();
    if (isset($_SESSION['id_usuario'])) {
        header ('location: ../');
    }
    require_once "../config/APP.php";
    require_once "./components/head.php";
    require_once "./components/header-form.php";
?>
<section class="section-form">
    <div class="container-form">
        <div class="column-form">
            <div class="logo-form">
                <img src="<?php echo SERVERURL ?>views/img/allshop-logo.png" alt="">
                <h2 class="h2-logo-form">AllShop</h2>
                <h3 class="h3-logo-form">Compras en linea</h3>
            </div>
        </div>
        <div class="column-form">
            <div class="form" style="height: 90%; margin-top: 0%;">
                <form action="<?php echo SERVERURL ?>controllers/registerController.php" method="POST" class="form-all-shop" style="height: 100%;">
                    <div class="form-p">
                        <p>Registro</p>
                    </div>
                    <div class="form-inputs">
                        <input type="text" name="nombre_usuario" placeholder="Nombre completo" value="<?php if (isset($name)) echo $name?>"></br>
                        <input type="email" name="correo_usuario" placeholder="Correo eléctronico" value="<?php if (isset($email)) echo $email?>"></br>
                        <input type="number" name="telefono_usuario" placeholder="Teléfono" value="<?php if (isset($phone)) echo $phone?>"></br>
                        <input type="text" name="usuario_usuario" placeholder="Nombre de usuario" value="<?php if (isset($user)) echo $user?>"></br>
                        <input type="password" name="contraseña_usuario" placeholder="Contraseña" value="<?php if (isset($password)) echo $password?>"></br>
                        <input type="submit" name="registrarse" class="btn-form" value="Registrarse"></br>
                    </div>
                    <hr class="hr-form" style="margin-top: 30px;">
                    <div class="final-section-form">
                        <p>Ya tienes cuenta en AllShop</p>
                        <a href="<?php echo SERVERURL ?>user/login">Iniciar Sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    require_once "./components/footer.php";
?>