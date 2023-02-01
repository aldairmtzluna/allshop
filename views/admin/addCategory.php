<?php
    session_start();
    require_once "../../config/APP.php";
    require_once "../components/head.php";
    require_once "../components/nav-dashboard.php";
?>
<div class="container-add-category">
    <form action="<?php echo SERVERURL ?>controllers/categoryController.php"  method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="" class="label-category">Titulo de categoria</label><br>
            <input type="text" name="titulo_categoria" id="" placeholder="Titulo"><br><br>
        </div>
        <div class="form-group">
            <label for="" class="label-category">Descripción de categoria</label><br>
            <textarea name="descripcion_categoria" id="" cols="30" rows="10" placeholder="Descripción"></textarea><br><br>
        </div>
        <div class="form-group file-category">
            <div class="col-sm-4 col-12">
                <div class="invoiceBox">
                    <label for="">Foto de categoria</label>
                    <label for="file">
                        <div class="boxFile" data-text="Seleccionar archivo">
                            <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">
                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                            </svg>
                        </div>
                    </label>
                    <input id="file" multiple="" name="foto_categoria" size="6000" type="file" accept="application/pdf,image/x-png,image/gif,image/jpeg,image/jpg,image/tiff">
                </div>
            </div> 
        </div> 
        <br>
            <input type="submit" value="Enviar" name="categoria">
        <br>

    </form>
</div>