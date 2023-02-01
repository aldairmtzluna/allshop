<?php
session_start();
require_once "../config/conn.php";
if (isset($_POST["entrar"]))  {
    if (!empty($_POST["usuario_administrador"]) and !empty($_POST["contraseña_administrador"])) {
        $admin=$_POST["usuario_administrador"];
        $passwordAdmin=$_POST["contraseña_administrador"];
        $sql=$conn->query("select * from administradores where usuario_administrador='$admin' and contraseña_administrador='$passwordAdmin'");
        if ($data=$sql->fetch_object()) {
            $_SESSION["id_administrador"]=$data->id_administrador;
            $_SESSION["nombre_administrador"]=$data->nombre_administrador;
            $_SESSION["correo_administrador"]=$data->correo_administrador;
            $_SESSION["usuario_administrador"]=$data->usuario_administrador;
            $_SESSION["perfil__administrador"]=$data->perfil__administrador;
            $_SESSION["contraseña_administrador"]=$data->contraseña_administrador;
            echo "<script>window.location = '../'</script>";
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

?>