<?php
include '../config/db.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=barang.xls");

$sql = "SELECT barang.*, kategori.nama_kategori 
        FROM barang 
        JOIN kategori ON barang.id_kategori = kategori.id_kategori";
$result = $conn->query($sql);

echo "ID\tNama\tKategori\tStok\tHarga\tTanggal\n";
while ($row = $result->fetch_assoc()) {
    echo "{$row['id_barang']}\t{$row['nama_barang']}\t{$row['nama_kategori']}\t{$row['jumlah_stok']}\t{$row['harga_barang']}\t{$row['tanggal_masuk']}\n";
}
