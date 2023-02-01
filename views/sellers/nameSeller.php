<?php
    session_start();   
    if (empty($_SESSION['id_usuario'])) {
        header("location: ../../../../user/seller");
    }  if ($_SESSION['EstatusVendedor_usuario'] == 'Activo') {
        header("location: ../../../../user/seller/dashboard-seller");
    }
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
                <h3 class="h3-logo-form">Vendedores</h3>
            </div>
        </div>
        <div class="column-form">
            <div class="form">
                <form action="<?php echo SERVERURL ?>controllers/sellerNameController.php" method="POST" class="form-all-shop">
                    <div class="form-p">
                        <p>Nombre del evndedor</p>
                    </div>
                    <div class="form-inputs">
                        <br><label for="">Ingresa tu nombre completo</label>
                        <input type="text" name="nombre_vendedor" placeholder="Ingresa tu nombre completo"></br><br>
                        <p style="font-size: 12.5px;">Ingresa tu nombre tal y como aparece en tu registro</p>
                        <input type="submit" name="nombre" class="btn-form" value="INICIAR SESIÓN"></br>
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