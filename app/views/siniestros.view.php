<?php
class SiniestrosView {
    public function showSiniestros($stros) {
        $count = count($stros);
        require 'templates/strosList.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
    public function showDetalleItem($itemStro) {
        $count = count($itemStro);
        require 'templates/itemStro.phtml';
    }
    public function mostrarHome(){
        require 'templates/header.phtml';
        require 'templates/footer.phtml';
    }
}
?>

