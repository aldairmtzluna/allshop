<?php
    error_reporting (0);
    session_start();
    if (empty($_SESSION['id_usuario'])) {
        header("location: ../../user/seller");
    }if ($_SESSION['empresa_usuario'] != '') {
        header("location: ../../user/seller/contry/company");
    }
    require_once "../../config/APP.php";
    require_once "../../config/conn.php";
    require_once ".././components/head.php";
    require_once ".././components/headerSeller.php";
?>
<section class="contry-section">
        <div class="container-form-contry">
            <div class="container-info-form-contry-company">
                <div class="container-title-contry">
                    <h3>Información de la empresa de <?php echo $_SESSION['usuario_usuario']?></h3>
                    <hr>
                </div>
                <form action="<?php echo SERVERURL ?>controllers/contryController.php" method="POST" class="form-contry-company">
                    <label for="selecciona el país de ubicación de tu empresa">Selecciona el país de ubicación de tu empresa</label><br><br>
                    <select name="pais_empresa" id="">
                        <option value="selecciona el país de ubicación de tu empresa">Selecciona el país de ubicación de tu empresa</option>
                        <?php
                            $queryContry = "SELECT * FROM paises";
                            $result = mysqli_query($conn, $queryContry);
                            if ($result) {
                                while ($row = $result->fetch_array()) {
                                    $contry = $row['nombre_pais'];
                        ?>
                        <option value="<?php echo $contry ?>"><?php echo $contry ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select><br><br>
                    <label for="">Selecciona el tipo de empresa</label><br><br>
                    <select name="tipo_empresa" id="">
                        <option value="Selecciona el tipo de empresa">Selecciona el tipo de empresa</option>
                        <?php
                            $queryType = "SELECT * FROM etipos";
                            $resultType = mysqli_query($conn, $queryType);
                            if ($resultType) {
                                while ($rowType = $resultType->fetch_array()) {
                                    $type = $rowType['nombre_etipo'];
                        ?>
                        <option value="<?php echo $type ?>"><?php echo $type ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select><br><br>
                    <p>
                        Al hacer clic en "Aceptar y continuar", aceptas el 
                        <a href="">
                            Acuerdo de AllShop Services Business Solutions
                        </a>  y la 
                        <a href="">
                            política de privacidad de AllShop.
                        </a>
                    </p>
                    <input type="submit" name="contry" class="save" value="Aceptar y continuar">
                </form>
            </div>
        </div>
        <div class="container_questions_contry">
            <div class="title_questions_contry">
                <h3>Preguntas frecuentes</h3>
            </div>
            <hr>
            <div class="questions_contry">
                <div class="question">
                    <?php
                        $queryQuestions = "SELECT * FROM frecuentes";
                        $resultQuestions = mysqli_query($conn, $queryQuestions);
                        if ($resultQuestions) {
                            while ($rowQuestions = $resultQuestions->fetch_array()) {
                                $questions = $rowQuestions['pregunta_frecuente'];
                                $reply = $rowQuestions['respuesta_frecuente'];
                    ?>
                    <p class="p-questions"><?php echo $questions?></p>
                    <p class="p-reply"><?php echo $reply?></p>
                    <hr>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
</section>
    <?php
        require_once ".././components/footer.php";
    ?>