<?php
session_start();
require_once "../config/conn.php";
if (isset($_POST['data'])) {
    if (empty($_POST['nombre_vendedor']) or empty($_POST['pais_vendedor']) or empty($_POST['diaVendedor']) or empty($_POST['mesVendedor'])
     or empty($_POST['añoVendedor']) or empty($_POST['paisEmpresa_vendedor']) or empty($_POST['direccion_vendedor']) or empty($_POST['ciudad_vendedor'])
     or empty($_POST['cp_vendedor']) or empty($_POST['extra_vendedor']) or empty($_POST['municipio_vendedor'])) {
        echo    "<script>
                    alert('Uno de los campos esta vacio');
                    window.location = '../user/seller/contry/company/info-seller';
                </script>";
    }else {
        $nameSeller = $_POST['nombre_vendedor'];
        $contrySeller = $_POST['pais_vendedor'];
        $daySeller = $_POST['diaVendedor'];
        $monthSeller = $_POST['mesVendedor'];
        $yearSeller = $_POST['añoVendedor'];
        $birth = $daySeller . '/' . $monthSeller . '/' . $yearSeller; 
        $contryBussiness =$_POST['paisEmpresa_vendedor'];
        $addressSeller = $_POST['direccion_vendedor'];
        $citySeller = $_POST['ciudad_vendedor'];
        $pcSeller = $_POST['cp_vendedor'];
        $extraSeller = $_POST['extra_vendedor'];
        $municipality = $_POST['municipio_vendedor'];
        $id_user = $_SESSION['id_usuario'];
        $date = date('Y-m-d H:i:s');
        $dateModify = date('Y-m-d H:i:s');

        $queryDates=$conn->query("INSERT INTO vendedores (id_vendedor, nombre_vendedor, pais_vendedor, 	nacimiento_vendedor, paisEmpresa_vendedor, 
        direccion_vendedor, ciudad_vendedor, cp_vendedor, extra_vendedor, municipio_vendedor, id_usuario_vendedor)
         VALUES ('', '$nameSeller', '$contrySeller', '$birth', '$contryBussiness', '$addressSeller', '$citySeller', '$pcSeller', '$extraSeller',
        '$municipality', '$id_user')");

         $queryBrith = $conn->query("UPDATE usuarios SET nacimiento_usuario='$birth', fecha_modificacion_usuario = '$dateModify' 
         WHERE id_usuario = '$id_user'") or die(mysql_error());

    }if ($queryDates==1) {
        header ('location:../user/seller/contry/company/name-seller');
    }else {
        echo "<script>
                alert('Error al registrar los datos');
                window.location = '../user/seller/contry/company/info-seller';
            </script>";
    }
}