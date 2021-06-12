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
                Permintaan Persetujuan
            </a>
            <a class="btn btn-sm btn-secondary" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                Perlu Survey
            </a>
            <a class="btn btn-sm btn-success" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                Ajuan Selesai
            </a>
        </div>
    </div>

    <!-- Tabel Permintaa Persetujuan -->
    <div class="collapse show" id="collapseExample1" data-parent="#accordion">
        <div style="font-size: 12px;" class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr class="text-center" role="row">
                                        <th aria-controls="dataTable" rowspan="1" colspan="1" style="width: 10px;">-</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 10px;">No</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 45px;">NIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 40px;">Tgl. Ajuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 30px;">Jenis Bantuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 30px;">E-SIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 30px;">Rekomendasi</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status Ajuan: activate to sort column ascending" style="width: 30px;">Status Ajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/mitra/detailajuan_i?status=new">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">1</td>
                                        <td>3312201901984489</td>
                                        <td>Michael User</td>
                                        <td>30 April 2021</td>
                                        <td>LAZIS : Santunan Gizi Yatim</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1">Terdaftar</span>
                                        </td>
                                        <td>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-gray-600 p-1">To Approve</span>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/mitra/detailajuan_i?status=new">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">2</td>
                                        <td>3312207801987789</td>
                                        <td>Salosa Kurniawan</td>
                                        <td>20 Februari 2021</td>
                                        <td>LAZIS: Bantuan Paket Internet</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1">Terdaftar</span>
                                        </td>
                                        <td>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                        </td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-gray-600 p-1">To Approve</span>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/mitra/detailajuan_i?status=new">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">3</td>
                                        <td>6712207801987789</td>
                                        <td>Fulandari</td>
                                        <td>19 Januari 2021</td>
                                        <td>PMI: Dompet Kemanusiaan</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1"><i class="fa fa-clock-o mr-1"></i>Terdaftar</span>
                                        </td>
                                        <td>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-gray-600 p-1">To Approve</span>
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
    <!-- Tebel Proses Survey -->
    <div class="collapse" id="collapseExample2" data-parent="#accordion">
        <div style="font-size: 12px;" class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable1" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr class="text-center" role="row">
                                        <th aria-controls="dataTable1" rowspan="1" colspan="1" style="width: 10px;">-</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 10px;">No</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 45px;">NIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 40px;">Tgl. Ajuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 30px;">Jenis Bantuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 30px;">E-SIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 30px;">Rekomendasi</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Status Ajuan: activate to sort column ascending" style="width: 30px;">Status Ajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/mitra/detailajuan_i?status=survey">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">1</td>
                                        <td>3312201901984489</td>
                                        <td>Jojo Anonim</td>
                                        <td>30 April 2021</td>
                                        <td>PMI : PMI Griya Bahagia</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1">Terdaftar</span>
                                        </td>
                                        <td>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-info p-1">Survey</span>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/mitra/detailajuan_i?status=survey">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">2</td>
                                        <td>3312207801987789</td>
                                        <td>Salosa Kurniawan</td>
                                        <td>20 Februari 2021</td>
                                        <td>LAZIS : Pendidikan Yatim</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1">Terdaftar</span>
                                        </td>
                                        <td>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                        </td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-info p-1">Survey</span>
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
    <!-- Tabel Ajuan Selesai -->
    <div class="collapse" id="collapseExample3" data-parent="#accordion">
        <div style="font-size: 12px;" class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable2" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr class="text-center" role="row">
                                        <th aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 10px;">-</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 10px;">No</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 45px;">NIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 40px;">Tgl. Ajuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 30px;">Jenis Bantuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 30px;">E-SIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 30px;">Rekomendasi</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" aria-label="Status Ajuan: activate to sort column ascending" style="width: 30px;">Status Ajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/mitra/detailajuan_i?status=selesai">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">1</td>
                                        <td>3317801901984489</td>
                                        <td>Jojo Anonim</td>
                                        <td>30 April 2021</td>
                                        <td>PMI : PMI Griya Bahagia</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1">Terdaftar</span>
                                        </td>
                                        <td>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star"></span>
                                        </td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1">Disetujui</span>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="/mitra/detailajuan_i?status=selesai">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="sorting_1">2</td>
                                        <td>9912207801987789</td>
                                        <td>Salosa Kurniawan</td>
                                        <td>20 Februari 2021</td>
                                        <td>LAZIS : Pendidikan Yatim</td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-success p-1">Terdaftar</span>
                                        </td>
                                        <td>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star oke"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </td>
                                        <td>
                                            <span style="border-radius: 5px;" class="small text-white bg-danger p-1">Ditolak</span>
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