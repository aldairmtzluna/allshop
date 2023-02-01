<?php
session_start();
require_once "../config/conn.php";

if (isset($_POST['store'])) {
    if (empty($_POST['tiendaNombre_vendedor']) or empty($_POST['codigos']) or empty($_POST['propietario'])) {
        echo    "<script>
                    alert ('Uno de los campos esta vacio o no a sido seleccionado');
                    window.location = '../user/seller/contry/company/store-seller';
                </script>";
    }else {
        $storeName = $_POST['tiendaNombre_vendedor'];
        $id_user = $_SESSION['id_usuario'];
        $dateModify = date('Y-m-d H:i:s');

        $queryStore = $conn->query("UPDATE vendedores SET tiendaNombre_vendedor = '$storeName', fecha_modificacion_vendedor = '$dateModify'
        WHERE id_usuario_vendedor = $id_user");
    }if ($queryStore) {
        header ('location: ../user/seller/contry/company/check-info-seller');
    }
}