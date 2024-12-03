<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Formulir Penyewaan</h2>
    <form action="proses.php" method="POST">

    <label for="Nama">Nama : </label><br>
        <input type="text" id="alamat" name="alamat" required><br><br>
        
        <label for="Alamat">Alamat: </label><br>
        <input type="text" id="nama" name="nama" required><br><br>
        
        <label for="Nama">No KTP : </label><br>
        <input type="text" id="NoKTP" name="NoKTP" required><br><br>
        
        <label for="Nama">No Telp : </label><br>
        <input type="text" id="NoTelp" name="NoTelp" required><br><br>

        <label for="pilihan">Pilih Merek Kendaraan :</label><br>
        <select id="pilihan" name="pilihan">
            <option value="Avanza">Avanza</option>
            <option value="Inova">Inova</option>
            <option value="Sigra">Sigra</option>

            </select><br><br>
            
        <label for="tglpengembalian">Tanggal Pengembalian : </label><br>
        <input type="date" id="tglpengembalian" name="tglpengembalian" required><br><br>


        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
