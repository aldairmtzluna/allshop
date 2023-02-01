<?php
    session_start();
    if (empty($_SESSION['id_usuario'])) {
        header("location: ../../../seller");
    }if ($_SESSION['nacimiento_usuario'] != '') {
        header("location: ../company/name-seller");
    }
    require_once "../../config/conn.php";
    require_once "../../config/APP.php";
    require_once ".././components/head.php";
    require_once ".././components/headerSeller.php";
?>
<section class="section-nums-dates-seller">
    <div class="container-dates-seller-numbers">
            <div class="container-numbers">
                <div class="numbers">
                    <div class="n">1</div>
                </div>
                <div class="text-numbers">
                    <p>Información del vendedor</p>
                </div>
            </div>
            <div class="container-numbers">
                <div class="numbers">
                    <div class="n">2</div>
                </div>
                <div class="text-numbers">
                    <p>Facturación</p>
                </div>
            </div>
            <div class="container-numbers">
                <div class="numbers">
                    <div class="n">3</div>
                </div>
                <div class="text-numbers">
                    <p>Tienda</p>
                </div>
            </div>
            <div class="container-numbers">
                <div class="numbers">
                    <div class="n">4</div>
                </div>
                <div class="text-numbers">
                    <p>Verificación</p>
                </div>
        </div>
    </div>
</section>
<section class="contry-section" style="margin-top: -40px;">
    <div class="container-form-contry">
            <div class="container-info-form-contry-company">
                <div class="container-title-contry">
                    <h3>Información del vendedor <?php echo $_SESSION['usuario_usuario']?></h3>
                    <hr>
                </div>
                <form action="<?php echo SERVERURL ?>controllers/dataController.php" method="POST" class="form-seller">
                    <?php
                        $id = $_SESSION['id_usuario'];
                        $queryDates = $conn->query("SELECT nombre_usuario FROM usuarios WHERE id_usuario = '$id'");
                        if ($rowDates = mysqli_fetch_array($queryDates)) {
                    ?>
                        <label for="">Nombre</label><br>
                        <input type="text" name="nombre_vendedor" class="name" value="<?php echo $rowDates['nombre_usuario'];?>"  required><br>
                    <?php
                        }
                    ?>
                    <p class="p-name">Introduce tu nombre completo, tal como aparece en el pasaporte o documento de identidad</p>
                    <?php
                        $id = $_SESSION['id_usuario'];
                        $queryNationality = $conn->query("SELECT pais_empresa FROM empresas WHERE id_usuario_empresa = '$id'");
                        if ($rowNationality = mysqli_fetch_array($queryNationality)) {
                    ?>
                    <div class="row-info">
                        <div class="column-info">
                            <label for="">País</label><br>
                            <select name="pais_vendedor" id="" required>
                                <option value="<?php echo $rowNationality['pais_empresa'] ?>"><?php echo $rowNationality['pais_empresa'] ?></option>
                            </select><br>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="column-info">
                            <label for="">Fecha de nacimiento (DD/MM/AAAA)</label><br>
                            <select name="diaVendedor" required>
                                <?php
                                    for ($i=1; $i<=31; $i++) {
                                        if ($i == date('j'))
                                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                        else
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                ?>
                            </select>
                            <select name="mesVendedor" id="" required>
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                            </select>
                            <select name="añoVendedor" required>
                                <?php
                                    for($i=date('o'); $i>=1910; $i--){
                                        if ($i == date('o'))
                                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                        else
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <label for="" style="margin-left:5%; margin-top: 15%;">Domicilio social</label><br>
                    <div class="row-info">
                        <div class="column-info">
                            <?php
                                $id = $_SESSION['id_usuario'];
                                $queryNationality = $conn->query("SELECT pais_empresa FROM empresas WHERE id_usuario_empresa = '$id'");
                                if ($rowNationality = mysqli_fetch_array($queryNationality)) {
                            ?>
                                <select name="paisEmpresa_vendedor" id="" required class="select-contry">
                                    <option value="<?php echo $rowNationality['pais_empresa'] ?>"><?php echo $rowNationality['pais_empresa'] ?></option>
                                </select><br>
                            <?php
                                }
                            ?>
                            <input type="text" name="direccion_vendedor" placeholder="Línea uno de dirección"><br>
                            <input type="text" name="ciudad_vendedor" placeholder="ciudad/población"><br>
                        </div>
                        <div class="column-info">
                            <input type="number" name="cp_vendedor" placeholder="Codigo postal"><br>
                            <input type="text" name="extra_vendedor" placeholder="Apartamento/Edificio/Suite/Otro"><br>
                            <input type="text" name="municipio_vendedor" placeholder="Municipio/Alcaldia"><br>
                        </div>
                    </div>
                    <input type="submit" name="data" value="siguiente" class="next save">
                </form>
            </div>
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