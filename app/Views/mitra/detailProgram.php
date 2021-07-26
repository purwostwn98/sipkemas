<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Program</h1>
    <a href="/kesra/editProgram?kode=<?= $bantuan['idBantuan']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm ml-2"><i class="far fa-edit text-white-50"></i> Edit</a>
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- Data Program -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Program</h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="staticEmail" style="font-weight: bold;" class="col-sm-4">Kode Bantuan</label>
                    <div class="col-sm-8">
                        <p><?= $bantuan['kodeBantuan']; ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stsProgram" style="font-weight: bold;" class="col-sm-4">Status Program</label>
                    <div class="col-sm-8">
                        <?= ($bantuan['StatusProgram'] == 'active') ? 'Aktif' : 'Tidak Aktif' ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaProgram" style="font-weight: bold;" class="col-sm-4">Nama Program</label>
                    <div class="col-sm-8">
                        <?= $bantuan['namaProgram']; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desProgram" style="font-weight: bold;" class="col-sm-4">Deskripsi Program</label>
                    <div class="col-sm-8">
                        <?= $bantuan['desBantuan']; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Syarat Program -->
        <div class="card shadow mb-4">
            <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Syarat Program</h6>
            </div>
            <div class="card-body">
                <?php if ($syaratProgram == 0) { ?>
                    <p>Belum ada syarat untuk program ini</p>
                <?php } else { ?>
                    <table class="table">
                        <thead class="bg-info text-white">
                            <tr>
                                <th class="text-center" scope="col">Syarat</th>
                                <th class="text-center" scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($syaratProgram as $syarat) { ?>
                                <tr>
                                    <td scope="row"><?= $syarat['Syarat']; ?></td>
                                    <td scope="row" class="text-center"><?= ($syarat['StatusSyarat'] == 'active') ? 'Aktif' : 'Tidak aktif' ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="d-sm-flex align-content-center justify-content-center mb-3">
    <a href="/mitra/dftprogram" class="btn btn-md btn-secondary btn-icon-split mr-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left fa-md"></i>
        </span>
        <span class="text">Kembali</span>
    </a>
</div>



<?= $this->endSection(); ?>