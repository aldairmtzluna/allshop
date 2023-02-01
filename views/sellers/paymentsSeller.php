<?php
    session_start();
    if (empty($_SESSION['id_usuario'])) {
        header("location: ../../../seller");
    }if ($_SESSION['tarjetaEstatus_vendedor'] == 'Activada') {
        header("location: ../company/store-seller");
    } if ($_SESSION['EstatusVendedor_usuario'] == 'Activo') {
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
                    <h3>Información de facturación</h3>
                    <hr>
                </div>
                <div class="text-information-seller">
                    <div class="info-payments-seller">
                        <div class="title-information-seller">
                            <h3>Cuota de suscripción mensual</h3>
                        </div>
                        <div class="text">
                            <p>
                                El primer mes, se te cobrará la cuota 
                                de suscripción de 600,00 MXN del plan de ventas
                                Profesional. Si tienes listings activos, se te 
                                seguirá cobrando esta tarifa cada mes. Si no tienes 
                                listings activos, no se te cobrará la cuota de 
                                suscripción ese mes. Si amplías tu negocio para 
                                vender en otras tiendas, pagarás el equivalente de 
                                39,99 USD al mes, dividido de forma proporcional entre cada 
                                país o región en que tengas un listing activo y se te cobrará 
                                por separado en la divisa correspondiente. Puedes cambiar el plan
                                de ventas en cualquier momento. Para más información, consulta 
                                <a href="">esta página.</a>
                            </p>
                        </div>
                    </div>
                </div>
                <form action="<?php echo SERVERURL ?>controllers/paymentsController.php" method="POST" class="form-seller">
                    <div class="info-cart">
                        <div class="column-info-cart">
                            <label for="">Número de tarjeta de crédito o débito </label><br>
                            <input type="text" name="numero_tarjeta" required>
                        </div>
                        <div class="column-info-cart">
                            <label for="">Fecha de vencimiento</label><br>
                            <select name="mesVencimiento" id="">
                                <?php
                                    for ($i=1; $i <= 12; $i++) { 
                                        if ($i == date('F')) {
                                            echo '<option value = "'.$i.'" selected>'.$i.'</option>';
                                        }else {
                                            echo '<option value = "'.$i.'">'.$i.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                            <select name="añoVencimiento" required>
                                <?php
                                    for($i = 2023; $i <= 2043; $i++){
                                        if ($i == date('o')){
                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                        }else{
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="info-cart">
                        <div class="column-info-cart">
                            <label for="">Nombre del titular de la tarjeta</label><br>
                            <input type="text" name="nombre_tarjeta" required>
                        </div>
                    </div>
                    <input type="submit" name="pagos" value="siguiente" class="next next-p save">
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