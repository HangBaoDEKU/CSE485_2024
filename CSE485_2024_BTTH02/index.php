<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action     = isset($_GET['action']) ? $_GET['action'] : 'index';
$id         = isset($_GET['id']) ? $_GET['id'] : null; // Lấy ID từ query string

$controller = ucfirst($controller);
$controller .= 'Controller';
$controllerPath = './app/controllers/' . $controller . '.php';

if (file_exists($controllerPath)) {
    require_once($controllerPath);
    $myObj = new $controller(); 

    // Kiểm tra xem action có tồn tại và gọi phương thức tương ứng
    if (method_exists($myObj, $action)) {
        // Kiểm tra xem action cần ID không
        if (in_array($action, ['edit', 'delete']) && $id) {
            $myObj->$action($id); // Gọi edit hoặc delete với ID
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