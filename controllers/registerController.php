<?php
require_once "../config/conn.php";
if (!empty($_POST["registrarse"])) {
    if (empty($_POST["nombre_usuario"])or empty($_POST["correo_usuario"]) or empty($_POST["telefono_usuario"])or empty($_POST["usuario_usuario"])
    or empty($_POST["contraseña_usuario"])) {
        echo "<script>
                 alert('Uno de los campos esta vacio');
                window.location = '../user/register';
             </script>";
    } else {
        $name=$_POST["nombre_usuario"];
        $email=$_POST["correo_usuario"];
        $phone=$_POST["telefono_usuario"];
        $user=$_POST["usuario_usuario"];
        $password= $_POST ["contraseña_usuario"];
        $date = date('Y-m-d H:i:s');


        //Correo, telefono y usuario sin repetir en la base de datos

        $emailVerify = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo_usuario= '$email'");
        $phoneVerify = mysqli_query($conn, "SELECT * FROM usuarios WHERE telefono_usuario= '$phone'");
        $userVerify = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario_usuario= '$user'");

        if (mysqli_num_rows($emailVerify) > 0) {
            echo '
            <script>
                alert("El correo_usuario que ingreso ya existe, intentalo de nuevo");
                window.location = "../user/register";
            </script>';
            exit();
        }if (mysqli_num_rows($phoneVerify) > 0) {
            echo '
            <script>
                alert("El telefono_usuario que ingreso ya existe, intentalo de nuevo");
                window.location = "../user/register";
            </script>';
            exit();
        }if (mysqli_num_rows($userVerify) > 0) {
            echo '
            <script>
                alert("El usuario_usuario que ingreso ya existe, intentalo de nuevo");
                window.location = "../user/register";
            </script>';
            exit();
        }if(!is_numeric($phone)){
            echo '
            <script>
                alert("El telefono_usuario debe de ser numerico, intentalo de nuevo");
                window.location = "../user/register";
            </script>';
            exit();
        }if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo '
            <script>
                alert("El correo_usuario ingresado no es valido, intentalo de nuevo");
                window.location = "../user/register";
            </script>';
            exit();
        }else {
            $sql=$conn->query ("INSERT INTO usuarios (nombre_usuario,correo_usuario,telefono_usuario,usuario_usuario,perfil_usuario,
            contraseña_usuario, fecha_creacion_usuario)
             VALUES ('$name','$email','$phone','$user','notPerfil.png','$password','$date')");
        }
        if ($sql==1) {
            echo "<script>
                 alert('Registrado con exito');
                window.location = '../';
             </script>";
        } else {
            echo "<script>
                 alert('Usuario no registrado');
                window.location = '../user/register';
             </script>";
        }
    
    }
    
}

    mysqli_close($conn);    




    

