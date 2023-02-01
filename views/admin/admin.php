<?php
    session_start();    
    require_once "../../config/APP.php";
    require_once "../components/head.php";
    require_once "../components/header-form.php";
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
            <div class="form">
                <form action="<?php echo SERVERURL ?>controllers/adminController.php" method="POST" class="form-all-shop">
                    <div class="form-p">
                        <p>Administrador</p>
                    </div>
                    <div class="form-inputs">
                        <input type="text" name="usuario_administrador" placeholder="Correo/Teléfono/Usuario"></br>
                        <input type="password" name="contraseña_administrador" placeholder="Contraseña"></br>
                        <input type="submit" name="entrar" class="btn-form" value="INICIAR SESIÓN"></br>
                        <a href="">¿Olvidasta tu contraseña?</a>
                    </div>
                    <hr class="hr-form">
                    <div class="final-section-form">
                        <p>Eres nuevo en AllShop</p>
                        <a href="<?php echo SERVERURL ?>user/register">Registrate</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    require_once "../components/footer.php";
?>