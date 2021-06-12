<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>
<?php
$session = \Config\Services::session();
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col-auto">
        <h1 class="h3 mb-0 text-gray-800">Data Pemohon</h1>
        <?php if ($session->get('privUser') != 1) { ?>
            <span class="small">Pastikan pemohon sudah terdaftar E-SIK (kecuali untuk pemohon lembaga)</span>
        <?php } ?>
    </div>
    <div>
        <a href="/pemohon/frpemohon" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-edit fa-sm text-white-50"></i> Edit Data</a>
        <?php if ($session->get('privUser') != 1) { ?>
            <?php if ($konfirmasi == 0) { ?>
                <a href="/pemohon/konfirmasi?konfirmasi=1&no=<?= $pemohon['noDaftar']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">Konfirmasi Pendaftaran</a>
            <?php } ?>
            <a href="/pemohon/hapus?no=<?= $pemohon['idPemohon']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-sm fa-user-slash text-white-50"></i> Hapus</a>
        <?php } ?>
    </div>
</div>

<!-- Content Row Data Pemohon-->

<div class="row py-1 bg-white darker">
    <div class="col-md-4">
        <label for="">
            <b>Nomor Induk Kependudukan (NIK)</b>
            <br>
            <span class="text-primary">
                <i>National Identification Number</i>
            </span></label>
    </div>
    <div class="col-md-8">
        <?php if ($session->get('privUser') != 1) { ?>
            <?= $pemohon['NIK']; ?>
        <?php } else { ?>
            56777877766444
        <?php } ?>
    </div>
</div>

<div class="row py-1">
    <div class="col-md-4">
        <label for="">
            <b>Nama Lengkap</b>
            <br>
            <span class="text-primary">
                <i>Full Name</i>
            </span></label>
    </div>
    <div class="col-md-8">
        <?php if ($session->get('privUser') != 1) { ?>
            <?= $pemohon['Nama']; ?>
        <?php } else { ?>
            Purwo Setiawan
        <?php } ?>
    </div>
</div>

<div class="row py-1 bg-white darker">
    <div class="col-md-4">
        <label for="">
            <b>Tempat, Tanggal Lahir</b>
            <br>
            <span class="text-primary">
                <i>Place, Date of Birth</i>
            </span></label>
    </div>
    <?php if ($session->get('privUser') != 1) { ?>
        <?php
        $tgl = explode('-', $pemohon['tgLahir']);
        $bulan = array(
            1 =>   'Januari',
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
        <div class="col-md-8">
            <?= $pemohon['tempatLahir']; ?>, <?= $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0]; ?>
        </div>
    <?php } else { ?>
        <div class="col-md-8">
            Wonogiri, 19 Januari 1998
        </div>
    <?php } ?>
</div>

<div class="row py-1">
    <div class="col-md-4">
        <label for="">
            <b>Jenis Kelamin</b>
            <br>
            <span class="text-primary">
                <i>Gender</i>
            </span></label>
    </div>
    <div class="col-md-8">
        <?php if ($session->get('privUser') != 1) { ?>
            <?= ($pemohon['gender'] == 1) ? 'Laki-laki' : 'Perempuan' ?>
        <?php } else { ?>
            Laki laki
        <?php } ?>
    </div>
</div>

<div class="row py-1 bg-white darker">
    <div class="col-md-4">
        <label for="">
            <b>Alamat</b>
            <br>
            <span class="text-primary">
                <i>Address</i>
            </span></label>
    </div>
    <div class="col-md-8">
        <?php if ($session->get('privUser') != 1) { ?>
            <?= $pemohon['Alamat']; ?>
        <?php } else { ?>
            RT02/RW09, No.7
        <?php } ?>
    </div>
</div>

<div class="row py-1">
    <div class="col-md-4">
        <label for="">
            <b>Kelurahan</b>
            <br>
            <span class="text-primary">
                <i>Sub-district</i>
            </span></label>
    </div>
    <div class="col-md-8">
        <?php if ($session->get('privUser') != 1) { ?>
            <?= $pemohon['idKel']; ?>
        <?php } else { ?>
            Danukusuman
        <?php } ?>
    </div>
</div>

<!-- <div class="row py-1 bg-white darker">
    <div class="col-md-4">
        <label for="">
            <b>Kecamatan</b>
            <br>
            <span class="text-primary">
                <i>Districts</i>
            </span></label>
    </div>
    <div class="col-md-8">
        Serengan
    </div>
</div> -->

<div class="row py-1">
    <div class="col-md-4">
        <label for="">
            <b>Agama</b>
            <br>
            <span class="text-primary">
                <i>Religion</i>
            </span></label>
    </div>
    <div class="col-md-8">
        <?php if ($session->get('privUser') != 1) { ?>
            <?= $pemohon['Agama']; ?>
        <?php } else { ?>
            Islam
        <?php } ?>
    </div>
</div>

<div class="row py-1 bg-white darker">
    <div class="col-md-4">
        <label for="">
            <b>Telepon</b>
            <br>
            <span class="text-primary">
                <i>Telephone</i>
            </span></label>
    </div>
    <div class="col-md-8">
        <?php if ($session->get('privUser') != 1) { ?>
            <?= $pemohon['telepon']; ?>
        <?php } else { ?>
            0987776555
        <?php } ?>
    </div>
</div>

<div class="row py-1">
    <div class="col-md-4">
        <label for="">
            Email
            <br>
            <span class="text-primary">
                <i>E-mail</i>
            </span></label>
    </div>
    <div class="col-md-8">
        <?php if ($session->get('privUser') != 1) { ?>
            <?= $pemohon['email']; ?>
        <?php } else { ?>
            setiawanpurwo0@gmail.com
        <?php } ?>
    </div>
</div>

<?= $this->endSection(); ?>