<?php
$host = "localhost";
$user = "root"; // ganti sesuai host
$pass = "";     // ganti sesuai password MySQL
$db   = "produkdb";

$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $folder = "uploads/";

    if (move_uploaded_file($tmp, $folder . $gambar)) {
        $sql = "INSERT INTO produk (nama_produk, deskripsi, gambar) VALUES ('$nama_produk', '$deskripsi', '$gambar')";
        if ($conn->query($sql)) {
            echo "Sukses";
        } else {
            echo "Gagal simpan ke database";
        }
    } else {
        echo "Gagal upload gambar";
    }
}
?>
