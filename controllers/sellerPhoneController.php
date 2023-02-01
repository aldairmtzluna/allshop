<?php
session_start();

require_once "../config/conn.php";
if (isset($_POST["entrar"]))  {
    if (!empty($_POST["telefono_usuario"])) {
        $user=$_POST["telefono_usuario"];
        $sql=$conn->query("select * from usuarios where telefono_usuario='$user'");
        if ($data=$sql->fetch_object()) {
            $_SESSION["id_usuario"]=$data->id_usuario;
            $_SESSION["nombre_usuario"]=$data->nombre_usuario;
            $_SESSION["correo_usuario"]=$data->correo_usuario;
            $_SESSION["telefono_usuario"]=$data->telefono_usuario;
            $_SESSION["usuario_usuario"]=$data->usuario_usuario;
            $_SESSION["rol_usuario"]=$data->rol_usuario;
            $_SESSION["empresa_usuario"]=$data->empresa_usuario;
            $_SESSION["EstatusVendedor_usuario"]=$data->EstatusVendedor_usuario;
            $_SESSION["nacimiento_usuario"]=$data->nacimiento_usuario;
            $_SESSION["perfil_usuario"]=$data->perfil_usuario;
            $_SESSION["contraseña_usuario"]=$data->contraseña_usuario;
            echo "<script>window.location = '../../user/seller/contry/company'</script>";
        } else {
            echo "<script>
                        alert('Acceso denegado');
                </script>";
        }
        
    } else {
        echo "<script>
                 alert('Uno de los campos esta vacio');
             </script>";
    }
}
