<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .hr {
            border-bottom: double 2px #999;
            padding: 10px 0;
            width: 95%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <table border='0' width="750" cellpadding="0" cellspacing="0" style="border:0px solid black;margin-left:auto;margin-right:auto;">
        <tr>
            <th rowspan="3" width="80" style="text-align:center"><img width="50" src="assets/img/logo_pms.png"></th>
            <th style="text-align:left">
                <p style="font-family: times">
                    <font size="6">Sekretariat Daerah Bidang Kesejahteraan Rakyat</font>
                </p>
            </th>
        </tr>
        <tr>
            <th style="text-align:left">
                <p style="font-family: times">
                    <font size="4"><b>Pemerintah Kota Surakarta</b></font>
                </p>
            </th>
        </tr>
        <tr>
            <th style="text-align:left">
                <p style="font-family: times">
                    <font size="2">Komp. Balai Kota, JL. Jend. Sudirman, No. 2Kp. Baru, Kec. Ps. Kliwon Kota Surakarta, Jawa Tengah 57133</font>
                </p>
            </th>
        </tr>
    </table>
    <div class="hr"></div>
    <h3 align='center'>Report SipKeMas <?= ($filter == 'filter') ? "($tglAwal - $tglAkhir)" : '' ?></h3>
    <table style="width: 100%; text-align:left;">
        <tr align="left">
            <td style="width: 40%; text-align:left;">Jumlah Ajuan</td>
            <td style="width: 3%;">:</td>
            <td style="text-align: left;"><?= $countProses + $countDitolak + $countDisetujui; ?></td>
        </tr>
        <tr align="left">
            <td style="width: 40%; text-align:left;">Ajuan Dalam Proses</td>
            <td style="width: 3%;">:</td>
            <td style="text-align: left;"><?= $countProses; ?></td>
        </tr>
        <tr>
            <td style="width: 40%; text-align:left;">Ajuan Ditolak</td>
            <td style="width: 3%">:</td>
            <td style="text-align:left;"><?= $countDitolak; ?></td>
        </tr>
        <tr>
            <td style="width: 40%; text-align:left;">Ajuan Disetujui</td>
            <td style="width: 3%">:</td>
            <td style="text-align: left;"><?= $countDisetujui; ?></td>
        </tr>
        <tr>
            <td style="width: 40%; text-align:left;">Total Dana Disetujui</td>
            <td style="width: 3%">:</td>
            <td style="text-align: left;"><span style="font-weight: bold;">Rp. <?= number_format((float)$totalDana['nilaiDisetujui'], 0, ',', '.'); ?></span></td>
        </tr>
    </table>
    <?php if ($halaman == 'kesra') { ?>
        <h4 align='left'>Statistik per Mitra</h4>
        <table border="1" style="width: 100%; text-align:left;" cellpadding="4" cellspacing="0">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Nama Mitra</th>
                    <th>Jumlah Semua Ajuan</th>
                    <th>Jumlah Ajuan Disetujui</th>
                    <th>Dana Disetujui</th>
                </tr>
            </thead>
            <?php $no = 0;
            foreach ($countMitra as $mitra => $ajuanMtr) : ?>
                <tr>
                    <td style="text-align; center;"><?= $no + 1; ?></td>
                    <td style="text-align; left;"><?= $mitra; ?></td>
                    <td style="text-align: center;"><?= $ajuanMtr; ?></td>
                    <td style="text-align: center;"><?= $mitraSetuju[$no]; ?></td>
                    <td style="text-align: left;">Rp. <?= number_format((float)$danaMitraSetuju[$no], 0, ',', '.'); ?></td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </table>
    <?php } ?>
    <h4 align='left'>Statistik per Kelurahan</h4>
    <table border="1" style="width: 100%; text-align:left;" cellpadding="4" cellspacing="0">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Kelurahan</th>
                <th>Jumlah Semua Ajuan</th>
                <th>Jumlah Ajuan Disetujui</th>
                <th>Dana Disetujui</th>
            </tr>
        </thead>
        <?php $no2 = 0;
        foreach ($countKelurahan as $kelurahan => $ajuanKlr) : ?>
            <tr>
                <td style="text-align; center;"><?= $no2 + 1; ?></td>
                <td style="text-align; left;"><?= $kelurahan; ?></td>
                <td style="text-align: center;"><?= $ajuanKlr[0]; ?></td>
                <td style="text-align: center;"><?= $ajuanKlr[1]; ?></td>
                <td style="text-align: left;">Rp. <?= number_format((float)$ajuanKlr[2], 0, ',', '.'); ?></td>
                <!-- <td style="text-align: left;">Rp. 20.000</td> -->
            </tr>
        <?php $no2++;
        endforeach; ?>
    </table>
    <!-- <table align='right'>
        <tr align='center'>
            <th>
                <font size="3"> Surakarta, <?= $tglNow; ?>
            </th>
            <th rowspan='3' width='200'></th>
        </tr>
        <tr>
            <td height='50'>&nbsp;</td>
        </tr>
        <tr align='center'>
            <th>
                <font size="3"> Badgyuegdy
            </th>
        </tr>
    </table> -->
</body>

</html>