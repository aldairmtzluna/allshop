<?php
require_once "../config/conn.php";
session_start();

if (isset($_POST['pagos'])) {
    if (empty($_POST['numero_tarjeta']) or empty($_POST['mesVencimiento']) or empty($_POST['añoVencimiento']) or empty($_POST['nombre_tarjeta'])) {
        echo    "<script>
                    alert ('Uno de los campos esta vacio');
                    window.location = '../user/seller/contry/company/payments-seller';
                </script>";
    }else {
        $cardSellerNumber = $_POST['numero_tarjeta'];
        $expirationMonth = $_POST['mesVencimiento'];
        $expirationYear = $_POST['añoVencimiento'];
        $expirationDate = $expirationMonth . "/" . $expirationYear;
        $nameCard = $_POST['nombre_tarjeta'];
        $id_user = $_SESSION['id_usuario'];
        $id_seller = $_SESSION['id_vendedor'];
        $date = date('Y-m-d H:i:s');
        $dateModify = date('Y-m-d H:i:s');

        $queryPaySeller = $conn->query("INSERT INTO tarjetas (id_tarjeta, numero_tarjeta,
         fechaVencimiento_tarjeta, nombre_tarjeta, id_usuario_tarjeta, id_vendedor_tarjeta, fecha_creacion_tarjeta)
         VALUES ('', '$cardSellerNumber', '$expirationDate', '$nameCard', '$id_user', '$id_seller', '$date')");

         $queryRol = $conn->query("UPDATE vendedores SET tarjetaEstatus_vendedor='Activada', fecha_modificacion_vendedor = '$dateModify'
          WHERE id_usuario_vendedor = '$id_user'") or die(mysql_error());

    }if ($queryPaySeller) {
        header ('location: ../user/seller/contry/company/store-seller');
    }else {
        echo    "<script>
                    alert ('Error al guardar tus datos, intentalo mas tarde');
                    window.location = '../user/seller/contry/company/payments-seller';
                </script>";
    }
}