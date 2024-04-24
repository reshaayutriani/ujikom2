<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Absensi Kerja</title>
    <style>
        /* CSS styling here */
    </style>
</head>
<body>
    <h1>Data Absensi Kerja</h1>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Tanggal Masuk</th>
                <th>Waktu Masuk</th>
                <th>Status</th>
                <th>Waktu Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensiKerja as $absensikerja)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $absensi->nama_karyawan }}</td>
                <td>{{ $absensi->tanggal_masuk }}</td>
                <td>{{ $absensi->waktu_masuk }}</td>
                <td>{{ $absensi->status }}</td>
                <td>{{ $absensi->waktu_keluar }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
