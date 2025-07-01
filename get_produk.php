<?php
$conn = new mysqli("localhost", "root", "", "produkdb");

$sql = "SELECT * FROM produk ORDER BY id DESC";
$result = $conn->query($sql);

$data = array();

while($row = $result->fetch_assoc()) {
    $row['gambar_url'] = "http://10.0.2.2/produk_api/uploads/" . $row['gambar'];
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>
