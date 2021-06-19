<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="row d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col-auto">
        <h1 class="h3 mb-0 text-gray-800">Detail Ajuan</h1>
    </div>
    <div class="col-auto mt-4">
        <p>Status ajuan:
            <?php if ($ajuan['idStsAjuan'] <= 4) { ?>
                <span style="border-radius: 5px;" class="bg-info p-2 text-white"><?= $ajuan['StatusAjuan']; ?></span>
            <?php } elseif ($ajuan['idStsAjuan'] == 5) { ?>
                <span><?= $ajuan['StatusAjuan']; ?></span>
            <?php } elseif ($ajuan['idStsAjuan'] == 6) { ?>
                <span><?= $ajuan['StatusAjuan']; ?></span>
            <?php } ?>
        </p>
    </div>
</div>

<!-- Data Ajaun -->
<div class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between bg-info py-3">
        <h6 class="m-0 font-weight-bold text-white">Data Ajuan Bantuan</h6>
    </div>
    <div class="card-body">
        <div class="row bg-white darker">
            <div class="col-md-4">
                <label for="">
                    <b>Jenis Bantuan</b>
                </label>
            </div>
            <div class="col-md-8">
                <?= ($ajuan['idLbgAjuan'] == 0) ? 'Individu' : 'Lembaga' ?>
            </div>
        </div>
        <hr class="m-0 p-1">
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
                <?= $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0]; ?>
            </div>
        </div>
    </div>
</div>

<!-- Data Lembaga (Jika Lembaga) -->
<?php if ($ajuan['idLbgAjuan'] != 0) { ?>
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between bg-info py-3">
            <h6 class="m-0 font-weight-bold text-white">Data Lembaga</h6>
        </div>
        <div class="card-body">
            <div class="row bg-white darker">
                <div class="col-md-4">
                    <label for="">
                        <b>Nama Lembaga</b>
                    </label>
                </div>
                <div class="col-md-8">
                    <?= $lembaga['namaLembaga']; ?>
                </div>
            </div>
            <hr class="m-0 p-1">
            <div class="row bg-white darker">
                <div class="col-md-4">
                    <label for="">
                        <b>Alamat Lembaga</b>
                    </label>
                </div>
                <div class="col-md-8">
                    <?= $lembaga['alamat']; ?>
                </div>
            </div>
            <hr class="m-0 p-1">
            <div class="row bg-white darker">
                <div class="col-md-4">
                    <label for="">
                        <b>No. Lembaga</b>
                    </label>
                </div>
                <div class="col-md-8">
                    <?= $lembaga['Akta']; ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Dokumen Syarat -->
<div class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between bg-info py-3">
        <h6 class="m-0 font-weight-bold text-white">Dokumen Pendukung</h6>
    </div>
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