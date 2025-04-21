<?php
include '../config/db.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM barang WHERE id_barang = $id")->fetch_assoc();
$kategori = $conn->query("SELECT * FROM kategori");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama_barang'];
  $kategori_id = $_POST['id_kategori'];
  $stok = $_POST['jumlah_stok'];
  $harga = $_POST['harga_barang'];
  $tanggal = $_POST['tanggal_masuk'];

  if (!empty($nama) && is_numeric($stok) && $stok >= 0 && is_numeric($harga) && $harga >= 0) {
    $conn->query("UPDATE barang SET 
                        nama_barang='$nama', 
                        id_kategori='$kategori_id', 
                        jumlah_stok='$stok', 
                        harga_barang='$harga', 
                        tanggal_masuk='$tanggal'
                      WHERE id_barang=$id");
    $_SESSION['success'] = "Data barang berhasil diupdate!";
    header("Location: index.php");
    exit;
  } else {
    echo "<script>alert('Input tidak valid! Jumlah stok dan harga tidak boleh negatif.');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Inventaris - Edit Barang</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body class="p-3">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Edit Barang</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Barang</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <h3>Edit Barang</h3>
    <form method="post">
      <div class="mb-3">
        <label for="nama_barang">Nama Barang</label>
        <input
          type="text"
          name="nama_barang"
          class="form-control"
          value="<?= $data['nama_barang'] ?>"
          required />
      </div>
      <div class="mb-3">
        <label for="kategori_barang">Kategori Barang</label>
        <select name="id_kategori" class="form-control">
          <?php while ($k = $kategori->fetch_assoc()) : ?>
            <option value="<?= $k['id_kategori'] ?>" <?= ($data['id_kategori'] == $k['id_kategori']) ? 'selected' : '' ?>>
              <?= $k['nama_kategori'] ?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="jumlah_stok">Jumlah Stok</label>
        <input
          type="number"
          name="jumlah_stok"
          value="<?= $data['jumlah_stok'] ?>"
          class="form-control"

          required />
      </div>
      <div class="mb-3">
        <label for="harga_barang">Harga Barang</label>
        <input
          type="number"
          name="harga_barang"
          class="form-control"
          value="<?= $data['harga_barang'] ?>"
          required />
      </div>
      <div class="mb-3">
        <label for="tanggal_masuk">Tanggal Masuk</label>
        <input
          type="date"
          name="tanggal_masuk"
          class="form-control"
          value="<?= $data['tanggal_masuk'] ?>"
          required />
      </div>
      <button class="btn btn-primary">Update</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
  <sxcript
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></sxcript>
</body>

</html>