# Lab11Web

## Nama: Bagus aditya hermawan
## Nim: 312410382
## Kelas: TI.24.A.3
## Mata Kuliah: Pemrograman Web 1

## Langkah-langkah Praktikum Pertemuan 13

## A.Memepersiapkan struktur folder
###### ![Gambar 1](ss/hey1.png)

Langkah 1: Pindahkan file Database.php dan Form.php (dari praktikum sebelumnya) ke
dalam folder class/.
###### ![Gambar 1](ss/hey2.png)

File: database.php
###### ![Gambar 1](ss/hey3.png)

## B. Konfigurasi Dasar
File: config.php Sesuaikan dengan database anda.
###### ![Gambar 1](ss/hey4.png)

## Tugas & Implementasi
Implementasikan konsep modularisasi dari praktikum sebelumnya dan terapkan konsep
routing pada project yang baru.
Contoh Implementasi (Gabungan Form dan Simpan Data)
###### ![Gambar 1](ss/hey5.png)

Contoh Routing:
File: .htaccess File ini penting agar URL localhost/lab11/artikel/index bisa dibaca oleh
server. Buat file baru bernama .htaccess (tanpa nama depan, hanya ekstensi).
###### ![Gambar 1](ss/hey6.png)

File: index.php
###### ![Gambar 1](ss/hey7.png)

## Tugas XAMPP

file .htaccess.
###### ![Gambar 1](ss/hey8.png)

file config.php.
###### ![Gambar 1](ss/hey9.png)

file index.php.
###### ![Gambar 1](ss/hey10.png)

### folder class
file Database.php.
###### ![Gambar 1](ss/hey11.png)

file Form.php.
###### ![Gambar 1](ss/hey12.png)

### folder module/artikel
file index.php.
###### ![Gambar 1](ss/hey13.png)

file tambah.php.
###### ![Gambar 1](ss/hey14.png)

file ubah.php.
###### ![Gambar 1](ss/hey15.png)

### folder template.
file header.php.
###### ![Gambar 1](ss/hey16.png)

file footer.php.
###### ![Gambar 1](ss/hey17.png)

file sidebar.php.
###### ![Gambar 1](ss/hey18.png)

Output
###### ![Gambar 1](ss/hey19.png)
###### ![Gambar 1](ss/hey20.png)
###### ![Gambar 1](ss/hey21.png)

### Langkah-Langkah Praktikum Pertemuan 14
A. Persiapan Database
Membutuhkan tabel untuk menyimpan data pengguna (admin).

1. Buat Tabel users
Jalankan SQL berikut di phpMyAdmin pada database latihan_oop:
###### ![Gambar 1](ss/hey22.png)

2. Insert Data Dummy (User Admin)
Password harus di-hash (dienkripsi).
###### ![Gambar 1](ss/hey23.png)

B. Update Routing (index.php)
Kita perlu memodifikasi index.php agar mengecek apakah user sudah login atau belum
sebelum membuka halaman tertentu.
###### ![Gambar 1](ss/hey24.png)

C. Membuat Modul User (Login & Logout)
Buat folder baru: module/user/.

1. File: module/user/login.php
Halaman ini berisi Form Login dan logika pemrosesan saat tombol submit ditekan.
###### ![Gambar 1](ss/hey25.png)

2. File: module/user/logout.php
File untuk menghapus session.
###### ![Gambar 1](ss/hey26.png)

D. Penyesuaian Tampilan (Header)
Kita perlu mengubah template/header.php agar menu navigasi berubah dinamis:
● Jika Belum Login: Tampilkan menu Home dan Login.
● Jika Sudah Login: Tampilkan menu Home, Artikel, dan Logout.
Update template/header.php:
###### ![Gambar 1](ss/hey27.png)

### Tugas Praktikum 14
Login. module/user/login.php berfungsi sebagai halaman dan proses autentikasi pengguna dalam aplikasi PHP modular berbasis OOP. File ini dibuat untuk pintu masuk utama bagi user untuk mengakses sistem.
###### ![Gambar 1](ss/hey29.png)

Logout berfungsi untuk mengakhiri sesi login pengguna. Ketika user memilih menu logout.
###### ![Gambar 1](ss/hey28.png)

Profile berfungsi untuk menampilkan informasi akun pengguna yang sedang login. File ini terlebih dahulu melakukan pengecekan session untuk memastikan bahwa user telah login. Jika session tidak ditemukan, user akan langsung diarahkan ke halaman login. Setelah itu, profile.php mengambil data user dari tabel users berdasarkan username yang tersimpan di session, lalu menampilkannya dalam bentuk halaman profil.
###### ![Gambar 1](ss/hey30.png)

Database tabel.
###### ![Gambar 1](ss/database.png)