<?php
include '../config/db.php';

$result = $conn->query("SELECT * FROM kategori");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Inventaris - Kategori</title>
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
      <a class="navbar-brand" href="#">Kategori Barang</a>
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
            <a class="nav-link" href="../barang/index.php">Barang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Kategori</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <h3>Data Kategori</h3>
    <form action="" class="row g-3 mb-3">
      <div class="col">
        <a href="tambah.php" class="btn btn-success">+ Tambah Kategori</a>
      </div>
    </form>
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="alert alert-success">
        <?= $_SESSION['success'];
        unset($_SESSION['success']); ?>
      </div>
    <?php endif; ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Kategori</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
          <tr>
            <td><?= $row['id_kategori'] ?></td>
            <td><?= $row['nama_kategori'] ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id_kategori'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="hapus.php?id=<?= $row['id_kategori'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori?')">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <nav>
      <a href="../index.php" class="btn btn-outline-secondary">Kembali</a>
      <button disabled="disabled" class="btn btn-outline-success">
        Export Excel
      </button>
      <button disabled="disabled" class="btn btn-outline-danger">
        Export PDF
      </button>
    </nav>
  </div>
  <sxcript
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></sxcript>
</body>

</html>