<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">> Detail Ajuan</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header bg-info py-3">
        <h6 class="m-0 font-weight-bold text-white">Data Pemohon</h6>
    </div>
    <div class="card-body">
        <div class="row bg-white darker">
            <div class="col-md-4">
                <label for="">
                    <b>Nomor Induk Kependudukan (NIK)</b>
                    <br>
                    <span class="text-primary">
                        <i>National Identification Number</i>
                    </span></label>
            </div>
            <div class="col-md-8">
                <?= $pemohon['NIK']; ?>
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row">
            <div class="col-md-4">
                <label for="">
                    <b>Nama Lengkap</b>
                    <br>
                    <span class="text-primary">
                        <i>Full Name</i>
                    </span></label>
            </div>
            <div class="col-md-8">
                <?= $pemohon['Nama']; ?>
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row bg-white darker">
            <div class="col-md-4">
                <label for="">
                    <b>Tempat, Tanggal Lahir</b>
                    <br>
                    <span class="text-primary">
                        <i>Place, Date of Birth</i>
                    </span></label>
            </div>
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
        </div>
        <hr class="m-0 p-1">
        <div class="row">
            <div class="col-md-4">
                <label for="">
                    <b>Jenis Kelamin</b>
                    <br>
                    <span class="text-primary">
                        <i>Gender</i>
                    </span></label>
            </div>
            <div class="col-md-8">
                <?= ($pemohon['gender'] == 1) ? 'Laki-laki' : 'Perempuan' ?>
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row bg-white darker">
            <div class="col-md-4">
                <label for="">
                    <b>Alamat</b>
                    <br>
                    <span class="text-primary">
                        <i>Address</i>
                    </span></label>
            </div>
            <div class="col-md-8">
                <?= $pemohon['Alamat']; ?>
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row">
            <div class="col-md-4">
                <label for="">
                    <b>Kelurahan</b>
                    <br>
                    <span class="text-primary">
                        <i>Sub-district</i>
                    </span></label>
            </div>
            <div class="col-md-8">
                <?= $pemohon['idKel']; ?>
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row bg-white darker">
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
        <hr class="m-0 p-1">
        <div class="row">
            <div class="col-md-4">
                <label for="">
                    <b>Agama</b>
                    <br>
                    <span class="text-primary">
                        <i>Religion</i>
                    </span></label>
            </div>
            <div class="col-md-8">
                <?= $pemohon['Agama']; ?>
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row bg-white darker">
            <div class="col-md-4">
                <label for="">
                    <b>Telepon</b>
                    <br>
                    <span class="text-primary">
                        <i>Telephone</i>
                    </span></label>
            </div>
            <div class="col-md-8">
                <?= $pemohon['telepon']; ?>
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row">
            <div class="col-md-4">
                <label for="">
                    Email
                    <br>
                    <span class="text-primary">
                        <i>E-mail</i>
                    </span></label>
            </div>
            <div class="col-md-8">
                <?= $pemohon['email']; ?>
            </div>
        </div>
    </div>
</div>

<!-- <div class="card shadow mb-4">
    <div class="card-header py-3 bg-info">
        <h6 class="m-0 font-weight-bold text-white">Data E-SIK</h6>
    </div>
    <div class="card-body">
        DATA E-SIK
    </div>
</div> -->

<div class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between bg-info py-3">
        <h6 class="m-0 font-weight-bold text-white">Data Ajuan Bantuan</h6>
    </div>
    <div class="card-body">
        <div class="row bg-white darker">
            <div class="col-md-4">
                <label for="">
                    <b>Paket Bantuan</b>
                </label>
            </div>
            <div class="col-md-8">
                <?= $ajuan['idBantuan']; ?>
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row bg-white darker">
            <div class="col-md-4">
                <label for="">
                    <b>Deskripsi Bantuan</b>
                </label>
            </div>
            <div class="col-md-8">
                <?= $ajuan['Keperluan']; ?>
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row bg-white darker">
            <div class="col-md-4">
                <label for="">
                    <b>Tgl. Ajuan</b>
                </label>
            </div>
            <div class="col-md-8">
                <?= $ajuan['tgAjuan']; ?>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Dokumen Pendukung</h6>
    </div>
    <div class="card-body">
        <div class="row bg-white darker">
            <div class="col-md-4">
                <label for="">
                    <b>Foto Kartu Keluarga</b>
                </label>
            </div>
            <div class="col-md-8">
                Foto
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row bg-white">
            <div class="col-md-4">
                <label for="">
                    <b>Foto KTP</b>
                </label>
            </div>
            <div class="col-md-8">
                Foto
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row bg-white darker">
            <div class="col-md-4">
                <label for="">
                    <b>Foto Kondisi 1</b>
                </label>
            </div>
            <div class="col-md-8">
                Foto
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row bg-white">
            <div class="col-md-4">
                <label for="">
                    <b>Foto Kondisi 2</b>
                </label>
            </div>
            <div class="col-md-8">
                Foto
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row bg-white">
            <div class="col-md-4">
                <label for="">
                    <b>Foto Kondisi 3</b>
                </label>
            </div>
            <div class="col-md-8">
                Foto
            </div>
        </div>
        <hr class="m-0 p-1">
        <div class="row bg-white">
            <div class="col-md-4">
                <label for="">
                    <b>Surat/Dokumen Pendukung</b>
                </label>
            </div>
            <div class="col-md-8">
                Foto
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <a href="#" class="btn btn-warning btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        <!-- <a href="#" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-save"></i>
            </span>
            <span class="text">Simpan</span>
        </a>
        <a href="#" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-key"></i>
            </span>
            <span class="text">Kunci Data</span>
        </a> -->
    </div>
</div>



<?= $this->endSection(); ?>