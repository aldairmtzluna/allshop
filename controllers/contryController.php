<?php
session_start();
require_once ".././config/conn.php";

if (isset($_POST['contry'])) {
    if (empty($_POST['pais_empresa']) or (empty($_POST['tipo_empresa']))) {
        echo    "<script>
                    alert('Uno de los campos esta vacio');
                </script>";
    }else {
        $contryCompany = $_POST ['pais_empresa'];
        $typeCompany = $_POST ['tipo_empresa'];
        $id_user = $_SESSION ['id_usuario'];
        $date = date('Y-m-d H:i:s');
        $dateModify = date('Y-m-d H:i:s');
        
        $sqlContry = $conn->query("INSERT INTO empresas (nombre_empresa, pais_empresa, tipo_empresa, id_usuario_empresa,fecha_creacion_empresa)
         VALUES ('SinNombre', '$contryCompany', '$typeCompany', '$id_user', '$date')");

        mysqli_query($conn, "UPDATE usuarios SET empresa_usuario = '$typeCompany', fecha_modificacion_usuario = '$dateModify'
        WHERE id_usuario='$id_user'") or die(mysqli_error());

    }if ($sqlContry == 1) {
                header ('location: ../user/seller/phone');
    }else {
        echo    "<script>
                    alert('Ocurrio un error al registrar tu empresa');
                </script>";
    }
}