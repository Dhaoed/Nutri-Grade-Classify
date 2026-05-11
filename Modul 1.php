<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 1 Pemprograman Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }

        #result {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Nama Keluarga</h1>

    <label for="nama">Masukkan Nama:</label>
    <input type="text" id="nama" placeholder="Masukkan nama">
    <button onclick="hitungStatistik()">Kelola Data</button>

    <div id="result">
        <h2>Hasil:</h2>
        <p id="jumlahKata">Jumlah Kata: </p>
        <p id="jumlahHuruf">Jumlah Huruf: </p>
        <p id="kebalikanNama">Kebalikan Nama: </p>
        <p id="jumlahKonsonan">Jumlah Konsonan: </p>
        <p id="jumlahVokal">Jumlah Vokal: </p>
    </div>

    <script>
        function hitungStatistik() {
            var nama = document.getElementById('nama').value.toLowerCase();
            var jumlahKata = nama.split(' ').length;
            var jumlahHuruf = nama.replace(/ /g, '').length;
            var kebalikanNama = nama.split('').reverse().join('');
            var jumlahKonsonan = nama.replace(/[aeiou ]/g, '').length;
            var jumlahVokal = nama.replace(/[^aeiou]/g, '').length;

            document.getElementById('jumlahKata').innerText = 'Jumlah Kata: ' + jumlahKata;
            document.getElementById('jumlahHuruf').innerText = 'Jumlah Huruf: ' + jumlahHuruf;
            document.getElementById('kebalikanNama').innerText = 'Kebalikan Nama: ' + kebalikanNama;
            document.getElementById('jumlahKonsonan').innerText = 'Jumlah Konsonan: ' + jumlahKonsonan;
            document.getElementById('jumlahVokal').innerText = 'Jumlah Vokal: ' + jumlahVokal;
        }
    </script>
</body>
</html>
