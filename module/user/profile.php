<?php
if (!isset($_SESSION['is_login'])) {
    header("Location: index.php/user/login");
    exit;
}

$db = new Database();
$conn = $db->getConnection();

$username = $_SESSION['username'];

$stmt = $conn->prepare("SELECT username, nama FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<style>
    .profile-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .profile-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .profile-table {
        width: 100%;
        border-collapse: collapse;
    }

    .profile-table th,
    .profile-table td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    .profile-table th {
        width: 30%;
        background-color: #f4f6f8;
        color: #555;
    }

    .profile-table tr:last-child td {
        border-bottom: none;
    }

    .profile-actions {
        margin-top: 20px;
        text-align: center;
    }

    .profile-actions a {
        display: inline-block;
        padding: 8px 15px;
        margin: 0 5px;
        background: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
    }

    .profile-actions a.logout {
        background: #dc3545;
    }

    .profile-actions a:hover {
        opacity: 0.9;
    }
</style>

<div class="profile-container">
    <h2>Profile Pengguna</h2>

    <table class="profile-table">
        <tr>
            <th>Username</th>
            <td><?= htmlspecialchars($user['username']) ?></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?= htmlspecialchars($user['nama']) ?></td>
        </tr>
    </table>

    <div class="profile-actions">
        <a href="index.php/artikel/index">Kembali</a>
        <a href="index.php/user/logout" class="logout">Logout</a>
    </div>
</div>
