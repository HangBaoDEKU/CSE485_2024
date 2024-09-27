<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action     = isset($_GET['action']) ? $_GET['action'] : 'index';
$id         = isset($_GET['id']) ? $_GET['id'] : null; 

$controller = ucfirst($controller);
$controller .= 'Controller';
$controllerPath = './app/controllers/' . $controller . '.php';

if (file_exists($controllerPath)) {
    require_once($controllerPath);
    $myObj = new $controller(); 

 
    if (method_exists($myObj, $action)) {
        if (in_array($action, ['index', 'edit', 'delete']) && $id) {
            $myObj->$action($id); 
        } else if ($action === 'index') {
            $myObj->$action(); 
        } else {
            $myObj->$action(); 
        }
    } else {
        echo "Action not defined or does not exist.";
    }
} else {
    echo "Controller file not found: " . htmlspecialchars($controllerPath);
}
?>
