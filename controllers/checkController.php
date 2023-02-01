<?php
session_start();
 require_once "../config/conn.php";

 if (isset($_POST['check'])) {
        $id_user = $_SESSION['id_usuario'];
        $status = 'Activo';
        $dateModify = date('Y-m-d H:i:s');

        $query = $conn->query("UPDATE usuarios SET EstatusVendedor_usuario = '$status', fecha_modificacion_usuario = '$dateModify'
         WHERE id_usuario = '$id_user'");
    }if ($query) {
        echo "<script>
                    alert ('Proceso de registro de vendedor terminado');
                    window.location = '../controllers/logOutController.php';
            </script>";
    }else {
        echo "<script>
                alert ('Error al registrar su información, intentelo mas tarde');
                window.location = '../user/seller/contry/company/check-info-seller';
             </script>";
    }