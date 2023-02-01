<?php
session_start();
require_once ".././config/conn.php";

if (isset($_POST['nameCompany'])) {
    if (empty($_POST['nombre_empresa'])){
        echo    "<script>
                    alert('Escribe el nombre de tu empresa');
                    window.location = '../user/seller/contry/company';
                </script>";
    }if (empty($_POST['ckeckType'])) {
        echo    "<script>
                    alert('Autoriza el envio de tu información ');
                    window.location = '../user/seller/contry/company';
                </script>";
    }else {
        $companyName = $_POST['nombre_empresa'];
        $rol = "Vendedor";
        $id_user = $_SESSION['id_usuario'];
        $date = date('Y-m-d H:i:s');
        $dateModify = date('Y-m-d H:i:s');

        $companyNameVerify = $conn->query("SELECT * FROM empresas WHERE nombre_empresa = '$companyName'");

     }if (mysqli_num_rows($companyNameVerify) > 0) {
        echo '
        <script>
            alert("El nombre de esmpresa que ingreso ya existe, intentalo de nuevo");
            window.location = "../user/seller/contry/company";
        </script>';
        exit();
    } else { 
        
        $queryType = $conn->query("UPDATE empresas SET nombre_empresa = '$companyName', fecha_modificacion_empresa = '$dateModify' 
        WHERE id_usuario_empresa='$id_user'") or die(mysqli_error());

        $queryRol = $conn->query("UPDATE usuarios SET rol_usuario='$rol', fecha_modificacion_usuario = '$dateModify'
        WHERE id_usuario = '$id_user'") or die(mysql_error());
    
    }if ($queryType == 1) {
        header ('location:../user/seller/contry/company/info-seller');
    }else {
        echo    "<script>
                    alert('Ocurrio un error al registrar tu empresa');
                </script>";
    }
} if (isset($_POST['namesCompany'])) {
    if (empty($_POST['nombreParticular_empresa']) or (empty($_POST['apellidosParticular_empresa']))) {
        echo "<script>
                alert('Uno de los campos esta vacio');
                window.location = '../user/seller/contry/company';
            </script>";
    }if (empty($_POST['ckeckType'])) {
        echo    "<script>
                    alert('Autoriza el envio de tu información ');
                    window.location = '../user/seller/contry/company';
                </script>";
    }else {
        $particularName = $_POST['nombreParticular_empresa'];
        $particularLastName = $_POST['apellidosParticular_empresa'];
        $rol = "Vendedor";
        $id_user = $_SESSION['id_usuario'];
        $date = date('Y-m-d H:i:s');
        $dateModify = date('Y-m-d H:i:s');

        $queryNames = $conn->query("UPDATE empresas SET nombreParticular_empresa = '$particularName', apellidosParticular_empresa = '$particularLastName',
        fecha_modificacion_empresa = '$dateModify' WHERE id_usuario_empresa = '$id_user'") or die(mysql_error());

        $queryRol = $conn->query("UPDATE usuarios SET rol_usuario='$rol', fecha_modificacion_usuario = '$dateModify'
        WHERE id_usuario = '$id_user'") or die(mysql_error());

    }if ($queryNames == 1) {
        header ('location:../user/seller/contry/company/info-seller');
    }else {
        echo    "<script>
                    alert('Ocurrio un error al registrar tu nombre');
                </script>";
    }
}