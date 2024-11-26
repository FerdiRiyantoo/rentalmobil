<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_mobil = $_POST['id_mobil'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

    $query_mobil = "SELECT harga_sewa FROM mobil WHERE id = $id_mobil";
    $result_mobil = $koneksi->query($query_mobil);
    $mobil = $result_mobil->fetch_assoc();
    
    $lama_sewa = (strtotime($tanggal_selesai) - strtotime($tanggal_mulai)) / (60 * 60 * 24);
    $total_biaya = $mobil['harga_sewa'] * $lama_sewa;

    $query_pelanggan = "INSERT INTO pelanggan (nama, email, telepon) VALUES ('$nama', '$email', '$telepon')";
    $koneksi->query($query_pelanggan);
    $id_pelanggan = $koneksi->insert_id;

    $query_transaksi = "INSERT INTO transaksi (id_mobil, id_pelanggan, tanggal_mulai, tanggal_selesai, total_biaya) 
                        VALUES ($id_mobil, $id_pelanggan, '$tanggal_mulai', '$tanggal_selesai', $total_biaya)";
    $koneksi->query($query_transaksi);

    $query_update = "UPDATE mobil SET status='disewa' WHERE id=$id_mobil";
    $koneksi->query($query_update);

    header("Location: konfirmasi_sewa.php");
}

$id_mobil = $_GET['id'];
$query = "SELECT * FROM mobil WHERE id = $id_mobil";
$result = $koneksi->query($query);
$mobil = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sewa Mobil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Formulir Sewa Mobil</h1>
    <form method="POST">
        <input type="hidden" name="id_mobil" value="<?= $mobil['id'] ?>">
        <label>Mobil: <?= $mobil['merek'] ?> <?= $mobil['model'] ?></label>
        <label>Harga Sewa per Hari: Rp. <?= number_format($mobil['harga_sewa'], 0, ',', '.') ?></label>

        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="telepon" placeholder="Nomor Telepon" required>
        
        <label>Tanggal Mulai Sewa:</label>
        <input type="date" name="tanggal_mulai" required>
        
        <label>Tanggal Selesai Sewa:</label>
        <input type="date" name="tanggal_selesai" required>
        
        <button type="submit">Sewa Mobil</button>
    </form>
</body>
</html>