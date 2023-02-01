<?php
require_once "../../config/conn.php";

if (!empty($_POST["categoria"])) {
    if (empty($_POST["titulo_categoria"])) {
        echo "<script>
                 alert('Todos los campos son obligatorios');
                 window.location = '../views/addCategory.php';
             </script>";
    }else {
        $titleCat = $_POST["titulo_categoria"];
        $descriptionCat = $_POST ["descripcion_categoria"];
        $date = date('Y-m-d H:i:s');

        $photo = $_FILES['foto_categoria'];
        $namePhoto = $photo['name'];
        $type = $photo['type'];
        $urlTemp = $photo ['tmp_name'];

        $imgCategory = 'addImage.png';

        if ($namePhoto != '') {
            $destiny = '../views/img/categorias/';
            $imgName = 'img_'.md5(date('d-m-Y H:m;s'));
            $imgCategory = $imgName.'.jpg';
            $src = $destiny.$imgCategory;
        }
        $queryInsert = mysqli_query($conn,"INSERT INTO categorias (titulo_categoria, descripcion_categoria, foto_categoria, 
        fecha_creacion_categoria) VALUES ('$titleCat','$descriptionCat', '$imgCategory','$date')");

        if ($queryInsert) {
            if ($namePhoto != '') {
                move_uploaded_file($urlTemp,$src);
            }
            echo "<script>
                    alert('Producto publicado con exito');
                     window.location = '../views/categories.php';
                </script>";
            } else{
                echo "<script>
                            alert('Error al publicar el producto');
                            window.location = '../views/addCategory.php';
                        </script>";
            }
        }
    }