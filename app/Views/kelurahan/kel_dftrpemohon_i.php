<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pemohon</h1>
</div>

<div id="accordion" class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
        <div>
            <a class="d-none d-sm-inline-block btn btn-sm btn-warning" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                Ajuan Pendaftaran
            </a>
            <a class="d-none d-sm-inline-block btn btn-sm btn-success" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                Pemohon Terdaftar
            </a>
        </div>
        <a href="/pemohon/frpemohon" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-edit fa-sm text-white-50"></i> Tambah Pemohon</a>
    </div>
    <div class="collapse show" id="collapseExample1" data-parent="#accordion">
        <div style="font-size: 12px;" class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr class="text-center" role="row">
                                        <th aria-controls="dataTable" rowspan="1" colspan="1" style="width: 5px">-</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 5px;">No</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 45px;">NIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 70px;">Alamat</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 30px;">Jenis Kelamin</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 25px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/pemohon/dtpemohon?konfirmasi=0">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">1</td>
                                        <td>3312201901980001</td>
                                        <td>Michael Admin</td>
                                        <td>RT.02/RW.04 Danukusuman</td>
                                        <td>Laki-laki</td>
                                        <td class="text-center">
                                            <span style="border-radius: 5px;" class="p-1 bg-warning text-white">Belum Terdaftar</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse" id="collapseExample2" data-parent="#accordion">
        <div style="font-size: 12px;" class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable2" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr class="text-center" role="row">
                                        <th aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 5px;">-</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 5px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 45px;">NIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 70px;">Alamat</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 30px;">Jenis Kelamin</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 25px;">Riwayat Ajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/pemohon/dtpemohon?konfirmasi=1">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">1</td>
                                        <td>3312201901980001</td>
                                        <td>Purwo Setiawan</td>
                                        <td>RT.02/RW.04 Danukusuman</td>
                                        <td>Laki-laki</td>
                                        <td class="text-center">2</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/pemohon/dtpemohon">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">2</td>
                                        <td>3312201901980001</td>
                                        <td>Wawan</td>
                                        <td>RT.02/RW.10 Danukusuman</td>
                                        <td>Perempuan</td>
                                        <td class="text-center">1</td>
                                    </tr>

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