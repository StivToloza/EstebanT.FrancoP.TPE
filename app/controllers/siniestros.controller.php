
<?php
require_once './app/models/siniestros.model.php';
require_once './app/views/siniestros.view.php';
require_once './app/helper/auth.helper.php';    
    class SiniestrosController{
        private $model;
        private $view;

        public function __construct(){
            //AuthHelper::Verify();

            $this->model= new SiniestrosModel();
            $this->view= new SiniestrosView();
        }

        public function mostrarSiniestros() {
            $stros = $this->model->getSiniestros();

            $this->view->showSiniestros($stros);
        }
        public function mostrarItemSiniestro(){
            $itemid = $_POST['id_Stro'];
            
            if (empty($itemid)) {
                $this->view->showError("Debe completar todos los campos");
                return;
            }
            $id= $this->model->getDetalleItem($itemid);
          
            $this->view->showDetalleItem($id);
        }

        public function agregarSiniestro() {

            // obtengo los datos del usuario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $contacto = $_POST['contacto'];
            $email = $_POST['email'];
    
            // validaciones
            if (empty($nombre) || empty($apellido)|| empty($contacto)|| empty($email)) {
                $this->view->showError("Debe completar todos los campos");
                return;
            }
    
            $id = $this->model->insertSiniestro($nombre, $apellido, $contacto, $email);
            if ($id) {
                header('Location:' . BASE_URL);
            } else {
                $this->view->showError("Error al insertar el liquidador");
            }
        }

        function borrarLiquidador($id) {
            $this->model->deleteSiniestro($id);
            header('Location: ' . BASE_URL);
        }
        
        function editarLiquidador($id) {
            $this->model->updateSiniestro($id);
            header('Location: ' . BASE_URL);
        }
        function showHome(){
            $this->view->mostrarHome();
        }
    }
    



?>