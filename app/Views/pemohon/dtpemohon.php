<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pemohon</h1>
    <a href="/pemohon/frpemohon" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-edit fa-sm text-white-50"></i> Edit Data</a>
</div>

<!-- Content Row Data Pemohon-->

<div class="row py-1 bg-white darker">
    <div class="col-md-4">
        <label for="">
            <b>Nomor Induk Kependudukan (NIK)</b>
            <br>
            <span class="text-primary">
                <i>National Identification Number</i>
            </span></label>
    </div>
    <div class="col-md-8">
        3312201901980001
    </div>
</div>

<div class="row py-1">
    <div class="col-md-4">
        <label for="">
            <b>Nama Lengkap</b>
            <br>
            <span class="text-primary">
                <i>Full Name</i>
            </span></label>
    </div>
    <div class="col-md-8">
        Purwo Setiawan
    </div>
</div>

<div class="row py-1 bg-white darker">
    <div class="col-md-4">
        <label for="">
            <b>Tempat, Tanggal Lahir</b>
            <br>
            <span class="text-primary">
                <i>Place, Date of Birth</i>
            </span></label>
    </div>
    <div class="col-md-8">
        Surakarta, 19 Januari 1998
    </div>
</div>

<div class="row py-1">
    <div class="col-md-4">
        <label for="">
            <b>Jenis Kelamin</b>
            <br>
            <span class="text-primary">
                <i>Gender</i>
            </span></label>
    </div>
    <div class="col-md-8">
        Laki-laki
    </div>
</div>

<div class="row py-1 bg-white darker">
    <div class="col-md-4">
        <label for="">
            <b>Alamat</b>
            <br>
            <span class="text-primary">
                <i>Address</i>
            </span></label>
    </div>
    <div class="col-md-8">
        Jl. Brigjen Sudiarto No. 34
    </div>
</div>

<div class="row py-1">
    <div class="col-md-4">
        <label for="">
            <b>Kelurahan</b>
            <br>
            <span class="text-primary">
                <i>Sub-district</i>
            </span></label>
    </div>
    <div class="col-md-8">
        Danukusuman
    </div>
</div>

<div class="row py-1 bg-white darker">
    <div class="col-md-4">
        <label for="">
            <b>Kecamatan</b>
            <br>
            <span class="text-primary">
                <i>Districts</i>
            </span></label>
    </div>
    <div class="col-md-8">
        Serengan
    </div>
</div>

<div class="row py-1">
    <div class="col-md-4">
        <label for="">
            <b>Agama</b>
            <br>
            <span class="text-primary">
                <i>Religion</i>
            </span></label>
    </div>
    <div class="col-md-8">
        Islam
    </div>
</div>

<div class="row py-1 bg-white darker">
    <div class="col-md-4">
        <label for="">
            <b>Telepon</b>
            <br>
            <span class="text-primary">
                <i>Telephone</i>
            </span></label>
    </div>
    <div class="col-md-8">
        085647053296
    </div>
</div>

<div class="row py-1">
    <div class="col-md-4">
        <label for="">
            Email
            <br>
            <span class="text-primary">
                <i>E-mail</i>
            </span></label>
    </div>
    <div class="col-md-8">
        purwostwn98@gmail.com
    </div>
</div>

<div class="row py-1 bg-white darker">
    <div class="col-md-4">
        <label for="">
            Foto Kartu Keluarga
            <!-- <br>
            <span class="text-primary">
                <i>E-mail</i>
            </span></label> -->
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
        Lihat
    </button>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Kartu Keluarga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">
                        <img class="myImg" id="myImg2" src="<?= base_url(); ?>/img/kk.jpeg" alt="KTP" style="width:100%;max-width:800px">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row py-1 ">
    <div class="col-md-4">
        <label for="">
            Foto KTP
            <!-- <br>
            <span class="text-primary">
                <i>E-mail</i>
            </span></label> -->
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ktpModal">
        Lihat
    </button>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="ktpModal" tabindex="-1" role="dialog" aria-labelledby="ktpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ktpModalLabel">Foto KTP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">
                        <img class="myImg" id="myImg2" src="<?= base_url(); ?>/img/ktp.jpeg" alt="KTP" style="width:100%;max-width:800px">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>