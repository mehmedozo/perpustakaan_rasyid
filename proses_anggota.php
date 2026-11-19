<?php 
/* 
Nama    : Muhammad Rasyid Ridho Al Fauzi
Kelas   : TI 2B
NPM     : 250202051

Pertemuan 10
*/


if($_SERVER["REQUEST_METHOD"] != "POST"){
    header("Location: form_anggota.php");
    exit;
}

$no_anggota = isset($_POST["no_anggota"]) ? trim ($_POST["no_anggota"]): "";
$nama = isset($_POST["nama"]) ? trim ($_POST["nama"]): "";
$email = isset($_POST["email"]) ? trim ($_POST["email"]): "";
$no_hp = isset($_POST["no_hp"]) ? trim ($_POST["no_hp"]): "";
$jenis_anggota = isset($_POST["jenis_anggota"]) ? trim($_POST["jenis_anggota"]): "";
$alamat = isset($_POST["alamat"]) ? trim($_POST["alamat"]): "";

$daftar_jenis = array("mahasiswa", "dosen", "tenaga_kependidikan");
$errors = array();

if(empty($no_anggota)){
    $errors [] = "Nomor anggota tidak boleh kosong ";
}elseif(!ctype_digit($no_anggota)){
    $errors [] = "Nomor anggota hanya boleh berisi angka ";
}elseif(strlen($no_anggota) > 15){
    $errors [] = "Nomor anggota maksimal 15 digit ";
}

if(empty($nama)){
    $errors [] = "Nama lengkap tidak boleh kosong ";
}elseif(strlen($nama) > 100){
    $errors [] = "Nama lengkap maksimal 100 karakter ";
}

if(empty($email)){
    $errors [] = "Email tidak boleh kosong ";
}elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
    $errors [] = "Format email tidak valid ";
}elseif(strlen($email) > 100){
    $errors [] = "Email maksimal 100 karakter ";
}


if(empty($no_hp)){
    $errors [] = "Nomor HP tidak boleh kosong ";
}elseif(!ctype_digit($no_hp)){
    $errors [] = "Nomor HP hanya boleh berisi angka ";
}elseif(strlen($no_hp) < 10 || strlen($no_hp) > 13){
    $errors [] = "Nomor HP harus berjumlah antara 10 sampai 13 digit ";
}

if(empty($jenis_anggota)){
    $errors [] = "Jenis anggota wajib dipilih ";
}elseif(!in_array($jenis_anggota, $daftar_jenis, true)){
    $errors [] = "Jenis anggota tidak valid ";
}

if(empty($alamat)){
    $errors [] = "Alamat tidak boleh kosong ";
}

$berhasil = false;
$pesan_db = "";

if(empty($errors)){
    require_once "koneksi.php";

    $sql = "INSERT INTO anggota 
                (no_anggota, nama_lengkap, email, no_hp, jenis_anggota, alamat)
                VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $no_anggota, $nama, $email, $no_hp, $jenis_anggota, $alamat);
    mysqli_stmt_execute($stmt);
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran Anggota</title>
</head>
<body>
    <?php if(!empty($errors)) {?>
        <h1>Data Tidak Valid</h1>
        <p class="eror">Data tidak dapat disimpan. Perbaiki kesalahan:</p>
        <ul>
            <?php foreach ($errors as $pesan) {?>
                <li><?php echo htmlspecialchars($pesan); ?></li>
            <?php } ?>
        </ul>

    <?php }else { ?>
        <h1>Data Gagal Disimpan</h1>
        <p class="eror">Terjadi kesalahan saat menyimpan data ke database</p>
        <p>Pesan dari MYSQL: <?php echo htmlspecialchars($pesan_db); ?></p>
    <?php } ?>
    <p><a href="javascript:history.back()">Kembali dan Perbaiki data</a></p>
</body>
</html>