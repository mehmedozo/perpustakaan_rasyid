<?php 
require_once "koneksi.php";

$sql = "SELECT * FROM anggota ORDER BY id DESC ";

$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Data</title>
</head>
    <style>
        
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #1f3864; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        label.pilihan { display: inline; font-weight: normal; margin-right: 16px; }
        input[type="text"], select, textarea { width: 320px; padding: 6px; }
        button { margin-top: 16px; padding: 8px 20px; }
        .error { display: block; color: #c0392b; font-size: 14px; }
        .sukses { background: #e6f4ea; border-left: 5px solid #2e7d32; padding: 10px; }
        table { border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #999; padding: 8px 14px; text-align: left; }
        th { background: #e9eef8; }
    
    </style>
<body>
    <h1>Data Anggota Perpustakaan</h1>
    <table border="1" cellpadding="8">
        <tr>
            <th>No Anggota</th><th>Nama Lengkap</th><th>Email</th><th>No HP</th><th>Jenis Anggota</th><th>Alamat</th><th>Aksi</th>
        </tr>
        <?php $no = 1; while($baris = mysqli_fetch_assoc($hasil)) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($baris["no_anggota"]); ?></td>
            <td><?php echo htmlspecialchars($baris["nama_lengkap"]) ?></td>
            <td><?php echo htmlspecialchars($baris["email"]) ?></td>
            <td><?php echo htmlspecialchars($baris["jenis_anggota"]) ?></td>
            <td><?php echo htmlspecialchars($baris["alamat"]) ?></td>
            
            <td>
                <a href="detail.php?id=<?php echo (int) $baris["id"]; ?>">Detail</a>
                <form action="hapus.php" class="inline" method="post" onsubmit = "return confirm('Yakin ingin menghapus data ini ?'); ">
                <input type="hidden" name="id" value="<?php echo (int) $baris["id"]; ?>">
                <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>