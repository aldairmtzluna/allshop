<?php
    error_reporting (0);
    session_start();
    if (empty($_SESSION['id_usuario'])) {
        header("location: ../../seller");
    }if ($_SESSION['rol_usuario']== 'Vendedor') {
        header ("location: ../contry/company/info-seller");
    }
    require_once "../../config/APP.php";
    require_once "../../config/conn.php";
    require_once ".././components/head.php";
    require_once ".././components/headerSeller.php";
?>
<section class="section-type-company">
    <div class="alert-type-company">
        <div class="container-alert">
            <div class="alert-icon">
                <i class='bx bx-alarm-exclamation'></i>
            </div>
            <div class="alert-text">
                <?php
                    $id_user = $_SESSION['id_usuario'];
                    $queryType = $conn->query("SELECT * FROM empresas WHERE id_usuario_empresa = '$id_user'");
                    if ($rowType = mysqli_fetch_array($queryType)) {
                ?>
                <p><strong>Asegúrate de que el tipo de empresa que has seleccionado sea el correcto.</strong>
                    Has elegido registrarte como <strong><?php echo  $rowType['tipo_empresa']?></strong>.
                </p>
                <?php
                    }
                ?>
                <p>
                    Seleccionar la opción incorrecta puede afectar al estado de tu cuenta.
                </p>
            </div>
        </div>
    </div>
    <form action="<?php echo  SERVERURL ?>controllers/typeController.php" method="POST" class="form-type-company">
        <?php
            if ($_SESSION['empresa_usuario']=="Persona particular") {
        ?>
        <div class="container-particular">
            <div class="info-particular">
                <label for="">Nombre(s)</label><br>
                <input type="text" name="nombreParticular_empresa" placeholder=" Nombre(s)">
            </div>
            <div class="info-particular">
                <label for="">Apellidos</label><br>
                <input type="text" name="apellidosParticular_empresa" placeholder=" Apellidos"><br>
            </div>
        </div>
        <div class="checkbox-type-company">
            <input type="checkbox" name="ckeckType" class="checkbox-ckeck">
            <div class="p-checkbox-type-company">
                <p>
                    Comprendo que el tipo de empresa es correcto y entiendo que esta información no se 
                    pede cambiar posteriormente.
                </p>
            </div>
        </div>
        <input type="submit" value="Continuar" name="namesCompany" class="input-type-company save">
        <?php
            }else {
        ?>
        <div class="container-other-type">
            <div class="info-other-type">
                <label for="">La denominación social utilizada para registrarla con tu gobierno estatal o federal.</label><br>
                <input type="text" name="nombre_empresa" placeholder=" La denominación social como aparece en el documento de registro de la empresa."><br><br>
            </div>
        </div>
        <div class="checkbox-type-company">
            <input type="checkbox" name="ckeckType" class="checkbox-ckeck">
            <div class="p-checkbox-type-company">
                <p>
                    Comprendo que el tipo de empresa es correcto y entiendo que esta información no se 
                    pede cambiar posteriormente.
                </p>
            </div>
        </div>
        <input type="submit" value="Continuar" name="nameCompany" class="input-type-company save">
       <?php
            }
        ?>
       
        <?php
            require_once "../../controllers/typeController.php";
        ?>
    </form>
</section>