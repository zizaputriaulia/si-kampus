<?php error_reporting(E_ALL); ini_set('display_errors', 1); require_once 'config/db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Si-Kampus | Sistem Peminjaman Ruang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-gray-50 font-sans">
  <!-- NAVBAR -->
  <nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="index.php" class="flex items-center gap-2 hover:opacity-80">
        <i class="bi bi-building text-2xl text-blue-800"></i>
        <span class="font-bold text-lg text-gray-800">Si-Kampus</span>
      </a>
      <div class="hidden md:flex items-center gap-6 text-gray-700 font-medium">
        <a href="#fitur" class="hover:text-blue-600">Fitur</a>
        <a href="#alur" class="hover:text-blue-600">Alur</a>
        <a href="#kontak" class="hover:text-blue-600">Kontak</a>
      </div>
      <a href="auth/login.php" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 font-semibold shadow">Login</a>
    </div>
  </nav>

  <!-- HERO SECTION -->
  <section class="bg-gradient-to-br from-blue-600 to-indigo-700 text-white">
    <div class="max-w-7xl mx-auto px-6 py-24 grid md:grid-cols-2 gap-12 items-center">
      <div>
        <h2 class="text-4xl lg:text-5xl font-extrabold mb-4 leading-tight">Peminjaman Ruang Kelas, Aula & Lab <span class="text-yellow-300">Tanpa Ribet</span></h2>
        <p class="text-lg text-blue-100 mb-8">Sistem digital untuk mengajukan, memantau, dan menyetujui peminjaman fasilitas kampus secara real-time. Stop pakai kertas.</p>
        <div class="flex gap-4">
          <a href="auth/login.php" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-bold hover:bg-gray-100 transition shadow-lg">Mulai Ajukan <i class="bi bi-arrow-right"></i></a>
          <a href="#alur" class="border-2 border-white px-6 py-3 rounded-lg font-bold hover:bg-white hover:text-blue-600 transition">Lihat Cara Pakai</a>
        </div>
      </div>
      <img src="https://img.freepik.com/free-vector/booking-app-interface-template_23-2148795424.jpg?w=740&t=st=171... " alt="ilustrasi booking" class="rounded-2xl shadow-2xl hidden md:block">
    </div>
  </section>

  <!-- FITUR SECTION -->
  <section id="fitur" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
      <h3 class="text-3xl font-bold text-center mb-12">Kenapa Pakai Si-Kampus?</h3>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="p-6 border rounded-xl hover:shadow-lg transition text-center">
          <i class="bi bi-lightning-charge-fill text-5xl text-blue-600"></i>
          <h4 class="font-bold mt-4 text-lg">Cepat & Mudah</h4>
          <p class="text-sm text-gray-500 mt-2">Proses ajuan hanya butuh 1 menit. Gak perlu antre ke TU.</p>
        </div>
        <div class="p-6 border rounded-xl hover:shadow-lg transition text-center">
          <i class="bi bi-clipboard-data-fill text-5xl text-blue-600"></i>
          <h4 class="font-bold mt-4 text-lg">Status Real-Time</h4>
          <p class="text-sm text-gray-500 mt-2">Pantau status: Diajukan, Disetujui, atau Ditolak langsung di dashboard.</p>
        </div>
        <div class="p-6 border rounded-xl hover:shadow-lg transition text-center">
          <i class="bi bi-shield-lock-fill text-5xl text-blue-600"></i>
          <h4 class="font-bold mt-4 text-lg">Aman & Terdata</h4>
          <p class="text-sm text-gray-500 mt-2">Semua data tersimpan rapi di database. Anti hilang.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ALUR SECTION -->
  <section id="alur" class="py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6">
      <h3 class="text-3xl font-bold text-center mb-12">3 Langkah Mudah</h3>
      <div class="grid md:grid-cols-3 gap-8 text-center">
        <div><div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto">1</div><h4 class="font-bold mt-4">Login</h4><p class="text-sm text-gray-500">Masuk pakai username bebas + password 8 karakter.</p></div>
        <div><div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto">2</div><h4 class="font-bold mt-4">Ajukan</h4><p class="text-sm text-gray-500">Isi form: nama, NIM, ruang, tanggal, dan keperluan.</p></div>
        <div><div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto">3</div><h4 class="font-bold mt-4">Selesai</h4><p class="text-sm text-gray-500">Admin akan cek & ubah status pengajuan kamu.</p></div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer id="kontak" class="bg-gray-800 text-gray-300">
    <div class="max-w-7xl mx-auto px-6 py-10 grid md:grid-cols-3 gap-8 text-sm">
      <div><h5 class="font-bold text-white mb-3">Si-Kampus</h5><p>Sistem Informasi Peminjaman Ruang dan Mengecek Kelas Kosong.</p></div>
      <div><h5 class="font-bold text-white mb-3">Link Cepat</h5><ul class="space-y-2"><li><a href="auth/login.php" class="hover:text-white">Login</a></li><li><a href="#fitur" class="hover:text-white">Fitur</a></li></ul></div>
      <div><h5 class="font-bold text-white mb-3">Kontak</h5><p><i class="bi bi-envelope"></i> si-kampus@kampus.ac.id</p><p><i class="bi bi-geo-alt"></i> Depok, Jawa Barat</p></div>
    </div>
    <div class="border-t border-gray-700 text-center py-4 text-xs">© 2026 Si-Kampus | Dibuat untuk UAS</div>
  </footer>
</body>
</html>
