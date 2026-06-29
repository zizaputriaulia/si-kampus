<?php 
include 'includes/header.php'; 
include 'config/db.php'; 

// AMBIL INPUT DARI FORM
$tanggal_pilih = $_POST['tanggal'] ?? date('Y-m-d');
$jam_pilih = $_POST['jam'] ?? '08:00';
$jam_pilih_full = $jam_pilih . ':00';

// 1. AMBIL SEMUA RUANG DARI DB, URUT DARI R.410 KE R.101
$sql_semua_ruang = "SELECT * FROM ruang_kelas ORDER BY nama_ruang DESC";
$all_ruang = $conn->query($sql_semua_ruang);

// 2. CARI RUANG YANG STATUSNYA 'DISETUJUI' DI TANGGAL + JAM TERSEBUT
$sql_kepake = "SELECT nama_ruang FROM peminjaman 
               WHERE tanggal_pinjam = '$tanggal_pilih'
               AND status = 'Disetujui' 
               AND '$jam_pilih_full' >= jam_mulai 
               AND '$jam_pilih_full' < jam_selesai";
$result_kepake = $conn->query($sql_kepake);

$ruang_kepake_nama = []; // Bikin array kosong dulu
while($row = $result_kepake->fetch_assoc()){
    $ruang_kepake_nama[] = $row['nama_ruang']; // Masukin nama ruang yg kepake ke array
}
?>

<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-1">Denah Ketersediaan Ruang</h1>
    <p class="text-gray-500 mb-6">Ijo = Kosong, Merah = Kepake</p>

    <!-- FORM FILTER -->
    <form method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end mb-6 border-b pb-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
            <input type="date" name="tanggal" value="<?= $tanggal_pilih ?>" class="border p-2 rounded-lg w-full">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jam Cek</label>
            <input type="time" name="jam" value="<?= $jam_pilih ?>" class="border p-2 rounded-lg w-full">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold w-full hover:bg-blue-700">Cek Sekarang</button>
    </form>

    <!-- LEGENDA WARNA -->
    <div class="flex gap-6 mb-4">
        <div class="flex items-center gap-2"><div class="w-5 h-5 bg-green-400 rounded-md"></div> <span>Kosong</span></div>
        <div class="flex items-center gap-2"><div class="w-5 h-5 bg-red-500 rounded-md"></div> <span>Kepake</span></div>
    </div>

    <!-- GRID DENAH KELAS -->
    <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-10 gap-3">
        <?php if($all_ruang->num_rows > 0): ?>
            <?php while($ruang = $all_ruang->fetch_assoc()): 
                $is_kepake = in_array($ruang['nama_ruang'], $ruang_kepake_nama);
                $warna = $is_kepake ? 'bg-red-500 text-white cursor-not-allowed' : 'bg-green-400 text-black hover:bg-green-500 cursor-pointer';
            ?>
            <div class="p-3 rounded-lg shadow-md text-center font-bold transition transform hover:scale-105 <?= $warna ?>">
                <?= htmlspecialchars($ruang['nama_ruang']) ?>
                <p class="text-xs font-normal"><?= $ruang['kapasitas'] ?> org</p>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="col-span-full text-center text-red-500">Data ruang kelas kosong.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>