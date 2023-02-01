<?php
    session_start();
    if (empty($_SESSION['id_usuario'])) {
            header("location: ../../../seller");
    }if ($_SESSION['tiendaNombre_vendedor'] != '') {
        header("location: ../company/check-info-seller");
    }if ($_SESSION['EstatusVendedor_usuario'] == 'Activo') {
        header("location: ../../../../user/seller/dashboard-seller");
    }
    require_once "../../config/conn.php";
    require_once "../../config/APP.php";
    require_once ".././components/head.php";
    require_once ".././components/headerSeller.php";
?>
<section class="section-nums-dates-seller">
    <div class="container-dates-seller-numbers">
            <div class="container-numbers">
                <div class="numbers check">
                    <div class="n "><i class='bx bx-check'></i></div>
                </div>
                <div class="text-numbers">
                    <p>Información del vendedor</p>
                </div>
            </div>
            <div class="container-numbers">
                <div class="numbers check">
                    <div class="n"><i class='bx bx-check'></i></div>
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
                    <h3>Información de su tienda y producto</h3>
                    <hr>
                </div>
                <form action="<?php echo SERVERURL ?>controllers/storeController.php" method="POST" class="form-seller">
                    <div class="info-cart">
                        <div class="column-info-cart">
                            <label for="">Nombre de su tienda </label><br>
                            <input type="text" name="tiendaNombre_vendedor" required>
                        </div>
                    </div>
                    <div class="info-cart">
                        <div class="column-info-cart">
                            <label for="">¿Tiene códigos de producto universales (UPC) para todos sus productos?</label><br>
                            <div class="cart-radios">
                                <input style="width: 2%;" type="radio" name="codigos" required value="Si"><label>Si</label>
                                <input style="width: 2%;" type="radio" name="codigos" required value="No"><label>No</label>
                            </div>                        
                        </div>
                    </div>
                    <div class="info-cart">
                        <div class="column-info-cart">
                            <label for="">¿Es usted el fabricante o propietario de la marca de alguno de los productos que desea vender en AllShop?</label><br>
                            <div class="cart-radios">
                                <input style="width: 2%;" type="radio" name="propietario" required value="Si"><label>Si</label>
                                <input style="width: 2%;" type="radio" name="propietario" required value="No"><label>No</label>
                            </div>                        
                        </div>
                    </div>
                    <input type="submit" name="store" value="siguiente" class="next next-p save">
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