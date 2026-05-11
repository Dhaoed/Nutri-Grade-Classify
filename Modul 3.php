<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 3 - Hitung Umur</title>
</head>

<body>

<?php
// Program untuk menghitung umur

// Mengambil data dari formulir jika sudah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_nama"])) {
    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];

    // Validasi input
    if (empty($nama) || empty($tanggal_lahir)) {
        echo "<p>Masukkan nama dan tanggal lahir!</p>";
    } else {
        // Hitung umur
        $umur = date_diff(date_create($tanggal_lahir), date_create('today'))->y;

        echo "<h1>Hasil Perhitungan Umur</h1>";
        echo "<p>Nama: $nama</p>";
        echo "<p>Tanggal Lahir: $tanggal_lahir</p>";
        echo "<p>Umur: $umur tahun</p>";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required>
    <br>

    <label for="tanggal_lahir">Tanggal Lahir:</label>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
    <br>

    <input type="submit" name="submit_nama" value="Hitung Umur">
</form>

<?php
// Program untuk menghitung konsonan dan vokal pada nama keluarga

// Baca data keluarga dari file teks
$file_path = "Hasil.txt";
$data_keluarga = file_get_contents($file_path);

// Pisahkan nama-nama keluarga
$nama_keluarga = explode("\n", $data_keluarga);

// Inisialisasi variabel jumlah konsonan dan vokal
$jumlah_konsonan = $jumlah_vokal = 0;

// Hitung jumlah konsonan dan vokal untuk setiap nama
foreach ($nama_keluarga as $nama) {
    $jumlah_konsonan += preg_match_all('/[bcdfghjklmnpqrstvwxyz]/i', $nama);
    $jumlah_vokal += preg_match_all('/[aeiou]/i', $nama);
}

// Tampilkan hasil perhitungan
echo "<h1>Hasil Perhitungan Konsonan dan Vokal</h1>";
echo "<p>Total Konsonan: $jumlah_konsonan</p>";
echo "<p>Total Vokal: $jumlah_vokal</p>";
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_nama"])) {
    // Simpan hasil perhitungan ke dalam file
    $hasil_file_path = "Hasil.txt";
    $hasil_perhitungan = "Total Konsonan: $jumlah_konsonan\nTotal Vokal: $jumlah_vokal";
    file_put_contents($hasil_file_path, $hasil_perhitungan);

    echo "<h1>Hasil Perhitungan Disimpan</h1>";
    echo "<p>Hasil perhitungan telah disimpan dalam file: $hasil_file_path</p>";
}
?>

</body>
</html>
