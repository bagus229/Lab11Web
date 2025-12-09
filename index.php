<?php

require "class/Database.php";
require "class/Form.php";

$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/artikel/index';

$segments = explode('/', trim($path, '/'));

$mod  = $segments[0] ?? 'artikel';
$page = $segments[1] ?? 'index';

$file = "module/$mod/$page.php";

require "template/header.php";
require "template/sidebar.php";

if (file_exists($file)) {
    require $file;
} else {
    echo "<h3>Module tidak ditemukan: $mod/$page</h3>";
}

require "template/footer.php";
?>
