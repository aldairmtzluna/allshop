<?php
    session_start();
    require_once "../../config/APP.php";
    require_once "../../config/conn.php";
    require_once "../components/head.php";
    require_once "../components/nav-dashboard.php";
    require_once "../../controllers/categoryController.php";
?>
<a style="margin-left: 25%;" href="<?php echo SERVERURL ?>views/admin/addCategory.php">Añadir categoria</a>
    <table style="">
            <caption>Categorias</caption>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php
                if ($conn) {
                    $queryCat = "SELECT * FROM categorias ORDER BY id_categoria DESC";
                    $result = mysqli_query($conn, $queryCat);
                    if ($result) {
                        while ($row = $result->fetch_array()) {
                            $titleCat = $row['titulo_categoria'];
                            $descriptionCat = $row['descripcion_categoria'];
                            $photoCat = $row['foto_categoria'];
            ?>
            <tbody>
                <tr>
                    <td><?php echo $row['titulo_categoria'] ?></td>
                    <td><?php echo $row['descripcion_categoria'] ?></td>
                    <td><img src="../img/categorias/<?php echo $row['foto_categoria'] ?>" style="width: 80px; height: 50px;"></td>
                    <td>
                        <button class="btn-actions"><i class='bx bxs-edit-alt' style='color:#ffffff'></i>Editar</button>
                        <button class="btn-actions"><i class='bx bxs-trash'style='color:#ffffff'></i>Eliminar</button>
                    </td>
                </tr>
            </tbody>
            <?php
                        }
                    }
                }
            ?>
    </table>