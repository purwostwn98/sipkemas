<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Ajuan</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Ajuan Bantuan Lembaga</h6>
    </div>
    <div style="font-size: 12px;" class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th aria-controls="dataTable" rowspan="1" colspan="1" style="width: 10px;">-</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 10px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 62px;">Nama Lembaga</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tgl. Ajuan: activate to sort column ascending" style="width: 40px;">Tgl. Ajuan</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Jenis Bantuan: activate to sort column ascending" style="width: 30px;">Jenis Bantuan</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status Ajuan: activate to sort column ascending" style="width: 14%;">Status Ajuan</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 30px;">Keterangan Lembaga</th>
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
                                        <span style="border-radius: 5px;" class="small text-white bg-warning p-1"><i class="fa fa-clock-o mr-1"></i>Belum Diverifikasi</span>
                                    </td>
                                    <td>

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
                                        <span style="border-radius: 5px;" class="small text-white bg-success p-1"><i class="fa fa-clock-o mr-1"></i>Terverivikasi</span>
                                    </td>
                                    <td>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, laborum consectetur ab magni dignissimos perspiciatis consequuntur aperiam blanditiis.
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



<?= $this->endSection(); ?>