<?php
include '../config/db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM barang WHERE id_barang = $id");
header("Location: index.php");
$_SESSION['success'] = "Data barang berhasil ditambahkan!";
header("Location: index.php");
