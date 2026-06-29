<?php
include 'config/db.php'; // Pastiin path db.php lu bener

$username = 'admin';
$password_plain = 'AdminUAS123'; // Ganti password di sini
$role = 'admin';

$password_hash = password_hash($password_plain, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password_hash, $role);

if ($stmt->execute()) {
    echo "<h2 style='color:green;'>✅ BERHASIL!</h2> Username: <b>$username</b> <br> Password: <b>$password_plain</b> <br><br> SEKARANG HAPUS FILE INI SEGERA!";
} else {
    echo "❌ GAGAL: " . $conn->error . "<br> Kalo 'Duplicate entry' berarti adminnya udah ada.";
}
?>