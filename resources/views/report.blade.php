<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer - Poltekpar Palembang</title>
    <style>
        #emp {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        #emp td,
        #emp th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #emp tr:nth-child(even) {
            background-color: #0bfdfd;
            text-align: center;
        }

        #emp th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<table>
    <tr>
        <td><img src="{{public_path('/assets/img/logo.png')}}" style="width: 100px; height: 100px"></td>
        <td>
            <h2 style="text-align: center">Politeknik Pariwisata Palembang</h2>
            <h4 style="text-align: center"><i>Jl. Silaberanti no 10, Jakabaring, Palembang, Sumatera Selatan<i></h4>
        </td>
    </tr>
    <tr>
        <td colspan="10">
            <hr>
        </td>
    </tr>
</table>

<body>
    <div class="card-header">
        <h2>Ringkasan - Data Buku Tamu</h2>
        <p style="text-align: justify">Buku tamu <strong>Politeknik Pariwisata Palembang</strong> merupakan buku yang berisi daftar
            pelanggan yang bertujuan dalam pemenuhan kebutuhan data.
            Buku tamu ini bisa menjadi patokan dalam evaluasi Politeknik Pariwisata Palembang dalam melayani masyarakat. Berikut ini
            ringkasan data buku tamu:</p>
    </div>
    <div class="card-header">
        <p style="text-align: center">Total Pengunjung : <strong>{{$customer}}</strong> orang</p>
        <p style="text-align: center">Total Transaksi : <strong>{{$transaction}}</strong> kali</p>
    </div>
    <h4>1. Jumlah Customer - Berdasarkan Pekerjaan</h4>
    <table id="emp" border="2">
        <title>Customer - BPS</title>
        <thead class="thead-dark">
            <tr>
                <th>ASN</th>
                <th>Pelajar/Mahasiswa</th>
                <th>Dosen/Guru</th>
                <th>Peneliti</th>
                <th>Umum/lain-lain</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$asn}}</td>
                <td>{{$student}}</td>
                <td>{{$lecturer}}</td>
                <td>{{$researcher}}</td>
                <td>{{$general_job}}</td>
            </tr>
        </tbody>
    </table>
    <h4>2. Jumlah Customer - Berdasarkan Pendidikan</h4>
    <table id="emp" border="2">
        <thead class="thead-dark">
            <tr>
                <th>SMP/Dibawahnya</th>
                <th>SMA</th>
                <th>Diploma(D1/D2/D3)</th>
                <th>Sarjana (S1)</th>
                <th>Magister(S2)</th>
                <th>Doktor(S3)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$smp}}</td>
                <td>{{$sma}}</td>
                <td>{{$diploma}}</td>
                <td>{{$sarjana}}</td>
                <td>{{$magister}}</td>
                <td>{{$doktor}}</td>
            </tr>
        </tbody>
    </table>
    <h4>3. Jumlah Transaksi - Berdasarkan Layanan</h4>
    <table id="emp" border="2">
        <thead class="thead-dark">
            <tr>
                <th>Permintaan Data</th>
                <th>Konsultasi Data</th>
                <th>Rekomendasi Data Sektoral</th>
                <th>Umum (lain-lain)</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$service1}}</td>
                <td>{{$service2}}</td>
                <td>{{$service3}}</td>
                <td>{{$service4}}</td>
            </tr>
        </tbody>
    </table>
    <h4>4. Jumlah Transaksi - Berdasarkan Tujuan</h4>
    <table id="emp" border="2">
        <thead class="thead-dark">
            <tr>
                <th>Skripsi</th>
                <th>Tesis</th>
                <th>Disertasi</th>
                <th>Penelitian</th>
                <th>Umum (lain-lain)</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$purpose1}}</td>
                <td>{{$purpose2}}</td>
                <td>{{$purpose3}}</td>
                <td>{{$purpose4}}</td>
                <td>{{$purpose5}}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
