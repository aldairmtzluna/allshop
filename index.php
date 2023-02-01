<?php
    require_once "./config/APP.php";
    require_once "./config/conn.php";
    require_once "./views/components/head.php";
?>
<body>
<?php
    require_once "./views/components/header.php";
?>
<div class="slider-bg">
  <div class="slider-bg-content">
    <div id="container-slider" style=" width: 49%; margin-left: 1%">
      <a href="javascript: fntExecuteSlide('prev');" class="arrowPrev"><i class="fas fa-chevron-circle-left"></i></a>
      <a href="javascript: fntExecuteSlide('next');" class="arrowNext"><i class="fas fa-chevron-circle-right"></i></a>
      <ul class="listslider" style="">
        <li><a itlist="itList_0" href="#" class="item-select-slid"></a></li>
        <li><a itlist="itList_1" href="#"></a></li>
        <li><a itlist="itList_2" href="#"></a></li>
        <li><a itlist="itList_3" href="#"></a></li>
        <li><a itlist="itList_4" href="#"></a></li>
        <li><a itlist="itList_5" href="#"></a></li>
      </ul>
      <ul id="slider">
      <?php
            $query = $conn->query("SELECT * FROM  sliders");
            if ($fila = mysqli_fetch_array($query)) {
        ?>
          <li style="background-image: url('<?php echo SERVERURL ?>views/img/bg/<?php echo $fila ['fondo1_slide'];?>'); z-index:0; opacity: 1;">
          </li>
          <li style="background-image: url('<?php echo SERVERURL ?>views/img/bg/<?php echo $fila ['fondo2_slide'];?>'); ">
          </li>
          <li style="background-image: url('<?php echo SERVERURL ?>views/img/bg/<?php echo $fila ['fondo3_slide'];?>'); ">
          </li>
          <li style="background-image: url('<?php echo SERVERURL ?>views/img/bg/<?php echo $fila ['fondo4_slide'];?>'); ">
          </li>
          <li style="background-image: url('<?php echo SERVERURL ?>views/img/bg/<?php echo $fila ['fondo5_slide'];?>'); ">
          </li><li style="background-image: url('<?php echo SERVERURL ?>views/img/bg/<?php echo $fila ['fondo6_slide'];?>'); ">
          </li>
          <?php
            }
          ?>
       </ul>
    </div>
    <div class="bg-double">
      <div class="row-bg-double">
      <?php
            $queryInd = $conn->query("SELECT * FROM individuales");
            if ($filaInd = mysqli_fetch_array($queryInd)) {
        ?>
        <img src="<?php echo SERVERURL ?>views/img/bg/<?php echo $filaInd ['fondo1_individual'];?>" alt="">
      </div>
      <div class="row-bg-double">
        <img src="<?php echo SERVERURL ?>views/img/bg/<?php echo $filaInd ['fondo2_individual'];?>" alt="">
      <?php
        }
      ?>
      </div>
    </div>
  </div>
</div>
<section class="categories">
  <div class="section-title">
    <h2>Categorias</h2>
  </div>
  <div class="container-categories">
    <div class="row-categories">
    <?php
          if ($conn) {
              $queryCat = "SELECT * FROM categorias ORDER BY id_categoria ASC LIMIT 10";
              $result = mysqli_query($conn, $queryCat);
              if ($result) {
                  while ($row = $result->fetch_array()) {
                      $id_cat = $row['id_categoria'];
                      $titleCat = $row['titulo_categoria'];
                      $photoCat = $row['foto_categoria'];
      ?>
      <div class="column-categories">
        <a href="<?php SERVERURL ?>category/<?php echo $row ['id_categoria'];?>/<?php echo $row ['titulo_categoria'];?>&AS=<?php echo hash_hmac('sha1', $row['titulo_categoria'], KEY_TOKEN); ?>" class="a-column-categories">
          <div class="container-info-column-cat">
            <div class="container-img-column-cat">
              <img src="./views/img/categorias/<?php echo $row['foto_categoria'] ?>" alt="" class="img-column-categories"></img>
              <div class="title-column-categories">
                <p class="p-column-categories"><?php echo $row['titulo_categoria'] ?></p>
              </div>
            </div>
          </div>
        </a>
      </div>
      <?php
            }
          }
        }
      ?>
    </div>
    <div class="row-categories">
    <?php
          if ($conn) {
              $queryCat = "SELECT * FROM categorias ORDER BY id_categoria DESC LIMIT 10";
              $result = mysqli_query($conn, $queryCat);
              if ($result) {
                  while ($row = $result->fetch_array()) {
                      $id_cat = $row['id_categoria'];
                      $titleCat = $row['titulo_categoria'];
                      $photoCat = $row['foto_categoria'];
      ?>
      <div class="column-categories">
      <a href="<?php SERVERURL ?>category/<?php echo $row ['id_categoria'];?>/<?php echo $row ['titulo_categoria'];?>&AS=<?php echo hash_hmac('sha1', $row['titulo_categoria'], KEY_TOKEN); ?>" class="a-column-categories">
       <div class="container-info-column-cat">
            <div class="container-img-column-cat">
              <img src="./views/img/categorias/<?php echo $row['foto_categoria'] ?>" alt="" class="img-column-categories"></img>
              <div class="title-column-categories">
                <p class="p-column-categories"><?php echo $row['titulo_categoria'] ?></p>
              </div>
            </div>
          </div>
        </a>
      </div>
      <?php
            }
          }
        }
      ?>
    </div>
  </div>
</section>
<?php
    require_once "./views/components/footer.php";
    require_once "./views/components/scripts.php";
?> 
</body>
</html>
