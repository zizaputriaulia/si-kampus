# Si-Kampus - Sistem Informasi Peminjaman Ruang Kelas Online

Si-Kampus adalah aplikasi manajemen dan peminjaman fasilitas ruangan (kelas, aula, dan laboratorium) berbasis web yang dirancang untuk memodernisasi administrasi internal kampus. Aplikasi ini memungkinkan mahasiswa memantau status ketersediaan ruang secara real-time dan mengajukan peminjaman secara digital hingga diterbitkannya lembar bukti online yang sah.

Sistem ini dikembangkan secara publik dan dapat diakses melalui tautan resmi: [aziza.shieldteam.asia](http://aziza.shieldteam.asia)


👥 Anggota Kelompok / Kontributor
Proyek ini dikembangkan oleh Kelompok Mata Kuliah Pemrograman Berbasis Web (Semester 4):

1. Aziza Putri Aulia (NIM: 2413090001) - Lead Developer (Database Architecture, Core Backend PHP, Integration & Deployment)
2. Naurah Qurrati A'yun (NIM: 2410090031) - System Analyst (Business Process Design, System Architecture Diagram & Documentation)
3. Alysa Fisichella Kurniawan (NIM: 2410090021) - Frontend UI/UX Designer (Interface Layout, Bootstrap Components & Modular Assets)
4. Zahra Balqis Syahrani (NIM: 2414090011 ) - Frontend UI/UX Designer (Interface Layout, Bootstrap Components & Modular Assets


🛠️ Teknologi yang Digunakan
- Frontend: HTML5, CSS3, JavaScript
- Backend: PHP Native (Versi 8.x)
- Database: MySQL
- Server Lokal: XAMPP v3.3 (Apache & MySQL)


📂 Struktur Direktori Proyek
```text
/SI_KAMPUS
├── /assets              --> Berkas skrip pendukung tampilan frontend (CSS/JS)
├── /auth                --> Modul penanganan sesi otentikasi login dan logout
├── /config              --> Konfigurasi parameter koneksi basis data MySQL
├── /includes            --> Komponen kerangka tata letak antarmuka (Header & Footer)
├── .gitignore           --> Berkas konfigurasi untuk mengecualikan berkas lokal/sensitif
├── bukti.php            --> Visualisasi lembar Bukti Peminjaman Online untuk pengguna
├── cek_kelas.php        --> Antarmuka pemantauan status ketersediaan ruang kelas
├── dashboard.php        --> Halaman kendali utama setelah otentikasi berhasil
├── index.php            --> Landing page utama sistem saat pertama diakses
├── si_kampus.sql        --> Berkas hasil ekspor database untuk migrasi mandiri
└── tambah.php           --> Skrip logika pemrosesan input transaksi baru


