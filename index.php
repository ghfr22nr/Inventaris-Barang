<?php
include 'config/db.php';

$search = $_GET['search'] ?? '';
$filter = $_GET['filter'] ?? '';

// Query ambil data barang
$sql = "SELECT barang.*, kategori.nama_kategori 
        FROM barang 
        JOIN kategori ON barang.id_kategori = kategori.id_kategori
        WHERE nama_barang LIKE '%$search%'";

if ($filter) {
  $sql .= " AND barang.id_kategori = $filter";
}

$result = $conn->query($sql);
$kategori_result = $conn->query("SELECT * FROM kategori");

$resultt = $conn->query("SELECT * FROM kategori");


$limit = 5; // jumlah data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Hitung total data
$countQuery = "SELECT COUNT(*) as total FROM barang WHERE nama_barang LIKE '%$search%'";
if ($filter) $countQuery .= " AND id_kategori = $filter";
$totalResult = $conn->query($countQuery)->fetch_assoc();
$totalData = $totalResult['total'];
$totalPage = ceil($totalData / $limit);

// Query utama dengan LIMIT
$sql = "SELECT barang.*, kategori.nama_kategori 
        FROM barang 
        JOIN kategori ON barang.id_kategori = kategori.id_kategori
        WHERE nama_barang LIKE '%$search%'";

if ($filter) $sql .= " AND barang.id_kategori = $filter";

$sql .= " LIMIT $start, $limit";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Inventaris</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body class="p-3">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Manajemen Inventaris</a>
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
              class="nav-link"
              aria-current="page"
              href="barang/index.php">Barang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kategori/index.php">Kategori</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <h3>Data Barang</h3>
    <form method="get" class="row g-3 mb-3">
      <div class="col-md-6">
        <input
          type="search"
          name="search"
          class="form-control"
          placeholder="Cari nama barang..." />
      </div>
      <div class="col-md-3">
        <select name="filter" class="form-control">
          <option value="">-- Filter Kategori --</option>
          <?php while ($kat = $kategori_result->fetch_assoc()) : ?>
            <option value="<?= $kat['id_kategori'] ?>" <?= ($filter == $kat['id_kategori']) ? 'selected' : '' ?>>
              <?= $kat['nama_kategori'] ?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="col-md-3">
        <button class="btn btn-primary">Cari</button>
      </div>
    </form>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Barang</th>
          <th>Kategori Barang</th>
          <th>Jumlah Stok</th>
          <th>Harga Barang</th>
          <th>Tanggal Waktu</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
          <tr>
            <td><?= $row['id_barang'] ?></td>
            <td><?= $row['nama_barang'] ?></td>
            <td><?= $row['nama_kategori'] ?></td>
            <td><?= $row['jumlah_stok'] ?></td>
            <td>Rp<?= number_format($row['harga_barang'], 0, ',', '.') ?></td>
            <td><?= $row['tanggal_masuk'] ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <nav>
      <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
          <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>&search=<?= $search ?>&filter=<?= $filter ?>"><?= $i ?></a>
          </li>

        <?php endfor; ?>
      </ul>
    </nav>
    <h3>Data Kategori</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Kategori</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $resultt->fetch_assoc()) : ?>
          <tr>
            <td><?= $row['id_kategori'] ?></td>
            <td><?= $row['nama_kategori'] ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <sxcript
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></sxcript>
</body>

</html>