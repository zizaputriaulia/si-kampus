<?php 
include 'includes/header.php'; 
include 'config/db.php'; 

$id=$_GET['id'];
$stmt=$conn->prepare("SELECT * FROM peminjaman WHERE id=?"); 
$stmt->bind_param("i",$id); 
$stmt->execute(); 
$data=$stmt->get_result()->fetch_assoc();

if($_POST){ 
  $stmt=$conn->prepare("UPDATE peminjaman SET nama_peminjam=?,nim=?,nama_ruang=?,tanggal_pinjam=?,jam_mulai=?,jam_selesai=?,keperluan=?,status=? WHERE id=?");
  $stmt->bind_param("ssssssssi",$_POST['nama'],$_POST['nim'],$_POST['ruang'],$_POST['tanggal'],$_POST['mulai'],$_POST['selesai'],$_POST['keperluan'],$_POST['status'],$id); 
  if($stmt->execute()) header("Location: dashboard.php"); 
}
?>

<a href="dashboard.php" class="text-blue-600 mb-4 inline-block hover:underline"><i class="bi bi-arrow-left"></i> Kembali ke Dashboard</a>
<form method="POST" id="crudForm" class="bg-white p-8 rounded-xl shadow space-y-4">
  <h1 class="text-2xl font-bold">Edit Data Peminjaman</h1>
  <div class="grid md:grid-cols-2 gap-4">
    <div><label class="font-semibold text-sm">Nama Peminjam</label><input name="nama" value="<?= htmlspecialchars($data['nama_peminjam'])?>" required class="w-full border p-2 rounded mt-1 focus:ring-2 focus:ring-blue-400"></div>
    <div><label class="font-semibold text-sm">NIM</label><input name="nim" value="<?= htmlspecialchars($data['nim'])?>" required class="w-full border p-2 rounded mt-1 focus:ring-2 focus:ring-blue-400"></div>
    <div class="md:col-span-2"><label class="font-semibold text-sm">Nama Ruang</label><input name="ruang" value="<?= htmlspecialchars($data['nama_ruang'])?>" required class="w-full border p-2 rounded mt-1 focus:ring-2 focus:ring-blue-400"></div>
    <div><label class="font-semibold text-sm">Tanggal</label><input type="date" name="tanggal" value="<?= $data['tanggal_pinjam']?>" required class="w-full border p-2 rounded mt-1 focus:ring-2 focus:ring-blue-400"></div>
    <div class="grid grid-cols-2 gap-2"><div><label class="font-semibold text-sm">Mulai</label><input type="time" name="mulai" value="<?= $data['jam_mulai']?>" required class="w-full border p-2 rounded mt-1 focus:ring-2 focus:ring-blue-400"></div><div><label class="font-semibold text-sm">Selesai</label><input type="time" name="selesai" value="<?= $data['jam_selesai']?>" required class="w-full border p-2 rounded mt-1 focus:ring-2 focus:ring-blue-400"></div></div>
    <div class="md:col-span-2"><label class="font-semibold text-sm">Keperluan</label><textarea name="keperluan" rows="3" class="w-full border p-2 rounded mt-1 focus:ring-2 focus:ring-blue-400"><?= htmlspecialchars($data['keperluan'])?></textarea></div>
    <div class="md:col-span-2"><label class="font-semibold text-sm">Status</label><select name="status" class="w-full border p-2 rounded mt-1 focus:ring-2 focus:ring-blue-400"><option <?= $data['status']=='Diajukan'?'selected':''?>>Diajukan</option><option <?= $data['status']=='Disetujui'?'selected':''?>>Disetujui</option><option <?= $data['status']=='Ditolak'?'selected':''?>>Ditolak</option></select></div>
  </div>
  <button class="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700">Update Data</button>
</form>

<?php include 'includes/footer.php'; ?>
