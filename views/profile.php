<?php  
    session_start();
    if (empty($_SESSION['id_usuario'])) {
      header ('location: ../user/login');
    }
    require_once "../config/APP.php";
    require_once "./components/head.php";
    require_once "./components/header.php";
    require_once "../config/conn.php";
    require_once "./components/nav-profile.php";
?>
<div class="profile-container">
  <div class="title-profile">
    <div class="titlep">
      <h3>Mi perfil.</h3>
      <p>Administra y protege tu perfil.</p>
    </div>
  </div>
  <form action="" class="form-profile">
    <div class="column-form-profile">
      <div class="form-profile-info">
      <?php
        $id_user = $_SESSION['id_usuario'];
        $query = $conn->query("SELECT *, SUBSTRING(correo_usuario,1,2), SUBSTRING(telefono_usuario,9,10) FROM usuarios WHERE id_usuario = '$id_user'");
        if ($row = mysqli_fetch_array($query)) {
          $email = $row ['correo_usuario'];
          $host = explode('@', $email);
      ?>
      <div class="container-items-form">
        <label for="">Nombre de usuario:</label>
        <input type="text" value="<?php echo " ". $row['usuario_usuario']?>">
      </div>
      <div class="container-items-form">
        <label for="">Nombre:</label>
        <input type="text" name="nombre_usuario" value="<?php echo " ". $row ['nombre_usuario']?>">
      </div>
      <div class="container-items-form">
        <label for="">Correo electronico:</label>
        <p><?php echo $row['SUBSTRING(correo_usuario,1,2)']?>**********@<?php echo $host[1];?></p>
        <a href="">Cambiar</a>
      </div>
      <div class="container-items-form">
        <label for="">Télefono:</label>
        <p>********<?php echo $row['SUBSTRING(telefono_usuario,9,10)']?></p>
        <a href="">Cambiar</a>
      </div>
      <div class="container-items-form">
        <label for="">Fecha de nacimiento (DD/MM/AAAA):</label>
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
      <div class="container-items-form">
        <input type="submit" value="Guardar" name="save" class="save" style="margin-top: 5px;">
      </div>
    </div>
  </div>
  <div class="column-form-profile">
    <div class="profile-user">
      <div class="panel-profile">
        <img src="<?php echo SERVERURL ?>views/img/perfiles/<?php echo $row ['perfil_usuario'];?>">
      </div>
      <?php
      }
      ?>
    </div>
    <div class="file-container">
      <label for="file">
        <div class="file-box" data-text="Seleccionar archivo">
          <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">
            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z">
            </path>
          </svg>
        </div>
      </label>
      <input id="file" multiple="" name="archivo" size="6000" type="file" accept="application/pdf,image/x-png,image/gif,image/jpeg,image/jpg,image/tiff">
    </div>
    <div class="text-sizwe-arch">
      <p>Tamaño de archivo: máximo 1 MB</p>
      <p>Extensión de archivo: .JPEG, .PNG</p>
    </div>
  </form>
</div>
<?php
    require_once "./components/footer.php";
?>