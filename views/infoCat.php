<?php
    require_once "../config/APP.php";
    require_once "../config/conn.php";
    require_once "../views/components/head.php";
    require_once "../views/components/header.php";
?>
<?php

    $idCat = $_GET['id'];
    $queryInfoCat = $conn->query("SELECT * FROM categorias WHERE id_categoria = $idCat");
    if ($rowCat = mysqli_fetch_array($queryInfoCat)) {
?>

    <div class="info-cat-footer">
        <h2><?php echo $rowCat['titulo_categoria'];?></h2>
        <p><?php echo $rowCat['descripcion_categoria'];?></p>
    </div>
<?php
    }
?>