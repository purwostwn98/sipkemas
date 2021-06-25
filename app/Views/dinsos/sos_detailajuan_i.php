<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>
<?php
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
<!-- Page Heading -->
<div class="row d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col-auto">
        <h1 class="h3 mb-0 text-gray-800">Detail Ajuan</h1>
    </div>
    <div class="col-auto mt-4">
        <p>Status ajuan:
            <?php if ($idStsAjuan == 2) { ?>
                <span style="border-radius: 5px;" class="bg-gray-600 p-2 text-white">Untuk Direkomendasi</span>
            <?php } elseif ($idStsAjuan <= 5 && $idStsAjuan >= 3) { ?>
                <span style="border-radius: 5px;" class="bg-info p-2 text-white"><?= $StatusAjuan; ?></span>
            <?php } elseif ($idStsAjuan == 6) { ?>
                <span style="border-radius: 5px;" class="bg-warning p-2 text-white"><?= $StatusAjuan; ?></span>
            <?php } elseif ($idStsAjuan == 7) { ?>
                <span style="border-radius: 5px;" class="bg-success p-2 text-white"><?= $StatusAjuan; ?></span>
            <?php } ?>
        </p>
    </div>
</div>

<!-- Data Pemohon -->
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
                <?= $pemohon['Kelurahan']; ?>
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
                <?= $pemohon['Kecamatan']; ?>
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

