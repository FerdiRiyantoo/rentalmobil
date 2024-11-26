<?php
include 'koneksi.php';

$query = "SELECT * FROM mobil WHERE status='tersedia'";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mobil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Daftar Mobil Tersedia</h1>
    <table>
        <thead>
            <tr>
                <th>Merek</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Harga Sewa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['merek'] ?></td>
                <td><?= $row['model'] ?></td>
                <td><?= $row['tahun'] ?></td>
                <td>Rp. <?= number_format($row['harga_sewa'], 0, ',', '.') ?></td>
                <td>
                    <a href="sewa_mobil.php?id= <?= $row['id'] ?>">Sewa</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>