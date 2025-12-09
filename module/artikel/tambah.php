<style>
    /* Form container */
form {
    background-color: #fff;
    padding: 20px;
    max-width: 600px;
    margin: 20px auto;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
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
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #0056b3;
}

/* Pesan sukses / error */
.success {
    color: green;
    margin-bottom: 10px;
}

.error {
    color: red;
    margin-bottom: 10px;
}

</style>
<?php
require_once "../../class/Database.php";
require_once "../../class/Form.php";

$db = new Database();
$form = new Form("", "Simpan Artikel");

// Jika disubmit
if ($_POST) {

    $data = [
        'judul' => $_POST['judul'],
        'isi'   => $_POST['isi']
    ];

    $simpan = $db->insert('artikel', $data);

    if ($simpan) {
        echo "<div style='color:green; margin-bottom:10px;'>Artikel berhasil disimpan!</div>";
        echo "<script>
                setTimeout(() => {
                    window.location='/lab11_php_oop/module/artikel/index.php';
                }, 1000);
              </script>";
    } else {
        echo "<div style='color:red; margin-bottom:10px;'>Gagal menyimpan artikel.</div>";
    }
}

// Tambah field
$form->addField("judul", "Judul Artikel");
$form->addField("isi", "Isi Artikel", "textarea");

?>

<h2>Tambah Artikel</h2>

<?php
$form->displayForm();
?>
