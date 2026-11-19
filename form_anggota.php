<?php 
/*
Nama    : Muhammad Rasyid Ridho Al Fauzi
Kelas   : TI 2B
NPM     : 250202051

Pertemuan 10
*/
$status = isset($_GET["status"]) ? $_GET["status"] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Anggota Perpustkaan</title>
    <style>
        body{ font-family: sans-serif; margin: 40px; }
        h1 { color: #1f3864; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        label.pilihan { display: inline; font-weight: normal; margin-right: 16px; }
        input[type="text"], input[type="email"], select, textarea { width: 340px; padding: 6px; }
        button { margin-top: 16px; padding: 8px 20px; }
        .sukses { background-color: #00ff00; border-left: 5px solid #32cd32; padding: 10px; }
    </style>
</head>
<body>
    <h1>Pendaftaran Anggota Perpustakaan</h1>
    <?php if($status === "sukses") { ?>
        <p class="sukses">Data Pendaftaran berhasil disimpan</p>
    <?php } ?>
    <form action="proses_anggota.php" method="post">
        <label for="no_anggota">Nomor Anggota</label>
        <input type="text" id="no_anggota" name="no_anggota">

        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama">

        <label for="email">Email</label>
        <input type="email" id="email" name="email">

        <label for="no_hp">Nomor HP</label>
        <input type="text" id="no_hp" name="no_hp">

        <label for="jenis_anggota">Pilih Jenis Anggota</label>
        <select name="jenis_anggota" id="jenis_anggota">
            <option value="">--Pilih Jenis Anggota--</option>
            <option value="mahasiswa">Mahasiswa</option>
            <option value="dosen">Dosen</option>
            <option value="tenaga_kependidikan">Tenaga Kependidikan</option>
        </select>

        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat"></textarea><br>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>