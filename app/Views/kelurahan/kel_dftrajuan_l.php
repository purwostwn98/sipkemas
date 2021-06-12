<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Ajuan Lembaga</h1>
</div>

<div id="accordion" class="card shadow mb-4">
    <div class="card-header py-3">
        <div>
            <a class="btn btn-sm btn-warning" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                Ajuan Dalam Proses
            </a>
            <a class="btn btn-sm btn-success" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                Ajuan Selesai
            </a>
        </div>
    </div>
    <div class="collapse show" id="collapseExample1" data-parent="#accordion">
        <div style="font-size: 12px;" class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th aria-controls="dataTable" rowspan="1" colspan="1" style="width: 7px;">-</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 5px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama Lembaga</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 40px;">Tgl. Ajuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 30px;">Jenis Bantuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status Ajuan: activate to sort column ascending" style="width: 30px;">Status Ajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/kelurahan/detailajuan_l">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">1</td>
                                        <td>Panti Asuhan A</td>
                                        <td>20 April 2021</td>
                                        <td>BAZNAS : Advokasi & Dakwah</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-info p-1"><i class="fa fa-clock-o mr-1"></i>Diproses Kesra</span>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/kelurahan/detailajuan_l">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">2</td>
                                        <td>Masjid Al Falah</td>
                                        <td>20 Februari 2021</td>
                                        <td>BAZNAS : Advokasi & Dakwah</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-info p-1"><i class="fa fa-clock-o mr-1"></i>Diproses Mitra</span>
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
                                    <tr role="row">
                                        <th aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 7px;">-</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 5px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama Lembaga</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 40px;">Tgl. Ajuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 30px;">Jenis Bantuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Status Ajuan: activate to sort column ascending" style="width: 30px;">Status Ajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="#">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">1</td>
                                        <td>Panti Asuhan A</td>
                                        <td>20 April 2021</td>
                                        <td>Paket A : Pembelian barang</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1"><i class="fa fa-clock-o mr-1"></i>Disetujui</span>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="#">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">2</td>
                                        <td>Masjid Al Falah</td>
                                        <td>20 Februari 2021</td>
                                        <td>Paket B : Pembelian Sembako</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-danger p-1"><i class="fa fa-clock-o mr-1"></i>Ditolak</span>
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
</div>



<?= $this->endSection(); ?>