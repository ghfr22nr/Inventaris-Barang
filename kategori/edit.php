<?php
include '../config/db.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM kategori WHERE id_kategori = $id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama_kategori'];
  if (!empty($nama)) {
    $conn->query("UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori=$id");
    header("Location: index.php");
  } else {
    echo "<script>alert('Nama kategori tidak boleh kosong');</script>";
  }
  $_SESSION['success'] = "Data kategori berhasil diupdate!";
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Inventaris - Edit Kategori</title>
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
      <a class="navbar-brand" href="#">Edit Kategori</a>
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
            <a
              class="nav-link active"
              aria-current="page"
              href="index.php">Kategori</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <h3>Edit Kategori</h3>
    <form method="post">
      <div class="mb-3">
        <label for="nama_kategori">Nama Kategori</label>
        <input
          type="text"
          name="nama_kategori"
          class="form-control"
          value="<?= $data['nama_kategori'] ?>"
          required />
      </div>
      <button class="btn btn-success">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
  <sxcript
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></sxcript>
</body>

</html>