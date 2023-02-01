<?php
    session_start();
    if (empty($_SESSION['id_usuario'])) {
        header("location: ../../user/seller");
    }
    require_once '../../../config/APP.php';
?>
<h2>Vendedor <?php echo $_SESSION['nombre_usuario']?></h2>
<a href="<?php echo SERVERURL?>">Inicio</a>