<?php
session_start();
include 'config/db.php';
$id = isset($_GET['id'])? (int)$_GET['id'] : 0;

// GANTI 1: pengajuan -> peminjaman
$stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id =?"); 
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

// GANTI 2: status nya 'Disetujui' huruf gede + nama kolom
if(!$data || $data['status']!= 'Disetujui'){ die('<h2 style="text-align:center; color:red;">Akses Ditolak. Data belum disetujui.</h2>'); }
?>
<!DOCTYPE html><html><head><title>Bukti #<?=$data['id']?></title><style>body{font-family:Arial;margin:40px;border:2px solid #000;padding:20px;}.header{text-align:center;border-bottom:2px solid #000;}.stempel{border:3px dashed green;color:green;padding:15px;display:inline-block;transform:rotate(-10deg);font-size:24px;font-weight:bold;margin:20px 0;}table{width:100%;margin-top:20px;}td{padding:8px;}</style></head><body>
<div class="header"><h2>BUKTI PEMINJAMAN SI-KAMPUS</h2></div>
<div style="text-align:center;"><div class="stempel">✅ DISETUJUI</div></div>
<table>
    <tr><td><b>No. Peminjaman</b></td><td>: #<?=$data['id']?></td></tr>
    <tr><td><b>Nama Peminjam</b></td><td>: <?=htmlspecialchars($data['nama_peminjam'])?></td></tr> 
    <tr><td><b>NIM</b></td><td>: <?=htmlspecialchars($data['nim'])?></td></tr> 
    <tr><td><b>Ruang</b></td><td>: <?=htmlspecialchars($data['nama_ruang'])?></td></tr>
    <tr><td><b>Jam</b></td><td>: <?= $data['jam_mulai'] ?> - <?= $data['jam_selesai'] ?></td></tr>
    <tr><td><b>Keperluan</b></td><td>: <?=htmlspecialchars($data['keperluan'])?></td></tr>
    <tr><td><b>Tanggal Cetak</b></td><td>: <?=date('d F Y')?></td></tr>
</table>
<p style="margin-top:40px;text-align:center;"><i>Tunjukkan halaman ini kepada Petugas.</i></p></body></html>