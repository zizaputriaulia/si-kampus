<?php 
session_start(); 
if(!isset($_SESSION['login'])){ header("Location: auth/login.php"); exit; } 
?>
<!DOCTYPE html><html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Si-Kampus</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head><body class="bg-gray-100">
<nav class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
    <a href="../dashboard.php" class="flex items-center gap-2"><i class="bi bi-building-fill-gear text-2xl text-blue-600"></i><span class="text-xl font-bold text-gray-800">Si-Kampus</span></a>
    <div class="flex items-center gap-4">
      <a href="dashboard.php" class="text-gray=700 hover:text-blue-600 font-medium">Dashboard</a>
      <a href="cek_kelas.php" class="bg-green-500 text-white px-3 py-1.5 rounded-md hover:bg-green-600 text-sm font-medium">
        Cek kelas
      </a>
      <span class="text-sm text-gray-600">Halo, <b><?= htmlspecialchars($_SESSION['nama'])?></b></span>
      <a href="auth/logout.php" class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-red-600"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
  </div>
</nav>
<main class="max-w-7xl mx-auto p-6">