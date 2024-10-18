<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .preguntaGrupo{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        margin: 20px;
        width: 90%;
        margin: 20px auto;;
    }
    .preguntaBlock {
        background-color: #364156;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 5px 5px 10px #dff8eb56;
        width: 100%;
        margin: 25px;
    }
    .preguntaTopSection{
        display: flex;
        justify-content: center;
        margin: 5px;
        width: 100%;
    }
    .preguntaTopSection input{
        width: 100%;
        padding: 10px 0;
        border-radius: 15px;
        text-align: center;
        background-color: #CDCDCD;
    }
    .preguntaBottomSection{
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-top: 10px;
    }
    .preguntaBottomLeft{
        flex: 1;
    }
    .preguntaBottomLeft input{
        width: 100%;
        height: 100%;
        padding: 10px;
        background-color: #CDCDCD;
        border-radius: 15px;
        border: none;
        resize: none;
        text-align: center;
    }
    .preguntasBottomRight {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex: 0.48;
        margin-top: 7px;
    }

    .preguntasBottomRight input {
        padding: 10px;
        background-color: #CDCDCD;
        border-radius: 15px;
        border: none;
        margin-bottom: 10px;
        text-align: center;
    }
</style>
<div class="preguntaGrupo">
    <?php
        if (count($dataToView["data"]) > 0){
            foreach ($dataToView["data"] as $pregunta){
                ?>
                <div class="preguntaBlock">
                    <div class="preguntaTopSection">
                    <input type="text" name="titulo" class="titulo" value="<?php echo $pregunta["titulo"]; ?>">
                    </div>
                <div class="preguntaBottomSection">
                    <div class="preguntaBottomLeft">
                    <input type="text" name="descripcion" class="descripcion" value="<?php echo $pregunta["descripcion"]; ?>">
                </div>
                <div class="preguntasBottomRight">
                    <input type="text" name="usuario" class="usuario" value="<?php echo $pregunta["id_usuario"]; ?>">
                    <input type="text" name="categoria" class="categoria" value="<?php echo $pregunta["categoria"]; ?>">
                </div>
            </div>
        </div>
        <?php
            }
        }else{
        ?>
            <p>Actualmente no existen preguntas</p>
        <?php
        }
    ?>
</div>