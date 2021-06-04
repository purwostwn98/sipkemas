<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Ajuan Individu</h1>
</div>

<div id="accordion" class="card shadow mb-4">
    <div class="card-header py-3">
        <div>
            <a class="btn btn-sm btn-warning" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                Ajuan Bantuan
            </a>
            <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                Ajuan Dalam Proses
            </a>
            <a class="btn btn-sm btn-success" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
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
                                    <tr class="text-center" role="row">
                                        <th aria-controls="dataTable" rowspan="1" colspan="1" style="width: 5px;">-</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 5px;">No</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 20px;">NIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 40px;">Tgl. Ajuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 30px;">Jenis Bantuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 30px;">E-SIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status Ajuan: activate to sort column ascending" style="width: 40px;">Status Ajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/kesra/detailajuan_i?status=fromdinsos">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">1</td>
                                        <td>3312201901980001</td>
                                        <td>Sarno</td>
                                        <td>20 April 2021</td>
                                        <td>Paket A : Pembelian barang</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1"><i class="fa fa-clock-o mr-1"></i>Terdaftar</span>
                                        </td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-info p-1"><i class="fa fa-clock-o mr-1"></i>Dari Dinsos</span>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/kesra/detailajuan_i?status=new">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">2</td>
                                        <td>3312201901980889</td>
                                        <td>Salosa Kurniawan</td>
                                        <td>20 Februari 2021</td>
                                        <td>Paket B : Pembelian Sembako</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1"><i class="fa fa-clock-o mr-1"></i>Terdaftar</span>
                                        </td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-gray-600 p-1"><i class="fa fa-clock-o mr-1"></i>Ajuan Baru</span>
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
                            <table class="table table-bordered dataTable" id="dataTable1" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr class="text-center" role="row">
                                        <th aria-controls="dataTable1" rowspan="1" colspan="1" style="width: 5px;">-</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 5px;">No</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 20px;">NIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 40px;">Tgl. Ajuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 30px;">Jenis Bantuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 30px;">E-SIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 20px;">Rekomendasi</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Status Ajuan: activate to sort column ascending" style="width: 89px;">Status Ajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/kesra/detailajuan_i?status=proses">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">1</td>
                                        <td>3312201901980889</td>
                                        <td>Anto</td>
                                        <td>20 April 2021</td>
                                        <td>Paket A : Pembelian barang</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1"><i class="fa fa-clock-o mr-1"></i>Terdaftar</span>
                                        </td>
                                        <td class="text-center">
                                            -
                                        </td>
                                        <td class="text-center">
                                            <span style="border-radius: 5px;" class="text-center small text-white bg-info p-1">Tunggu Dinsos</span>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/kesra/detailajuan_i?status=proses">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">2</td>
                                        <td>7689001901980889</td>
                                        <td>Salosa Kurniawan</td>
                                        <td>20 Februari 2021</td>
                                        <td>Paket B : Pembelian Sembako</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1">Terdaftar</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star"></span>
                                        </td>
                                        <td class="text-center">
                                            <span style="border-radius: 5px;" class="text-center small text-white bg-success p-1">Tunggu Mitra</span>
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
    <div class="collapse" id="collapseExample3" data-parent="#accordion">
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
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 40px;">NIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 40px;">Tgl. Ajuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 30px;">Jenis Bantuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 30px;">E-SIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Status Ajuan: activate to sort column ascending" style="width: 35px;">Status Ajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/kesra/detailajuan_i?status=selesai">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">1</td>
                                        <td>3312201901980889</td>
                                        <td>Anto</td>
                                        <td>20 April 2021</td>
                                        <td>Paket A : Pembelian barang</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1"><i class="fa fa-clock-o mr-1"></i>Terdaftar</span>
                                        </td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-danger p-1"><i class="fa fa-clock-o mr-1"></i>Ditolak</span>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/kesra/detailajuan_i/status=selesai">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">2</td>
                                        <td>7689001901980889</td>
                                        <td>Salosa Kurniawan</td>
                                        <td>20 Februari 2021</td>
                                        <td>Paket B : Pembelian Sembako</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1"><i class="fa fa-clock-o mr-1"></i>Terdaftar</span>
                                        </td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1"><i class="fa fa-clock-o mr-1"></i>Disetujui</span>
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