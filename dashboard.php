<?php 
include 'includes/header.php'; 
include 'config/db.php';

$result = $conn->query("SELECT * FROM peminjaman ORDER BY id DESC");
$total = $conn->query("SELECT COUNT(*) as jml FROM peminjaman")->fetch_assoc()['jml'];
$disetujui = $conn->query("SELECT COUNT(*) as jml FROM peminjaman WHERE status='Disetujui'")->fetch_assoc()['jml'];
$menunggu = $conn->query("SELECT COUNT(*) as jml FROM peminjaman WHERE status='Diajukan'")->fetch_assoc()['jml'];
$warna = ['Diajukan'=>'bg-yellow-100 text-yellow-800','Disetujui'=>'bg-green-100 text-green-800','Ditolak'=>'bg-red-100 text-red-800'];
?>

<div class="flex justify-between items-center mb-6">
  <div><h1 class="text-3xl font-bold">Dashboard Peminjaman</h1><p class="text-gray-500">Kelola semua pengajuan ruang</p></div>
  <a href="tambah.php" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700"><i class="bi bi-plus-lg"></i> Ajukan Baru</a>
</div>

<div class="grid md:grid-cols-3 gap-6 mb-6">
  <div class="bg-white p-5 rounded-xl shadow border-l-4 border-blue-500"><p class="text-gray-500 text-sm">Total Pengajuan</p><p class="text-3xl font-bold"><?= $total?></p></div>
  <div class="bg-white p-5 rounded-xl shadow border-l-4 border-green-500"><p class="text-gray-500 text-sm">Disetujui</p><p class="text-3xl font-bold text-green-600"><?= $disetujui?></p></div>
  <div class="bg-white p-5 rounded-xl shadow border-l-4 border-yellow-500"><p class="text-gray-500 text-sm">Menunggu</p><p class="text-3xl font-bold text-yellow-600"><?= $menunggu?></p></div>
</div>

<div class="bg-white rounded-xl shadow overflow-x-auto">
<table class="w-full text-sm">
  <thead class="bg-gray-50"><tr><th class="p-4 text-left">Nama</th><th>NIM</th><th>Ruang</th><th>Jadwal</th><th>Status</th><th class="text-center">Aksi</th></tr></thead>
  <tbody>
  <?php if($result->num_rows == 0):?><tr><td colspan="6" class="text-center p-10 text-gray-500">Belum ada data. Klik 'Ajukan Baru'.</td></tr>
  <?php else: while($row = $result->fetch_assoc()):?>
  <tr class="border-t hover:bg-gray-50">
    <td class="p-4 font-semibold"><?= htmlspecialchars($row['nama_peminjam'])?></td>
    <td><?= htmlspecialchars($row['nim'])?></td>
    <td><span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs"><?= htmlspecialchars($row['nama_ruang'])?></span></td>
    <td><?= date('d M Y', strtotime($row['tanggal_pinjam']))?><br><span class="text-xs text-gray-500"><?= substr($row['jam_mulai'],0,5)?> - <?= substr($row['jam_selesai'],0,5)?></span></td>
    <td><span class="px-3 py-1 rounded-full text-xs font-semibold <?= $warna[$row['status']]?>"><?= $row['status']?></span></td>
    <td class="text-center space-x-3">
    <?php if ($row['status'] == 'Disetujui'): ?>
        <a href='bukti.php?id=<?= $row['id'] ?>' target='_blank' class='bg-green-600 text-white px-3 py-1 rounded-lg text-xs font-semibold'>Lihat Bukti</a>
    <?php else: ?>
        <a href='edit.php?id=<?= $row['id'] ?>' class='text-blue-600 text-xs hover:underline'>Edit</a>
        <a href='hapus.php?id=<?= $row['id'] ?>' class='text-red-600 text-xs hover:underline' onclick="return confirm('Yakin hapus?')">Hapus</a>
        <span class='<?= $warna[$row['status']] ?> px-2 py-1 rounded-full text-xs'><?= $row['status'] ?></span>
<?php endif; ?>
</td>
  </tr>
  <?php endwhile; endif;?>
  </tbody>
</table>
</div>

<?php include 'includes/footer.php'; ?>