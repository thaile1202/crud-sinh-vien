<?php
$controller = $_GET['controller'] ?? 'sinhvien';
$action = $_GET['action'] ?? 'index';

// Tạo đường dẫn đến file controller
$controllerFile = "app/controllers/" . ucfirst($controller) . "Controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = ucfirst($controller) . "Controller";

    if (class_exists($controllerClass)) {
        $controllerInstance = new $controllerClass();
        if (method_exists($controllerInstance, $action)) {
            $id = $_GET['id'] ?? null;
            $controllerInstance->$action($id);
        } else {
            echo "❌ Lỗi: Không tìm thấy action `$action` trong controller `$controllerClass`!";
        }
    } else {
        echo "❌ Lỗi: Controller `$controllerClass` không tồn tại!";
    }
} else {
    echo "❌ Lỗi: File `$controllerFile` không tồn tại!";
}


$controllerName = ucfirst($controller) . "Controller";
$controllerFile = "controllers/{$controllerName}.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerInstance = new $controllerName();
    
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        echo "Lỗi: Action `$action` không tồn tại!";
    }
} else {
    echo "Lỗi: Controller `$controllerName` không tồn tại!";
}





?>
