<?php 
/* 
Nama    : Muhammad Rasyid Ridho Al Fauzi
Kelas   : TI 2B
NPM     : 250202051

Pertemuan 10
*/

require_once "koneksi.php";
$server = mysqli_get_server_info($koneksi);
mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi Database Perpustakaan</title>
</head>
<body>
    <h1>Uji Koneksi Database</h1>
    <p class="ok">Koneksi ke MYSQL berhasil</p>
    <ul>
        <li>Host : <?php echo htmlspecialchars($host); ?></li>
        <li>Database : <?php echo htmlspecialchars($database); ?></li>
        <li>Versi Server : <?php echo htmlspecialchars($server); ?></li>
    </ul>
</body>
</html>
