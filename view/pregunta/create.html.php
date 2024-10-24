    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        form {
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-template-rows: auto auto;
            gap: 20px;
            justify-items: center;
            align-items: center;
            width: 90%;
            margin: 62px auto;
        }
        .preguntaBlock {
            background-color: #364156;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 5px 5px 10px #dff8eb56;
            width: 100%;
            height: 100%;
            grid-column: 1;
            grid-row: 1;
        }
        .preguntaTopSection {
            display: flex;
            justify-content: center;
            margin: 5px;
            width: 100%;
        }
        .preguntaTopSection input {
            width: 100%;
            padding: 10px 0;
            border-radius: 15px;
            text-align: center;
            background-color: #CDCDCD;
        }
        .preguntaBottomSection {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 10px;
        }
        .preguntaBottomLeft {
            flex: 1;
        }
        .preguntaBottomLeft input {
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
        .seccionCategoria {
            background-color: #364156;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 5px 5px 10px #dff8eb56;
            width: 100%;
            grid-column: 2;
            grid-row: 1;
        }
        .annadirPregunta {
            width: 100%;
            padding: 10px 40px;
            background-color: #393939;
            border: 2px solid #CDCDCD;
            border-radius: 10px;
            text-align: center;
            color: #CDCDCD;
            transition: background-color 0.5s ease;
        }
        .annadirPregunta:hover{
            background-color: #CDCDCD;
            color: #393939;
        }
        h3 {
            text-align: center;
            color: #CDCDCD;
            margin: 15px;
        }
        p {
            padding: 10px;
            margin: 10px;
            border-radius: 15px;
            background-color: #CDCDCD;
            text-align: center;
            cursor: pointer;
        }
    </style>

    <form class="form" action="index.php?controller=pregunta&action=save" method="post">
    <div class="preguntaBlock">
        <h3>NUEVA PREGUNTA</h3>
        <div class="preguntaTopSection">
            <input type="text" name="titulo" class="titulo" placeholder="Título">
        </div>
        <div class="preguntaBottomSection">
            <div class="preguntaBottomLeft">
                <input type="text" name="descripcion" class="descripcion" placeholder="Descripción">
            </div>
            <div class="preguntasBottomRight">
                <input type="text" name="nombre" class="nombre" placeholder="Usuario" value="<?php echo isset($_COOKIE['nombre_usuario']) ? htmlspecialchars($_COOKIE['nombre_usuario']) : ''; ?>">
                <input type="text" name="categoria" class="categoria" placeholder="Categoria"> <!-- Este campo se llenará con JS -->
            </div>
        </div>
    </div>
    <div class="seccionCategoria">
        <h3>CATEGORIAS</h3>
        <p>Motores</p>
        <p>Alerones</p>
        <p>Tren de aterrizaje</p>
        <p>Ventanas</p>
    </div>
    <div>
        <input type="submit" value="Añadir pregunta" name="submit" class="annadirPregunta">
    </div>
</form>
    <script>
        const form = document.querySelector('.form');
        const categoriaItems = form.querySelectorAll('.seccionCategoria p');
        const categoriaInput = form.querySelector('input[name="categoria"]');
        categoriaItems.forEach(item => {
            item.addEventListener('click', () => {
                categoriaInput.value = item.textContent;
            });
        });
    </script>

