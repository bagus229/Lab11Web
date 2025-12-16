<?php
session_start();


require_once __DIR__ . "/config.php";
require_once __DIR__ . "/class/Database.php";
require_once __DIR__ . "/class/Form.php";


$path = $_SERVER['PATH_INFO'] ?? '/artikel/index';
$segments = array_values(array_filter(explode('/', $path)));

$mod  = $segments[0] ?? 'artikel';
$page = $segments[1] ?? 'index';

$file = __DIR__ . "/module/$mod/$page.php";


$public_modules = ['artikel', 'user'];

if (!in_array($mod, $public_modules)) {
    if (!isset($_SESSION['is_login'])) {
        header("Location: index.php/user/login");
        exit;
    }
}


if (file_exists($file)) {

    if ($mod === 'user' && $page === 'login') {
        require $file;
    } else {
        require __DIR__ . "/template/header.php";
        require __DIR__ . "/template/sidebar.php";
        require $file;
        require __DIR__ . "/template/footer.php";
    }

} else {
    require __DIR__ . "/template/header.php";
    echo "<h3>Module tidak ditemukan: $mod/$page</h3>";
    require __DIR__ . "/template/footer.php";
}
