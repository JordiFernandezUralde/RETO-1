<div class="pagina-usuario">
    <div class="div-foto-perfil">
        <label for="foto">
            <img class="foto-perfil" src="<?php echo $dataToView["data"]["usuario"]["foto"]!="" ? $dataToView["data"]["usuario"]["foto"] : 'assets/Images/blank-profile-picture-973460_1280.webp';?>" alt="">
        </label>
        <form method="post" enctype="multipart/form-data" action="index.php?controller=usuario&action=guardarFotoPerfilGuia">
            <input style="display: none;" type="file" name="foto" id="foto">
            <input type="submit" class="btn-enviar-foto">
        </form>
    </div>
    <div class="div-principal-respuestas">
        <h3>PREGUNTAS</h3>
        <?php if(!empty($dataToView["data"]["guia"])): foreach($dataToView["data"]["guia"] as $preguntas):?>
            <div class="div-respuesta">
                <div class="titulo_pregunta">
                    <h2> <?php echo $preguntas["nombre"]?> </h2>
                </div>

                <form method="post" action="index.php?controller=respuesta&action=descargarPDF&id=<?php echo $preguntas["id_documento"]?>">
                <button class="button">
                    <span class="button-content">Descargar</span>
                </button>
                </form>


                <div class="likes">
                    <form method="post" action="index.php?controller=usuario&action=eliminarPDFusu&id=<?php echo $preguntas["id_documento"] ?>">
                        <input type="hidden" id="id" name="id" value="<?php echo $preguntas["id_documento"] ?>" >
                        <button class="btn-eliminar-pregunta-usuario" type="submit">
                            <img class="papelera_usuario" src="assets/Images/Iconos/papelera.png" alt="">
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; else: ?>
        <?php endif; ?>
    </div>
    <div class="acciones-usuario">
        <a class="link-acciones-usuario" href="index.php?controller=usuario&action=listRespuestas">Mostrar respuestas <img src="assets/Images/Iconos/respuesta.png"> </a>
        <a class="link-acciones-usuario" href="#">Mostrar preguntas <img src="assets/Images/Iconos/pregunta.png"> </a>
        <a class="link-acciones-usuario" href="index.php?controller=usuario&action=listGuia">Guias de reparacion <img src="assets/Images/Iconos/guia.png"></a>
        <?php if (isset($_COOKIE["rol_usuario"]) && $_COOKIE["rol_usuario"] == "admin") { ?>
            <a class="link-acciones-usuario" href="index.php?controller=usuario&action=create">Crear usuario <img src="assets/Images/Iconos/adduser.png"> </a>
        <?php } ?>
        <a class="link-acciones-usuario" href="#" onclick="habilitarInputs()">Editar perfil<img src="assets/Images/Iconos/edit.png"></a>
    </div>
    <div class="datos-usuario">
        <form id="formDatosUsuario" class="form-datos-usuario" action="index.php?controller=usuario&action=updateUsuarioPreguntas" method="post">
            <input name="id" id="id" type="hidden" value="<?php echo $dataToView["data"]["usuario"]["id"] ?>">
            <input name="nombre" id="nombre" type="text" value="<?php echo $dataToView["data"]["usuario"]["nombre"] ?>" placeholder="nombre">
            <input name="correo" id="correo" type="text" value="<?php echo $dataToView["data"]["usuario"]["correo"]  ?>" placeholder="correo">
            <input name="contrasenna" id="contrasenna" type="text" value="<?php echo $dataToView["data"]["usuario"]["contrasenna"]  ?>" placeholder="contraseña">
            <input class="guardarDatos" type="submit" value="Guardar">
        </form>
    </div>
</div>
<script>
    function habilitarInputs() {
        var datosUsuarioDiv = document.querySelector('.datos-usuario');
        if (datosUsuarioDiv) {
            datosUsuarioDiv.classList.add('visible');
        }
    }
</script>