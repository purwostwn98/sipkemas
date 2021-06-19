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
    <div class="row">
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-edit fa-sm text-white-50"></i> Edit Data</a>
        <?php if ($session->get('privUser') != 1) { ?>
            <?php if ($konfirmasi == 1) { ?>
                <?= form_open("/kelurahan/pengajuanBantuan", ['class' => 'formPengajuan']); ?>
                <?= csrf_field(); ?>
                <input type="hidden" name="idPemohon" id="idPemohon" value="<?= $pemohon['idPemohon']; ?>">
                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm ml-2 btnAjukan" role="button">
                    <i class="fas fa-hands-helping fa-sm text-white-50"></i> Ajukan Bantuan
                </button>
                <?= form_close(); ?>
            <?php } ?>
            <?php if ($konfirmasi == 0) { ?>
                <div class="div ml-2">
                    <form action="/kelurahan/konfirmasi" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="idFormulir" id="idFormulir" value="<?= $pemohon['idFormulir']; ?>">
                        <input type="hidden" name="nik" id="nik" value="<?= $pemohon['NIK']; ?>">
                        <input type="hidden" name="nama" id="nama" value="<?= $pemohon['Nama']; ?>">
                        <input type="hidden" name="tempatLahir" id="tempatLahir" value="<?= $pemohon['tempatLahir']; ?>">
                        <input type="hidden" name="tgLahir" id="tgLahir" value="<?= $pemohon['tgLahir']; ?>">
                        <input type="hidden" name="gender" id="gender" value="<?= $pemohon['gender']; ?>">
                        <input type="hidden" name="alamat" id="alamat" value="<?= $pemohon['Alamat']; ?>">
                        <input type="hidden" name="kelurahan" id="kelurahan" value="<?= $pemohon['idKel']; ?>">
                        <input type="hidden" name="agama" id="agama" value="<?= $pemohon['idAgama']; ?>">
                        <input type="hidden" name="telepon" id="telepon" value="<?= $pemohon['telepon']; ?>">
                        <input type="hidden" name="email" id="email" value="<?= $pemohon['email']; ?>">
                        <input type="hidden" name="status" id="status" value="1">
                        <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">Konfirmasi Pendaftaran</button>
                    </form>
                </div>
            <?php } ?>
            <?php if ($konfirmasi == 0) { ?>
                <a href="/kelurahan/hapusForm?no=<?= $pemohon['idFormulir']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm ml-2"><i class="fas fa-sm fa-user-slash text-white-50"></i> Hapus</a>
            <?php } elseif ($konfirmasi == 1) { ?>
                <a href="/kelurahan/hapusPemohon?no=<?= $pemohon['idPemohon']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm ml-2"><i class="fas fa-sm fa-user-slash text-white-50"></i> Hapus</a>
            <?php } ?>
        <?php } ?>
    </div>
</div>

<!-- Content Row Data Pemohon-->
<?php if ($konfirmasi == 0) { ?>
    <div class="row bg-white darker">
        <div class="col-md-6">
            <label for="">
                <b>Nomor Formulir</b>
                <br>
                <span class="text-primary">
                    <i>Form Number</i>
                </span></label>
        </div>
        <div class="col-md-6">
            <b><?= $pemohon['noFormulir']; ?></b>
        </div>
    </div>
<?php } ?>
<hr class="m-0 p-1">
<div class="row">
    <div class="col-md-6">
        <label for="">
            <b>Nomor Induk Kependudukan (NIK)</b>
            <br>
            <span class="text-primary">
                <i>National Identification Number</i>
            </span></label>
    </div>
    <div class="col-md-6">
        <?= $pemohon['NIK']; ?>
    </div>
</div>
<hr class="m-0 p-1">
<div class="row bg-white darker">
    <div class="col-md-6">
        <label for="">
            <b>Nama Lengkap</b>
            <br>
            <span class="text-primary">
                <i>Full Name</i>
            </span></label>
    </div>
    <div class="col-md-6">
        <?= $pemohon['Nama']; ?>
    </div>
</div>
<hr class="m-0 p-1">
<div class="row">
    <div class="col-md-6">
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
    <div class="col-md-6">
        <?= $pemohon['tempatLahir']; ?>, <?= $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0]; ?>
    </div>
</div>
<hr class="m-0 p-1">
<div class="row bg-white darker">
    <div class="col-md-6">
        <label for="">
            <b>Jenis Kelamin</b>
            <br>
            <span class="text-primary">
                <i>Gender</i>
            </span></label>
    </div>
    <div class="col-md-6">
        <?= ($pemohon['gender'] == 1) ? 'Laki-laki' : 'Perempuan' ?>
    </div>
</div>
<hr class="m-0 p-1">
<div class="row">
    <div class="col-md-6">
        <label for="">
            <b>Alamat</b>
            <br>
            <span class="text-primary">
                <i>Address</i>
            </span></label>
    </div>
    <div class="col-md-6">
        <?= $pemohon['Alamat']; ?>
    </div>
</div>
<hr class="m-0 p-1">
<div class="row bg-white darker">
    <div class="col-md-6">
        <label for="">
            <b>Kelurahan</b>
            <br>
            <span class="text-primary">
                <i>Sub-district</i>
            </span></label>
    </div>
    <div class="col-md-6">
        <?= $pemohon['Kelurahan']; ?>
    </div>
</div>
<hr class="m-0 p-1">
<div class="row">
    <div class="col-md-6">
        <label for="">
            <b>Kecamatan</b>
            <br>
            <span class="text-primary">
                <i>Districts</i>
            </span></label>
    </div>
    <div class="col-md-6">
        <?= $pemohon['Kecamatan']; ?>
    </div>
</div>
<hr class="m-0 p-1">
<div class="row bg-white darker">
    <div class="col-md-6">
        <label for="">
            <b>Agama</b>
            <br>
            <span class="text-primary">
                <i>Religion</i>
            </span></label>
    </div>
    <div class="col-md-6">
        <?= $pemohon['Agama']; ?>
    </div>
</div>
<hr class="m-0 p-1">
<div class="row">
    <div class="col-md-6">
        <label for="">
            <b>Telepon</b>
            <br>
            <span class="text-primary">
                <i>Telephone</i>
            </span></label>
    </div>
    <div class="col-md-6">
        <?= $pemohon['telepon']; ?>
    </div>
</div>
<hr class="m-0 p-1">
<div class="row bg-white darker">
    <div class="col-md-6">
        <label for="">
            <b>E-mail</b>
            <br>
            <span class="text-primary">
                <i>E-mail</i>
            </span></label>
    </div>
    <div class="col-md-6">
        <?= $pemohon['email']; ?>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.formPengajuan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnAjukan').prop('disabled', true);
                    $('.btnAjukan').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btnAjukan').prop('disabled', false);
                    $('.btnAjukan').html('Ajukan Bantuan');
                },
                success: function(response) {
                    if (response.berhasil) {
                        swal({
                            title: "No. Ajuan: " + response.berhasil.noAjuan,
                            text: "Ajuan berhasil didaftarkan",
                            icon: "success",
                            button: "Ok",
                        }).then((value) => {
                            window.location = response.berhasil.link;
                        });
                        // window.location = response.berhasil.link;
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>
<?= $this->endSection(); ?>