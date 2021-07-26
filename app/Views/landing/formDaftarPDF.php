<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3 style="text-align: center;">Formulir Pendaftaran</h3>
    <br>
    <table style="width: 100%; text-align:left;">
        <tr align="left">
            <th style="width: 40%; text-align:left;">No. Formulir</th>
            <th style="width: 3%;">:</th>
            <th style="text-align: left;"><?= $formulir['noFormulir']; ?></th>
        </tr>
        <tr>
            <th style="width: 40%; text-align:left;">Nama</th>
            <th style="width: 3%">:</th>
            <td style="text-align:left;"><?= $formulir['Nama']; ?></td>
        </tr>
        <tr>
            <th style="width: 40%; text-align:left;">NIK</th>
            <th style="width: 3%">:</th>
            <td style="text-align: left;"><?= $formulir['NIK']; ?></td>
        </tr>
        <tr>
            <?php
            $tgl = explode('-', $formulir['tgLahir']);
            $bulan = array(
                1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            ?>
            <th style="width: 40%; text-align:left;">Tempat, tgl lahir</th>
            <th style="width: 3%">:</th>
            <td style="text-align: left;"><?= $formulir['tempatLahir']; ?>, <?= $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0]; ?></td>
        </tr>
        <tr>
            <th style="width: 40%; text-align:left;">Jenis Kelamin</th>
            <th style="width: 3%">:</th>
            <td style="text-align: left;"><?= ($formulir['gender'] == 1) ? 'Laki-laki' : 'Perempuan' ?></td>
        </tr>
        <tr>
            <th style="width: 40%; text-align:left;">Alamat</th>
            <th style="width: 3%">:</th>
            <td style="text-align: left;"><?= $formulir['Alamat']; ?></td>
        </tr>
        <tr>
            <th style="width: 40%; text-align:left;">Kelurahan</th>
            <th style="width: 3%">:</th>
            <td style="text-align: left;"><?= $formulir['Kelurahan']; ?></td>
        </tr>
        <tr>
            <th style="width: 40%; text-align:left;">Kecamatan</th>
            <th style="width: 3%">:</th>
            <td style="text-align: left;"><?= $formulir['Kecamatan']; ?></td>
        </tr>
        <tr>
            <th style="width: 40%; text-align:left;">Agama</th>
            <th style="width: 3%">:</th>
            <td style="text-align: left;"><?= $formulir['Agama']; ?></td>
        </tr>
        <tr>
            <th style="width: 40%; text-align:left;">Telepon</th>
            <th style="width: 3%">:</th>
            <td style="text-align: left;"><?= $formulir['telepon']; ?></td>
        </tr>
        <tr>
            <th style="width: 40%; text-align:left;">E-mail</th>
            <th style="width: 3%">:</th>
            <td style="text-align: left;"><?= $formulir['email']; ?></td>
        </tr>
    </table>
    <br>
    <p>
        <i>
            Silahkan konfirmasi pendaftaran ke kantor kelurahan <b><?= $formulir['Kelurahan']; ?></b> dengan
            menunjukkan formulir ini.
        </i>
    </p>

</body>

</html>