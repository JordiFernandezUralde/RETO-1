<?php
require_once "model/Pregunta.php";
require_once "BaseController.php";

class PreguntaController extends BaseController
{
    public $page_title;
    public $view;
    public $model;

    public function __construct(){
        parent::__construct();
        $this->view = "list";
        $this->page_title = "";
        $this->model = new Pregunta();
    }
    public function list(){
        $this->page_title = "Listado de Preguntas";
        return $this->model->getPreguntas();
    }
    public function create(){
        $this->page_title = "Crear Pregunta";
        $this->view ='create';
    }
    public function save(){
        $this->page_title ='Crear Pregunta';
        $this->view ='create';
        $id =$this->model->save($_POST);
        $result = $this->model->getPreguntaById($id);
        $_GET["response"] = true;
        return $result;
    }
    public function detalle() {
        $this->view = "detalle";
        $pregunta = $this->model->getPreguntaById($_GET["id"]);
        $respuestas = $this->model->getRespuestasByIdPregunta($_GET["id"]);
        /*if (empty($dataToView["data"]['respuestas'])) {
            return $dataToView["data"]['pregunta'];
        }
        return $dataToView;*/
        return ["pregunta"=>$pregunta,"respuestas"=>$respuestas];
    }
    public function delete(){
        $this->view = "";
        if (isset($_POST["id"])) {
            $result = $this->model->deletePreguntaById($_POST["id"]);
            if ($result) {
                header("Location: index.php?controller=pregunta&action=list");
                exit();
            } else {
                echo "Error al eliminar la pregunta.";
            }
        } else {
            echo "ID no proporcionado para la eliminación.";
            return false;
        }
    }
    public function listCategoria(){
        $this->page_title = "Listado de Preguntas";
        $this->view ='listCategoria';
        return $this->model->getPreguntaByCategoria($_POST["categoria"]);
    }
}
