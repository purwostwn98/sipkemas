<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Syarat & Ketentuan</h1>

</div>
<div class="card border-left-info shadow h-100">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <p>
                    Untuk melanjutkan proses berikutnya Anda terlebih dahulu membaca dan memahami
                    syarat dan ketentuan yang berlaku dalam proses pengajuan ini. Dengan mengakses
                    atau menggunakan situs SIPKE-MAS, informasi yang disediakan oleh atau badan situs,
                    bearti Anda telah memahami dan menyetujui serta terikat dan tunduk dengan segala
                    syarat dan ketentuan yang berlaku dalam situs ini.
                </p>
            </div>
        </div>
    </div>
</div>
<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 70rem;" src="<?= base_url(); ?>/img/syarat.jpeg" alt="">
<div class="row mb-0">
    <div class="col checkbox">
        <label for="persetujuan"><input type="checkbox" name="persetujuan" id="persetujuan" required="">
            Saya setuju dengan syarat dan ketentuan
        </label>
        <p style="border-radius: 5px;" class="text-center text-white small bg-info p-1">*Silahkan checklist setuju untuk melanjutkan</p>
    </div>
</div>
<br>
<div class="row mt-0">
    <div class="col text-center">
        <a href="/kelurahan/form_ajuan" class="btn btn-success btn-md btn-icon-split"><span class="icon text-white-50"> <i class="fas fa-check"></i></span><span class="text">Lanjutkan</span></a>&nbsp;&nbsp;
    </div>
</div>
<?= $this->endSection(); ?>