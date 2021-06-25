<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Formulir Pendaftaran</h1>
</div>

<div id="accordion" class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
        <div>
            <a class="d-none d-sm-inline-block btn btn-sm btn-warning" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                Formulir Pendaftaran
            </a>
            <a class="d-none d-sm-inline-block btn btn-sm btn-success" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                Pemohon Terdaftar
            </a>
        </div>
        <!-- <a href="/pemohon/frpemohon" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-edit fa-sm text-white-50"></i> Tambah Pemohon</a> -->
    </div>
    <!-- Tabel Pemohon Baru (Belum Terdaftar) -->
    <div class="collapse show" id="collapseExample1" data-parent="#accordion">
        <div style="font-size: 12px;" class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr class="text-center" role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 5px;">No</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 5px;">No. Pendaftaran</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 45px;">NIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 70px;">Alamat</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 35px;">Tgl. Daftar</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 60px;">Status</th>
                                        <th aria-controls="dataTable" rowspan="1" colspan="1" style="width: 5px">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no1 = 0;
                                    foreach ($pemohonBaru as $new) : ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1 text-center"><?= $no1 + 1; ?></td>
                                            <td><?= $new['noFormulir']; ?></td>
                                            <td><?= $new['NIK']; ?></td>
                                            <td><?= $new['Nama']; ?></td>
                                            <td><?= $new['Alamat']; ?></td>
                                            <?php
                                            $blnthn = explode('-', $new['tgInput']);
                                            $tgl = explode(" ", $blnthn[2]);
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
                                            <td><?= $tgl[0] . ' ' . $bulan[(int)$blnthn[1]] . ' ' . $blnthn[0]; ?></td>
                                            <td class="text-center">
                                                <span style="border-radius: 5px;" class="p-1 small bg-warning text-white">Belum Terdaftar</span>
                                            </td>
                                            <td>

                                                <a href="/kelurahan/dtpemohon?konfirmasi=<?= md5(0); ?>&no=<?= $new['noFormulir']; ?>" class="btn btn-primary btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check fa-sm"></i>
                                                    </span>
                                                    <span class="text">Daftarkan</span>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php $no1++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tabel Pemohon Terdaftar -->
    <div class="collapse" id="collapseExample2" data-parent="#accordion">
        <div style="font-size: 12px;" class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable2" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr class="text-center" role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 15px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 45px;">NIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 70px;">Alamat</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 30px;">Jenis Kelamin</th>
                                        <th aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 5px;">Aksi</th>
                                        <!-- <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 25px;">Riwayat Ajuan</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no2 = 0;
                                    foreach ($pemohon_terdaftar as $pemohon) : ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1 text-center"><?= $no2 + 1; ?></td>
                                            <td><?= $pemohon['NIK']; ?></td>
                                            <td><?= $pemohon['Nama']; ?></td>
                                            <td><?= $pemohon['Alamat']; ?></td>
                                            <td><?= ($pemohon['gender'] == 1) ? 'Laki-laki' : 'Perempuan' ?></td>
                                            <td>
                                                <a href="/kelurahan/dtpemohon?konfirmasi=<?= md5(1); ?>&idPemohon=<?= $pemohon['idPemohon']; ?>" class="btn btn-danger btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-upload fa-sm"></i>
                                                    </span>
                                                    <span class="text">Ajukan Bantuan</span>
                                                </a>
                                            </td>
                                            <!-- <td class="text-center">0</td> -->
                                        </tr>
                                    <?php $no2++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>