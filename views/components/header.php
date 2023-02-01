<?php
    session_start();
    error_reporting (0);
?>
<header>
    <nav style="position: fixed; top: 0; z-index: 1000;">
        <div class="info-general">
            <div class="social-allshop">
                <div class="social-allshop-p">
                    <p class="p-social-allshop">Siguenos en: </p>
                </div>
                <div class="icons-social-allshop">
                    <a href="" class="a-social-allshop"><i class='bx bxl-facebook-circle' style='color:#0329ff'  ></i></a>
                    <a href="" class="a-social-allshop"><i class='bx bxl-instagram-alt' style='color:#ff03d8' ></i></a>
                    <a href="" class="a-social-allshop"><i class='bx bxl-twitter' style='color:#039aff'  ></i></a>
                </div>
            </div>
            <div class="info-user" style="width: 90%;">
                <ul class="ul-info-user">
                    <li class="li-info-user"><a href="" class="a-info-user"><i class='bx bxs-bell'></i>Notificaciones</a></li>
                    <li class="li-info-user"><a href="" class="a-info-user"><i class='bx bx-help-circle'></i>Ayuda</a></li>
                    <?php
                        if (!isset($_SESSION['id_usuario']) && (!isset($_SESSION['id_administrador']))){
                    ?>
                        <li class="li-info-user"><a href="<?php echo SERVERURL ?>user/register" class="a-info-user">Registrarse</a></li>
                        <li class="li-info-user"><a href="<?php echo SERVERURL ?>user/login" class="a-info-user">Iniciar Sesión</a></li>
                        <li class="li-info-user"><a href="<?php echo SERVERURL ?>user/seller" class="a-info-user">Vendedor@s</a></li>
                    <?php
                        }else {
                    ?>
                    <li class="li-info-user perfil">
                        <a href="<?php echo SERVERURL ?>user/profile" class="a-info-user">
                            <?php
                                $conn=new mysqli("localhost","root","","allshop");
                                $id_user = $_SESSION['id_usuario'];
                                $idAdmin = $_SESSION['id_administrador'];
                                $query = $conn->query("SELECT * FROM usuarios WHERE id_usuario = '$id_user'");
                                $queryAdmin = $conn->query("SELECT * FROM administradores WHERE id_administrador = '$idAdmin'");                          
                                if ($fila = mysqli_fetch_array($query)) {
                                ?>
                                    <img src="<?php echo SERVERURL?>views/img/perfiles/<?php echo $fila ['perfil_usuario'];?>" style="margin-left: -23px;">
                                <?php
                                }if ($filaAdmin = mysqli_fetch_array($queryAdmin)) {
                                ?>
                                    <img src="<?php echo SERVERURL?>views/img/perfiles/<?php echo $filaAdmin ['perfil__administrador'];?>" style="margin-left: -23px;">
                                <?php
                                    }
                                ?>
                            <?php echo $_SESSION['usuario_usuario']?>
                            <?php echo $_SESSION['usuario_administrador']?>
                        </a>
                    </li>
                        <?php
                            if(isset($_SESSION['id_administrador'])) {
                        ?>
                        <li class="li-info-user"><a href="<?php echo SERVERURL ?>views/admin/dashboard.php" class="a-info-user">Dashboard</a></li>
                        <?php
                            }else {
                        ?>
                        <li class="li-info-user"><a href="<?php echo SERVERURL ?>user/seller" class="a-info-user">Mi tienda</a></li>
                        <?php
                            }
                        ?>
                        <li class="li-info-user"><a href="<?php echo SERVERURL ?>controllers/logOutController.php" class="a-info-user">Cerrar Sesión</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="allshop-section-header">
            <div class="logo-allshop">
                <a href="<?php echo SERVERURL ?>">
                    <img src="<?php echo SERVERURL ?>views/img/allshop-logo-white.png" alt="">
                    <h2 class="h2-logo-all-shop">AllShop</h2>
                </a>
            </div>
            <div class="search-header">
                <div class="search-input">
                    <form action="">
                        <input type="search" name="" id="">
                        <button class="btn-search"><i class='bx bx-search'></i></button>
                    </form>
                </div>
                <ul class="ul-search">
                    <li class="li-search"><a href="" class="a-search">Tenis</a></li>
                    <li class="li-search"><a href="" class="a-search">Audifonos</a></li>
                    <li class="li-search"><a href="" class="a-search">Sudaderas</a></li>
                    <li class="li-search"><a href="" class="a-search">Gorras</a></li>
                    <li class="li-search"><a href="" class="a-search">mochilas</a></li>
                    <li class="li-search"><a href="" class="a-search">Plumones</a></li>
                    <li class="li-search"><a href="" class="a-search">Carteras</a></li>
                    <li class="li-search"><a href="" class="a-search">Relojes</a></li>
                </ul>
            </div>
            <div class="cart">
                <i class='bx bxs-cart'></i>
            </div>
        </div>
    </nav>
</header>