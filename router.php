<?php
require_once './app/controllers/liquidadores.controller.php';
require_once './app/controllers/siniestros.controller.php';
//require_once './app/controllers/about.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = "home"; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar    ->         liquidadoresController->mostrarLiquidadores();
// agregar   ->         liquidadoresController->gregarLiquidadores();
// eliminar/:ID  ->     liquidadoresController->borrarLiquidador($id); 
// finalizar/:ID  ->    liquidadoresController->editarLiquidador($id);
// about ->             aboutController->showAbout();
// login ->             authContoller->showLogin();
// logout ->            authContoller->logout();
// auth                 authContoller->auth(); // toma los datos del post y autentica al usuario

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);


switch ($params[0]) {
    case 'listarStro':
        $controller = new SiniestrosController();
        $controller->mostrarSiniestros();
        break;
    case 'home':
        $controller= new SiniestrosController();
        $controller->showHome();
        break;

    case 'detalleStro':
            $controller = new SiniestrosController();
            $controller->mostrarItemSiniestro($params[1]);
            break;
    case 'listarLiquidadores':
        $controller = new LiquidadoresController();
        $controller->mostrarLiquidadores();
        break;
    case 'eliminarStro':
        $controller = new SiniestrosController();
        $controller->borrarLiquidador($params[1]);
        break;
    case 'editarStro':
        $controller = new SiniestrosController();
        $controller->editarLiquidador($params[1]);
        break;
    case 'about':
        $controller = new AboutController();
        $controller->showAbout();
        break;
    case "login":
        $controller = new AuthController();
        $controller->showLogin(); 
        break;
    case 'abc':
        
        $controller = new AuthController();
        $controller->auth();
        
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}
?>
