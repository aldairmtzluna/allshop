<?php
    session_start();
    if (empty($_SESSION['id_usuario'])) {
        header("location: ../../../../user/seller");
    }  if ($_SESSION['EstatusVendedor_usuario'] == 'Activo') {
        header("location: ../../../../user/seller/dashboard-seller");
    }
   require_once "../../config/APP.php";
   require_once "../../config/conn.php";
   require_once ".././components/head.php";
   require_once ".././components/headerSeller.php";
?>
<form action="<?php echo SERVERURL ?>controllers/checkController.php" method="POST">
    <table class="table-dates-seller">
        <caption><h3>Datos de empresa y vendedor</h3></caption>
            <thead>
                <tr>
                    <th>Concepto</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nombre del vendedor:</td>
                    <?php
                        $id_user = $_SESSION['id_usuario'];
                        $queryName = $conn->query("SELECT * FROM vendedores WHERE id_usuario_vendedor = '$id_user'");
                        $queryB = $conn->query("SELECT nombre_empresa, tipo_empresa, nombreParticular_empresa, apellidosParticular_empresa 
                        FROM empresas WHERE id_usuario_empresa = '$id_user'");
                        if ($row = mysqli_fetch_array($queryName)) {
                        ?>
                    <td><?php echo $row['nombre_vendedor']?></td>  
                </tr>
                <tr>
                    <td>Pais del vendedor:</td>
                    <td><?php echo $row['pais_vendedor']?></td>  
                </tr>
                <tr>
                    <td>Nacimiento del vendedor:</td>
                    <td><?php echo $row['nacimiento_vendedor']?></td>  
                <tr>
                    <td>Dirección</td>
                    <td><?php echo $row['direccion_vendedor'] . ", "; echo $row['ciudad_vendedor'] . ", "; echo $row['cp_vendedor'] . ", ";
                    echo $row['extra_vendedor'] . ", "; echo $row['municipio_vendedor'];?></td>
                </tr>
                <?php
                    if ($rowB = mysqli_fetch_array($queryB)) {
                ?>
                <tr>
                    <td>Tipo de empresa:</td>
                    <td><?php echo $rowB['tipo_empresa']?></td>  
                <tr>
                <?php
                        if ($_SESSION['empresa_usuario'] == 'Persona particular') {
                ?>
                <tr>
                    <td>Nombre particular:</td>
                    <td><?php echo $rowB['nombreParticular_empresa'] . " "; echo $rowB['apellidosParticular_empresa']?></td>  
                <tr>
                <?php
                    }else {
                ?>
                <tr>
                    <td>Nombre de su empresa:</td>
                    <td><?php echo $rowB['nombre_empresa']?></td>  
                <tr>
                <?php
                        }
                    }
                ?>     
                <tr>
                    <td>Nombre de su tienda:</td>
                    <td><?php echo $row['tiendaNombre_vendedor']?></td>  
                <tr>
                <?php
                        }
                ?>
            </tbody>
    </table>
    <input type="submit" name="check" value="Finalizar" class="next next-p save"><br>
    <div class="container-checkbox-check">
        <input type="checkbox" class="checkbox-ckeck" required>
        <p>Al dar a <strong>"Finalizar"</strong> no podras modificar los datos que aparecen en la tabla anterior</p>
    </div>
</form>