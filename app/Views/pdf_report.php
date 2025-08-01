<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Kegiatan dan Laporan UKM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Data Kegiatan yang Disetujui WR II</h2>
    <table>
        <thead>
            <tr>
                <th>Nama UKM</th>
                <th>Ketua Pelaksana</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Tempat</th>
                <th>Jumlah Peserta</th>
                <th>Target Peserta</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($kegiatan)): ?>
                <?php foreach ($kegiatan as $k): ?>
                    <tr>
                        <td><?= esc($k['nama_ukm']) ?></td>
                        <td><?= esc($k['ketua_pelaksana']) ?></td>
                        <td><?= esc($k['tanggal_kegiatan']) ?></td>
                        <td><?= esc($k['waktu_kegiatan']) ?></td>
                        <td><?= esc($k['tempat_kegiatan']) ?></td>
                        <td><?= esc($k['jumlah_peserta']) ?></td>
                        <td><?= esc($k['target_peserta']) ?></td>
                        <td><?= esc($k['deskripsi']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Tidak ada data kegiatan disetujui.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h2>Data Laporan yang Disetujui WR II</h2>
    <table>
        <thead>
            <tr>
                <th>Nama UKM</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Hasil Kegiatan</th>
                <th>Dokumen</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($laporan)): ?>
                <?php foreach ($laporan as $l): ?>
                    <tr>
                        <td><?= esc($l['nama_ukm']) ?></td>
                        <td><?= esc($l['nama_kegiatan']) ?></td>
                        <td><?= esc($l['tanggal_kegiatan']) ?></td>
                        <td><?= esc($l['hasil_kegiatan']) ?></td>
                        <td><?= esc($l['dokumen_laporan']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Tidak ada data laporan disetujui.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>