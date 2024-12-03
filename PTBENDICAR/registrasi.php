<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    if (empty($username) || empty($password)) {
        echo "Semua kolom wajib diisi!";
        exit;
    }

    $query = "INSERT INTO login (Username, Password) 
            VALUES (?, ?)";
    $stmt = $conn->prepare($query);

    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Data berhasil disimpan. <a href='index.html'>Kembali</a>";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Metode pengiriman tidak valid.";
}
?>