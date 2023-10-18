<?php
class SiniestrosModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=liquidadora_stros;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getSiniestros() {
        $query =$this->db->prepare('SELECT * FROM siniestros ' );
        $query->execute();

        // $tasks es un arreglo de tareas
        $stros = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $stros;
    }
    function getDetalleItem($id) {
        $query = $this->db->prepare("SELECT * FROM siniestros WHERE id_Stros = ?");
        $query->execute([$id]);

        // $tasks es un arreglo de tareas
        $ItemStro = $query->fetch(PDO::FETCH_OBJ);
        
        return $ItemStro;
    }

    /**
     * Inserta la tarea en la base de datos
     */
    function insertSiniestro($title, $description, $priority) {
        $query = $this->db->prepare('INSERT INTO tareas (titulo, descripcion, prioridad) VALUES(?,?,?)');
        $query->execute([$title, $description, $priority]);

        return $this->db->lastInsertId();
    }

    
    function deleteSiniestro($id) {
    $query = $this->db->prepare('DELETE FROM tareas WHERE id = ?');
    $query->execute([$id]);
}

    function updateSiniestro($id) {    
    $query = $this->db->prepare('UPDATE tareas SET finalizada = 1 WHERE id = ?');
    $query->execute([$id]);
}
}
?>