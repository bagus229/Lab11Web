<?php
$db = new Database();
$data = $db->query("SELECT * FROM artikel");
?>
<a href="/lab11_php_oop/module/artikel/tambah.php">Tambah Artikel</a>
<style>
    /* Gaya umum untuk body */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 20px;
    color: #333;
}

/* Judul */
h2 {
    margin-bottom: 20px;
    color: #444;
}

/* Link tambah artikel */
a {
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
    padding: 8px 12px;
    border-radius: 5px;
    transition: background-color 0.3s;
    display: inline-block;
    margin-bottom: 15px;
}

a:hover {
    background-color: #0056b3;
}

/* Tabel */
table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

table th, table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #007bff;
    color: white;
}

/* Baris tabel saat hover */
table tr:hover {
    background-color: #f1f1f1;
}

/* Aksi link di tabel */
table td a {
    background-color: #28a745;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s;
}

table td a:hover {
    background-color: #218838;
}

</style>
<h2 style="text-align:center;">Daftar Artikel</h2>

<table border="1" width="100%" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = $data->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['judul']; ?></td>
            <td>
                <a href="/lab11_php_oop/artikel/ubah?id=<?= $row['id']; ?>">Ubah</a>
            </td>
        </tr>
    <?php } ?>
</table>