<!-- Data Ajuan Bantuan -->
<div class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between bg-info py-3">
        <h6 class="m-0 font-weight-bold text-white">Data Ajuan Bantuan</h6>
    </div>
    <?php if ($idStsAjuan != 1) { ?>
        <div class="card-body">
            <div class="row bg-white darker">
                <div class="col-md-4">
                    <label for="">
                        <b>Program Bantuan</b>
                    </label>
                </div>
                <div class="col-md-8">
                    <?= $ajuan['NamaMitra']; ?>: <?= $ajuan['namaProgram']; ?>
                </div>
            </div>
            <hr class="m-0 p-1">
            <div class="row bg-white darker">
                <div class="col-md-4">
                    <label for="">
                        <b>Nilai Bantuan</b>
                    </label>
                </div>
                <div class="col-md-8">
                    Rp <?= number_format((float)$ajuan['Kebutuhan'], 0, ',', '.'); ?>
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
                <?php
                $tgl = explode('-', $ajuan['tgAjuan']);
                ?>
                <div class="col-md-8">
                    <?= $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0]; ?>
                </div>
            </div>
            <?php if ($ajuan['idJnsAjuan'] == 0) { ?>
                <hr class="m-0 p-1">
                <div class="row bg-white darker">
                    <div class="col-md-4">
                        <label for="">
                            <b>Status E-SIK</b>
                        </label>
                    </div>
                    <div class="col-md-8">
                        <?= ($ajuan['eSik'] == 0) ? 'Tidak Terdaftar' : 'Terdaftar' ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($ajuan['eSik'] == 0 && $ajuan['idJnsAjuan'] == 0) { ?>
                <hr class="m-0 p-1">
                <div class="row bg-white darker">
                    <div class="col-md-4">
                        <label for="">
                            <b>Surat Keterangan Pemohon</b>
                        </label>
                    </div>
                    <div class="col-md-8">
                        <a href="<?= base_url(); ?>/uploads_syarat/<?= $ajuan['srtKetPemohon']; ?>" class="btn btn-success btn-sm btn-icon-split mb-2" target="_blank">
                            <span class="icon text-white-50"> <i class="fas fa-check"></i></span><span class="text">Lihat</span>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="card-body">
            Pemohon belum mengisi form ajuan
        </div>
    <?php } ?>
</div>

<!-- Dokumen Pendukung -->
<div class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between bg-info py-3">
        <h6 class="m-0 font-weight-bold text-white">Dokumen Pendukung</h6>
    </div>
    <?php if ($idStsAjuan != 1) { ?>
        <div class="card-body">
            <?php foreach ($dokumen as $dok) { ?>
                <div class="row bg-white darker">
                    <div class="col-md-6">
                        <label for="">
                            <b><?php echo $dok['Syarat'] ?></b>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <a href="<?= base_url(); ?>/uploads_syarat/<?= $dok['namaFile']; ?>" class="btn btn-success btn-sm btn-icon-split mb-2" target="_blank">
                            <span class="icon text-white-50"> <i class="fas fa-check"></i></span><span class="text">Lihat</span>
                        </a>
                    </div>
                </div>
                <hr class="m-0 p-1">
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="card-body">
            Pemohon belum mengupload syarat ajuan
        </div>
    <?php } ?>
</div>


<!-- Tindakan Dinsos -->
<?php if ($ajuan['idStsAjuan'] == 2) { ?>
    <?= form_open("/dinsos/updateAjuan", ['class' => 'formRekomendasi']); ?>
    <?= csrf_field(); ?>
    <input type="hidden" name="idAjuan" id="idAjuan" value="<?= $ajuan['idAjuan']; ?>">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-warning">
            <h6 class="m-0 font-weight-bold text-white">Tindakan</h6>
        </div>
        <div class="card-body">
            <div class="row" style="display: none;">
                <div class="col-12">
                    <div class="alert alert-danger peringatan" role="alert">
                        This is a danger alert—check it out!
                    </div>
                </div>
            </div>
            <div class="row bg-white darker py-2">
                <div class="col-md-4">
                    <label for="stsESIK">
                        <b>E-SIK</b>
                    </label>
                </div>
                <div class="col-md-8">
                    <select id="stsESIK" class="form-control" name="eSik">
                        <option selected value="" disabled>--Pilih--</option>
                        <option value="1">Terdaftar</option>
                        <option value="0">Belum Terdaftar</option>
                    </select>
                </div>
            </div>
            <div class="row bg-white darker py-2">
                <div class="col-md-4">
                    <label for="rekomendasi">
                        <b>Rekomendasi ke Kesra</b>
                    </label>
                </div>
                <!-- Option Rekomendasi -->
                <div class="col-md-8">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rekomendasi" id="exampleRadios1" value="5">
                        <label class="form-check-label" for="exampleRadios1">
                            Sangat Direkomendasikan
                            (<span class="fa fa-star oke"></span>
                            <span class="fa fa-star oke"></span>
                            <span class="fa fa-star oke"></span>
                            <span class="fa fa-star oke"></span>
                            <span class="fa fa-star oke"></span>)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rekomendasi" id="exampleRadios2" value="4">
                        <label class="form-check-label" for="exampleRadios2">
                            Lebih Direkomendasikan
                            (<i class="fa fa-star oke"></i>
                            <span class="fa fa-star oke"></span>
                            <span class="fa fa-star oke"></span>
                            <span class="fa fa-star oke"></span>
                            <span class="fa fa-star"></span>)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rekomendasi" id="exampleRadios3" value="3">
                        <label class="form-check-label" for="exampleRadios3">
                            Direkomendasikan
                            (<i class="fa fa-star oke"></i>
                            <span class="fa fa-star oke"></span>
                            <span class="fa fa-star oke"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rekomendasi" id="exampleRadios5" value="2">
                        <label class="form-check-label" for="exampleRadios5">
                            Kurang Direkomendasikan
                            (<i class="fa fa-star oke"></i>
                            <span class="fa fa-star oke"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rekomendasi" id="exampleRadios4" value="1">
                        <label class="form-check-label" for="exampleRadios4">
                            Tidak Direkomendasikan
                            (<i class="fa fa-star oke"></i>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>)
                        </label>
                    </div>
                </div>
            </div>
            <div class="row bg-white darker py-2">
                <div class="col-md-4">
                    <label for="ketRekomen">
                        <b>Ket. Tambahan (opsional)</b>
                    </label>
                </div>
                <div class="col-md-8">
                    <textarea class="form-control" id="ketRecDinsos" name="ketRecDinsos" rows="3"></textarea>
                </div>
            </div>
        </div>
    </div>
    <!-- Button -->
    <div class="row">
        <div class="col">
            <a href="/dinsos/dftrajuan_i" class="btn btn-warning btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
            <button type="button" role="button" class="btn btn-primary btn-icon-split btnConfirm">
                <span class='icon text-white-50'>
                    <i class='fas fa-save'></i>
                </span>
                <span class='text'>Konfirmasi ke Kesra</span>
            </button>
        </div>
    </div>
    <?= form_close(); ?>
<?php } ?>

<!-- Hasil Rekomendasi Dinsos -->
<?php if ($idStsAjuan >= 3) { ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-info">
            <h6 class="m-0 font-weight-bold text-white">Rekomendasi (Dinsos)</h6>
        </div>
        <div class="card-body">
            <div class="row bg-white darker">
                <div class="col-md-4">
                    <label for="">
                        <b>E-SIK</b>
                    </label>
                </div>
                <div class="col-md-8">
                    <?= ($ajuan['eSik'] == 1) ? 'Terdaftar' : 'Tidak Terdaftar' ?>
                </div>
            </div>
            <hr class="m-0 p-1">
            <div class="row bg-white darker">
                <div class="col-md-4">
                    <label for="">
                        <b>Rekomendasi</b>
                    </label>
                </div>
                <div class="col-md-8">
                    <?php if ($ajuan['idRecDinsos'] == 1) { ?>
                        Tidak Direkomendasikan
                    <?php } elseif ($ajuan['idRecDinsos'] == 2) { ?>
                        Kurang Direkomendasikan
                    <?php } elseif ($ajuan['idRecDinsos'] == 3) { ?>
                        Direkomendasikan
                    <?php } elseif ($ajuan['idRecDinsos'] == 4) { ?>
                        Lebih Direkomendasikan
                    <?php } elseif ($ajuan['idRecDinsos'] == 5) { ?>
                        Sangat Direkomendasikan
                    <?php } ?> &nbsp;
                    (
                    <span class="fa fa-star <?= ($ajuan['idRecDinsos'] >= 1) ? 'oke' : '' ?>"></span>
                    <span class="fa fa-star <?= ($ajuan['idRecDinsos'] >= 2) ? 'oke' : '' ?>"></span>
                    <span class="fa fa-star <?= ($ajuan['idRecDinsos'] >= 3) ? 'oke' : '' ?>"></span>
                    <span class="fa fa-star <?= ($ajuan['idRecDinsos'] >= 4) ? 'oke' : '' ?>"></span>
                    <span class="fa fa-star <?= ($ajuan['idRecDinsos'] == 5) ? 'oke' : '' ?>"></span>
                    )
                </div>
            </div>
            <hr class="m-0 p-1">
            <div class="row bg-white darker">
                <div class="col-md-4">
                    <label for="">
                        <b>Ket. Rekomendasi</b>
                    </label>
                </div>
                <div class="col-md-8">
                    <?= $ajuan['ketRecDinsos']; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Ajuan -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-info">
            <h6 class="m-0 font-weight-bold text-white">Status Ajuan</h6>
        </div>
        <div class="card-body">
            <div class="row bg-white darker">
                <div class="col-md-4">
                    <label for="">
                        <b>Status</b>
                    </label>
                </div>
                <div class="col-md-8">
                    <?php if ($idStsAjuan == 2) { ?>
                        <span style="border-radius: 5px;" class="bg-gray-600 p-2 text-white">Untuk Direkomendasi</span>
                    <?php } elseif ($idStsAjuan <= 5 && $idStsAjuan >= 3) { ?>
                        <span style="border-radius: 5px;" class="bg-info p-2 text-white"><?= $StatusAjuan; ?></span>
                    <?php } elseif ($idStsAjuan == 6) { ?>
                        <span style="border-radius: 5px;" class="bg-warning p-2 text-white"><?= $StatusAjuan; ?></span>
                    <?php } elseif ($idStsAjuan == 7) { ?>
                        <span style="border-radius: 5px;" class="bg-success p-2 text-white"><?= $StatusAjuan; ?></span>
                    <?php } ?>
                </div>
            </div>
            <hr class="m-0 p-1">
            <?php if ($idStsAjuan >= 5) { ?>
                <div class="row bg-white darker">
                    <div class="col-md-4">
                        <label for="">
                            <b>Alasan</b>
                        </label>
                    </div>
                    <div class="col-md-8">
                        <?= $ajuan['ketRecSurvey']; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<!-- POST FORM AJUAN -->
<script type="text/javascript">
    $(document).ready(function() {

        $('.btnConfirm').click(function(e) {
            e.preventDefault();
            swal({
                    title: "Anda yakin?",
                    text: "Dengan mengkonfirmasi ajuan, Anda tidak dapat lagi merubah rekomendasi",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "post",
                            url: $(".formRekomendasi").attr('action'),
                            data: $(".formRekomendasi").serialize(),
                            dataType: "json",
                            beforeSend: function() {
                                $('.btnConfirm').prop('disabled', true);
                                $('.btnConfirm').html('<i class="fa fa-spin fa-spinner"></i>');
                            },
                            complete: function() {
                                $('.btnConfirm').prop('disabled', false);
                                $('.btnConfirm').html("<span class='icon text-white-50'><i class='fas fa-save'></i></span><span class='text'>Konfirmasi ke Kesra</span>");
                            },
                            success: function(response) {
                                if (response.error) {
                                    if (response.error.eSik) {
                                        swal("Mohon Maaf!", response.error.eSik, "error");
                                    } else if (response.error.rec) {
                                        swal("Mohon Maaf!", response.error.rec, "error");
                                    }
                                }
                                if (response.berhasil) {
                                    swal({
                                        title: "Sukses",
                                        text: response.berhasil.pesan,
                                        icon: "success",
                                        button: "Ok",
                                    }).then((value) => {
                                        window.location = response.berhasil.link;
                                    });
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                            }
                        });
                        return false;
                    } else {
                        return false;
                    }
                });
        });
    });
</script>

<?= $this->endSection(); ?>