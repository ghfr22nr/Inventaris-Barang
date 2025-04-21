<?php
require_once '../vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

include '../config/db.php';

// Ambil data barang
$sql = "SELECT barang.*, kategori.nama_kategori 
        FROM barang 
        JOIN kategori ON barang.id_kategori = kategori.id_kategori";
$result = $conn->query($sql);

// HTML untuk ditampilkan sebagai isi PDF
$html = '<h3 style="text-align:center;">Laporan Data Barang</h3>';
$html .= '<table border="1" cellpadding="6" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th><th>Nama</th><th>Kategori</th><th>Stok</th><th>Harga</th><th>Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>';

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>' . $row['id_barang'] . '</td>
                <td>' . $row['nama_barang'] . '</td>
                <td>' . $row['nama_kategori'] . '</td>
                <td>' . $row['jumlah_stok'] . '</td>
                <td>' . number_format($row['harga_barang'], 0, ',', '.') . '</td>
                <td>' . $row['tanggal_masuk'] . '</td>
              </tr>';
}

$html .= '</tbody></table>';

// Inisialisasi dan render PDF
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

// Output PDF ke browser
$dompdf->stream("laporan_barang.pdf", array("Attachment" => false));
exit;
