<?php
include '../config/db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM kategori WHERE id_kategori = $id");
header("Location: index.php");
$_SESSION['success'] = "Data kategori berhasil dihapus!";
header("Location: index.php");