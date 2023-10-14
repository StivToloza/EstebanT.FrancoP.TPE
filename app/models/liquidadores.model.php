<?php
    class LiquidadoresModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=liquidadora_stros;charset=utf8', 'root', '');
        }
        function getLiquidador(){
            $query = $this->db->prepare('SELECT * FROM liquidadores');
            $query->execute();

            $liquidadores = $query->fetchAll(PDO::FETCH_OBJ);

            return $liquidadores
        }
    }