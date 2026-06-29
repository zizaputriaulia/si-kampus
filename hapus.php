<?php 
session_start(); 
if(!isset($_SESSION['login'])){ header("Location: auth/login.php"); exit; } 
include 'config/db.php';

// Cek id nya ada apa nggak
if(isset($_GET['id']) && is_numeric($_GET['id'])){
  $id = $_GET['id'];
  
  // Pake Prepared Statement biar aman
  $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->close();
}

header("Location: dashboard.php"); 
exit;
?>