
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modular CRUD</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<h1>PHP Modular - Praktikum OOP</h1>



<hr>

<div class="collapse navbar-collapse">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="index.php/home/index">Home</a>
        </li>

        <?php if (isset($_SESSION['is_login'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php/artikel/index">
                    Data Artikel
                </a>
            </li>
        <?php endif; ?>
    </ul>

    <ul class="navbar-nav ms-auto">
        <?php if (isset($_SESSION['is_login'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php/user/logout">
                    Logout (<?= $_SESSION['nama'] ?>)
                </a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php/user/login">
                    Login
                </a>
            </li>
        <?php endif; ?>
    </ul>
</div>
