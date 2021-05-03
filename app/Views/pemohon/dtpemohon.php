<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pemohon</h1>
    <a href="/pemohon/frpemohon" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-edit fa-sm text-white-50"></i> Edit Data</a>
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
        3312201901980001
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
        Purwo Setiawan
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
    <div class="col-md-8">
        Surakarta, 19 Januari 1998
    </div>
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
        Laki-laki
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
        Jl. Brigjen Sudiarto No. 34
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
        Danukusuman
    </div>
</div>

<div class="row py-1 bg-white darker">
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
</div>

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
        Islam
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
        085647053296
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
        purwostwn98@gmail.com
    </div>
</div>

<div class="row py-1 bg-white darker">
    <div class="col-md-4">
        <label for="">
            Foto Kartu Keluarga
            <!-- <br>
            <span class="text-primary">
                <i>E-mail</i>
            </span></label> -->
    </div>
    <div class="col-md-8">
        <button type="submit" class="d-none d-sm-inline-block btn btn-primary btn-sm"><i class="fa-sm fas fa-eye text-white-50"></i> Lihat</button>
    </div>
</div>

<div class="row py-1 ">
    <div class="col-md-4">
        <label for="">
            Foto KTP
            <!-- <br>
            <span class="text-primary">
                <i>E-mail</i>
            </span></label> -->
    </div>
    <div class="col-md-8">
        <button type="submit" class="d-none d-sm-inline-block btn btn-primary btn-sm"><i class="fa-sm fas fa-eye text-white-50"></i> Lihat</button>
    </div>
</div>


<?= $this->endSection(); ?>