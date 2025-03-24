<?php
// Kiểm tra biến controller có tồn tại và không rỗng
$controller = isset($_GET['controller']) && !empty($_GET['controller']) ? $_GET['controller'] : 'sinhvien';
$action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : 'index';

// Xử lý lỗi ucfirst(null)
$controllerName = ucfirst(strtolower(trim($controller)));

// Đường dẫn file controller
$controllerFile = __DIR__ . "/controllers/{$controllerName}Controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = $controllerName . "Controller";

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

?>
