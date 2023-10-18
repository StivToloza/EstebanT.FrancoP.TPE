<?php
    class LiquidadoresModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=liquidadora_stros;charset=utf8', 'root', '');
        }
    /**
     * Obtiene y devuelve de la base de datos todas los liquidadores.
     */
        function getLiquidador(){
            $query = $this->db->prepare('SELECT * FROM liquidadores');
            $query->execute();

            $liquidadores = $query->fetchAll(PDO::FETCH_OBJ);

            return $liquidadores;
        }

    /**
     * Inserta la tarea en la base de datos
     */
    function insertLiquidador($nombre, $apellido, $contacto, $email) {
        $query = $this->db->prepare('INSERT INTO liquidadores (nombre, apellido, contacto, email) VALUES(?,?,?,?)');
        $query->execute([$nombre, $apellido, $contacto, $email]);

        return $this->db->lastInsertId();
    }

    /**
     * Borrar un liquidador en la base de datos
     */
    function deleteLiquidador($id) {
        $query = $this->db->prepare('DELETE FROM liquidadores WHERE id = ?');
        $query->execute([$id]);
    }

    /**
     * Editar un liquidador en la base de datos
     */
        function updateLiquidador($id) {    
        $query = $this->db->prepare('UPDATE liquidadores SET finalizada = 1 WHERE id = ?');
        $query->execute([$id]);
    }
}
?>