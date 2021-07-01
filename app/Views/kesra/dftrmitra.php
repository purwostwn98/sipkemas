<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Forum Kesra</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table">
            <thead class="bg-info text-white">
                <tr>
                    <th style="width: 10%;" class="text-center" scope="col">ID Mitra</th>
                    <th scope="col">Nama Mitra</th>
                    <th scope="col">Alamat</th>
                    <th class="text-center" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-light border-bottom-info">
                <?php foreach ($mitra as $mit) { ?>
                    <tr class="bg-white">
                        <th class="text-center" scope="row"><?= $mit['idMitra']; ?></th>
                        <td style="font-weight: bold;"><?= $mit['NamaMitra']; ?></td>
                        <td><?= $mit['Alamat']; ?></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-warning btn-circle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>





<?= $this->endSection(); ?>