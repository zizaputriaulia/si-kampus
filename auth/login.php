<?php
session_start();
if(isset($_SESSION['login'])){ header("Location:../dashboard.php"); exit; }

$error = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $u = trim($_POST['username']);
  $p = $_POST['password'];
  if($u == ''){ $error = "Username jangan kosong!"; }
  elseif(strlen($p) < 8){ $error = "Password minimal 8 karakter!"; }
  else {
    $_SESSION['login'] = true;
    $_SESSION['nama'] = $u;
    $_SESSION['role'] = 'admin'; // Auto admin biar CRUD bebas
    header("Location:../dashboard.php"); exit;
  }
}
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Login Si-Kampus</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"></head>
<body class="bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center min-h-screen p-4">
<div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md">
  <div class="text-center mb-6"><i class="bi bi-building-fill-gear text-5xl text-blue-600"></i>
    <h1 class="text-3xl font-extrabold mt-2">Si-Kampus</h1><p class="text-gray-500">Sistem Peminjaman Ruang</p>
  </div>
  <?php if($error):?><div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm flex items-center gap-2"><i class="bi bi-exclamation-circle-fill"></i><?= $error?></div><?php endif;?>
  <form method="POST" class="space-y-4">
    <input name="username" placeholder="Username Bebas" required class="w-full border-2 p-3 rounded-xl focus:ring-2 focus:ring-blue-400">
    <input type="password" name="password" placeholder="Password Min. 8 Karakter" required class="w-full border-2 p-3 rounded-xl focus:ring-2 focus:ring-blue-400">
    <button class="w-full bg-blue-600 text-white p-3 rounded-xl font-bold hover:bg-blue-700">LOGIN</button>
  </form>
  <p class="text-xs text-center text-gray-500 mt-4">Demo: admin / 12345678</p>
</div></body></html>