<?php
session_start();
include 'config/db.php';

// KUNCI: CUMA ADMIN YANG BOLEH MASUK
if(!isset($_SESSION['role']) || $_SESSION['role']!= 'admin'){
    die('Akses Ditolak. Lu bukan admin.');
}

$id = isset($_GET['id'])? (int)$_GET['id'] : 0;
$stmt = $conn->prepare("UPDATE pengajuan SET status='disetujui' WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: dashboard.php"); // Balik ke halaman admin
exit;
?>