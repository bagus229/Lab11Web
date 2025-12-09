<?php
// Include library
include "form.php";
include "database.php";

// Instance objek
$db = new Database();
$form = new Form("", "Simpan Data"); // Action kosong artinya submit ke halaman
yang sama

// Logika penyimpanan data jika tombol submit ditekan
if ($_POST) {
    // Kita anggap input 'nama' sesuai dengan kolom database
    $data = [
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'pass' => $_POST['pass'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'agama' => $_POST['agama'],
        'hobi' => $_POST['hobi'],
        'alamat' => $_POST['alamat'],
    ];

    // Simpan ke tabel 'users'
    $simpan = $db->insert('users', $data);

    if ($simpan) {
        echo "<div style='color:green'>Data berhasil disimpan!</div>";
    } else {
        echo "<div style='color:red'>Gagal menyimpan data.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Praktikum 10 - OOP</title>
</head>
<body>
    <h3>Form Input User (OOP)</h3>
    <?php

    // Menampilkan Form
    // 1. Input Text Biasa
    $form->addField("nama", "Nama Lengkap");
    $form->addField("email", "Email");

    // 2. Input Password (Tipe baru)
    $form->addField("pass", "Password", "password");

    // 3. Input Radio Button (Single selection)
    // Parameter ke-4 adalah array pilihan: 'value' => 'Label yang muncul'
    $form->addField("jenis_kelamin", "Jenis Kelamin", "radio", [
        'L' => 'Laki-laki',
        'P' => 'Perempuan'
    ]);

    // 4. Input Select / Dropdown
    $form->addField("agama", "Agama", "select", [
        'Islam' => 'Islam',
        'Kristen' => 'Kristen',
        'Katolik' => 'Katolik',
        'Hindu' => 'Hindu',
        'Budha' => 'Budha'
    ]);

    // 5. Input Checkbox (Multi selection)
    $form->addField("hobi", "Hobi", "checkbox", [
        'Membaca' => 'Membaca',
        'Coding' => 'Coding',
        'Traveling' => 'Traveling'
    ]);

    // 6. Input Textarea
    $form->addField("alamat", "Alamat Lengkap", "textarea");
    
    // Tampilkan Form
    $form->displayForm();
    ?>
</body>
</html>