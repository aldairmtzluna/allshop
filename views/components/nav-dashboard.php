<?php
    require_once "../../config/conn.php";
?>
<nav class="dash">
    <div class="nav-head">
        <div class="photo-admin-mav">
            <?php
                $idAdmin = $_SESSION['id_administrador'];
                $queryAdmin = $conn->query("SELECT * FROM administradores WHERE id_administrador = '$idAdmin'");
                if ($filaAdmin = mysqli_fetch_array($queryAdmin)) {                           
            ?>
                <img src="<?php echo SERVERURL?>views/img/perfiles/<?php echo $filaAdmin ['perfil__administrador'];?>">
            <?php
                }
            ?>
        </div>
        <div class="info-admin-nav">
            <h2 class="h2-admin-nav">Administrador</h2>
            <p class="p-admin-nav"><?php echo $_SESSION['usuario_administrador']?></p>
        </div>
    </div>
    <div class="container-nav">
        <ul class="ul-admin-nav">
            <li class="li-admin-nav"><a href="#" class="a-admin-nav"><i class='bx bxs-right-arrow'></i>Elementos</a>
                <ul class="elements">
                    <li class="li-elements"><a href="<?php echo SERVERURL ?>views/admin/bg.php"><i class='bx bxs-right-arrow'></i>Fondos slider</a>
                        <ul class="l-bg">
                            <li class="li-bg-nav"><a href="<?php echo SERVERURL ?>views/admin/bg1.php" class="a-bg-nav"><i class='bx bxs-right-arrow'></i>Fondo 1</a></li>
                            <li class="li-bg-nav"><a href="<?php echo SERVERURL ?>views/admin/bg2.php" class="a-bg-nav"><i class='bx bxs-right-arrow'></i>Fondo 2</a></li>
                            <li class="li-bg-nav"><a href="<?php echo SERVERURL ?>views/admin/bg3.php" class="a-bg-nav"><i class='bx bxs-right-arrow'></i>Fondo 3</a></li>
                            <li class="li-bg-nav"><a href="<?php echo SERVERURL ?>views/admin/bg4.php" class="a-bg-nav"><i class='bx bxs-right-arrow'></i>Fondo 4</a></li>
                            <li class="li-bg-nav"><a href="<?php echo SERVERURL ?>views/admin/bg5.php" class="a-bg-nav"><i class='bx bxs-right-arrow'></i>Fondo 5</a></li>
                            <li class="li-bg-nav"><a href="<?php echo SERVERURL ?>views/admin/bg6.php" class="a-bg-nav"><i class='bx bxs-right-arrow'></i>Fondo 6</a></li>
                        </ul>
                    </li>   
                </ul>
                <ul class="elements">
                    <li class="li-elements"><a href="<?php echo SERVERURL ?>views/bg.php"><i class='bx bxs-right-arrow'></i>Fondos individuales</a>
                        <ul class="l-bg">
                            <li class="li-bg-nav"><a href="<?php echo SERVERURL ?>views/admin/bg-ind1.php" class="a-bg-nav"><i class='bx bxs-right-arrow'></i>Fondo 1</a></li>
                            <li class="li-bg-nav"><a href="<?php echo SERVERURL ?>views/admin/bg-ind2.php" class="a-bg-nav"><i class='bx bxs-right-arrow'></i>Fondo 2</a></li>
                        </ul>
                    </li>   
                </ul>
            </li>
            <li class="li-admin-nav"><a href="<?php echo  SERVERURL ?>views/admin/categories.php" class="a-admin-nav"><i class='bx bxs-right-arrow'></i>Categorias</a></li>
            <li class="li-admin-nav"><a href="" class="a-admin-nav"></a></li>
            <li class="li-admin-nav"><a href="" class="a-admin-nav"></a></li>
            <li class="li-admin-nav"><a href="<?php echo  SERVERURL ?>controllers/logOutController.php" class="a-admin-nav">Cerrar sesión</a></li>
        </ul>
    </div>
</nav>