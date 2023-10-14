<?php
require_once './app/models/liquidadores.model.php';
require_once './app/views/liquidadores.view.php';
require_once './app/helpers/liquidadores.helper.php';    
    class LiquidadoresController{
        private $model;
        private $view;

        public function __construct(){
            //AuthHelper::Verify();

            $this->model= new LiquidadoresModel();
            $this->view= new LiquidadoresView();
        }

        public function mostrarLiquidadores(){
            $liquidadores = $this->moder->getLiquidador();

            $this->view->showLiquidadores($liquidadores);
        }
    }



?>