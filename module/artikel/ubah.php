<style>
    /* Body umum */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 20px;
    color: #333;
}

/* Judul halaman */
h2 {
    margin-bottom: 20px;
    color: #444;
    text-align: center;
}

/* Form container */
form {
    background-color: #fff;
    padding: 20px;
    max-width: 600px;
    margin: 0 auto 20px auto;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

/* Label */
form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

/* Input dan textarea */
form input[type="text"],
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}

/* Textarea khusus */
form textarea {
    resize: vertical;
    height: 150px;
}

/* Tombol submit */
form button {
    background-col

</style>
<?php
require_once __DIR__ . "/../../class/Database.php";
require_once __DIR__ . "/../../class/Form.php";

// Instance kelas
$db = new Database();

// Ambil ID dari URL
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Ambil data artikel berdasarkan ID
$artikel = $db->getById("artikel", "id", $id);

if (!$artikel) {
    echo "<div style='color:red'>Data artikel tidak ditemukan.</div>";
    exit;
}

// Buat form
$form = new Form("", "Update Artikel");

// Jika form disubmit
if ($_POST) {

    $data = [
        'judul' => $_POST['judul'],
        'isi'   => $_POST['isi']
    ];

    $update = $db->update("artikel", $data, "id", $id);

    if ($update) {
        echo "<div style='color:green; margin-bottom:10px;'>Artikel berhasil diupdate!</div>";
        echo "<script>setTimeout(() => { window.location='/lab11_php_oop/artikel/index'; }, 1000);</script>";
    } else {
        echo "<div style='color:red; margin-bottom:10px;'>Gagal update artikel.</div>";
    }
}

// Tambahkan field input + isi default
$form->addField("judul", "Judul Artikel", "text", $artikel['judul']);
$form->addField("isi", "Isi Artikel", "textarea", $artikel['isi']);

?>

<h2>Ubah Artikel</h2>

<?php
// Tampilkan form
$form->displayForm();
?>
