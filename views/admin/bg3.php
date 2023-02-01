<?php
    session_start();
    require_once "../../config/APP.php";
    require_once "../../config/conn.php";
    require_once "../components/head.php";
    require_once "../components/nav-dashboard.php";
?>
<div class="container-bg">
    <form name="MiForm" id="MiForm" method="post" enctype="multipart/form-data"  class="form-bg">
        <div class="row">
        <div class="col-sm-4 col-12">
            <div class="invoiceBox">
            <label for="file">
                <div class="boxFile" data-text="Seleccionar archivo">
                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">
                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z">
                    </path>
                </svg>
                </div>
            </label>
            <input id="file" multiple="" name="archivo" size="6000" type="file" accept="application/pdf,image/x-png,image/gif,image/jpeg,image/jpg,image/tiff">
            </div>
        </div>
        </div>
        <button name="subir" class="btn-bg">Subir</button>
    </form>
    <?php
    //Si se quiere subir una imagen
    if (isset($_POST['subir'])) {
    //Recogemos el archivo enviado por el formulario
    $archivo = $_FILES['archivo']['name'];
    //Si el archivo contiene algo y es diferente de vacio
    if (isset($archivo) && $archivo != "") {
        //Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];
        $temp = $_FILES['archivo']['tmp_name'];
        $nameF = $_FILES['archivo']['name'];
        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
        }
        else {
            //Si la imagen es correcta en tamaño y tipo
            //Se intenta subir al servidor
            if (move_uploaded_file($temp, '../img/bg/'.$archivo)) {
                $queryImg = $conn->query ("UPDATE sliders SET fondo3_slide ='$nameF'");
                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                chmod('../img/bg/'.$archivo, 0777);
                //Mostramos el mensaje de que se ha subido co éxito
                echo '<script>
                        alert("Se ha subido correctamente la imagen.")
                    </script>';
                //Mostramos la imagen subida
            }
            else {
            //Si no se ha podido subir la imagen, mostramos un mensaje de error
            echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
            }
        }
    }
    }
    ?>
    <?php
        $query = $conn->query("SELECT fondo3_slide FROM sliders");
        if ($fila = mysqli_fetch_array($query)) {
    ?>
        <div class="panel-bg">
                <img src="<?php echo SERVERURL ?>views/img/bg/<?php echo $fila ['fondo3_slide'];?>">
        </div>
    <?php
        }
    ?>
</div>

   