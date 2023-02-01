<?php
session_start();
require_once "../config/conn.php";
if (isset($_POST["nombre"]))  {
    if (!empty($_POST["nombre_vendedor"])) {
        $user=$_POST["nombre_vendedor"];
        $sql=$conn->query("select * from vendedores where nombre_vendedor='$user'");
        if ($data=$sql->fetch_object()) {
            $_SESSION["id_vendedor"]=$data->id_vendedor;
            $_SESSION["nombre_vendedor"]=$data->nombre_vendedor;
            $_SESSION["pais_vendedor"]=$data->pais_vendedor;
            $_SESSION["nacimiento_vendedor"]=$data->nacimiento_vendedor;
            $_SESSION["paisEmpresa_vendedor"]=$data->paisEmpresa_vendedor;
            $_SESSION["direccion_vendedor"]=$data->direccion_vendedor;
            $_SESSION["ciudad_vendedor"]=$data->ciudad_vendedor;
            $_SESSION["cp_vendedor"]=$data->cp_vendedor;
            $_SESSION["extra_vendedor"]=$data->extra_vendedor;
            $_SESSION["municipio_vendedor"]=$data->municipio_vendedor;
            $_SESSION["tarjetaEstatus_vendedor"]=$data->tarjetaEstatus_vendedor;
            $_SESSION["tiendaNombre_vendedor"]=$data->tiendaNombre_vendedor;
            echo "<script>window.location = '../user/seller/contry/company/payments-seller'</script>";
        } else {
            echo "<script>
                        alert('Acceso denegado');
                         window.location = '../user/seller/contry/company/name-seller';
                </script>";
        }
        
    } else {
        echo "<script>
                 alert('Uno de los campos esta vacio');
                 window.location = '../user/seller/contry/company/name-seller';
             </script>";
    }
}

