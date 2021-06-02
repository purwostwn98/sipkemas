<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">FORM AJUAN BANTUAN</h1>

</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pemohon</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">NIK</label>
            </div>
            <div class="col-sm-4">
                <div class="form-group has-danger"><input type="text" class="form-control col-sm-12  border-left-info animated--grow-in" name="tutor" id="tutor" value="33104720212830002"> </div>
            </div>

            <div class="col-sm-1">
                <button class="btn btn-info btn-circle" onclick="ceknim(this.value)"><i class="fas fa-search"></i></button>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Nama Pemohon</label>
            </div>
            <div class="col-sm-4">
                <div class="form-group has-danger"><input type="text" class="form-control col-sm-12  border-left-info animated--grow-in" name="tutor" id="tutor" value="Sugeng Raharjo"> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Scan KTP/SIM</label>
            </div>
            <div class="col-sm-4">
                <div class="form-group has-danger">
                    <input class="form-control col-sm-12  border-left-info animated--grow-in" type="file" id="files" name="files">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Alamat</label>
            </div>
            <div class="col-sm-6">
                <div class="form-group has-danger"><input type="text" class="form-control col-sm-12  border-left-info animated--grow-in" name="tutor" id="tutor" value="Kp. Laweyan"> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">No. Telepon</label>
            </div>
            <div class="col-sm-2">
                <div class="form-group has-danger"><input type="text" class="form-control col-sm-12  border-left-info animated--grow-in" name="tutor" id="tutor" value=""> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Email</label>
            </div>
            <div class="col-sm-2">
                <div class="form-group has-danger"><input type="text" class="form-control col-sm-12  border-left-info animated--grow-in" name="tutor" id="tutor" value=""> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <label for="permohonan_jenis">
                    Jenis Kelamin <span class="req">*</span>
                </label>
            </div>
            <div class="col-sm-4">
                <div class="radio">
                    <label for="permohonan_jenis_1"><input type="radio" name="permohonan_jenis" id="permohonan_jenis_1" value="Bantuan Modal Usaha" required=""> Laki-laki</label>
                </div>
                <div class="radio">
                    <label for="permohonan_jenis_2"><input type="radio" name="permohonan_jenis" id="permohonan_jenis_2" value="Bantuan Umum" required=""> Perempuan</label>
                </div>
            </div>
        </div>




    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ajuan Bantuan</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <label for="">Program Bantuan</label>
            </div>
            <div class="col-sm-4">
                <div class="form-group has-danger">

                    <select class="form-control col-sm-12  border-left-info animated--grow-in" name="div" id="div">
                        <option value="1" disabled="" selected="" style="display:none;">Baznas:Program Bantuan Pendidikan</option>
                        <option value="2">Baznas:Program Bantuan Ekonomi Produktif</option>
                        <option value="3">Baznas:Program Bantuan Kesehatan</option>
                        <option value="4">Baznas:Program Baznas Ndandani Omah</option>
                        <option value="5">Baznas:Program Bantuan Dakwah & Advokasi</option>
                        <option value="6">Baznas:Program Bantuan Kemanusiaan</option>
                        <option value="7">Lazismu:Program Bantuan Pendidikan</option>
                        <option value="8">Dinas Sosial:Program Bantuan Masyarakat Miskin</option>
                        <option value="9">PMI:Program Bantuan Alat Bantu Difabel</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Jumlah Ajuan</label>
            </div>
            <div class="col-sm-2">
                <div class="form-group has-danger"><input type="text" class="form-control col-sm-12  border-left-info animated--grow-in" name="tutor" id="tutor" value="1000000"> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Deskripsi Permohonan</label>
            </div>
            <div class="col-sm-6">
                <div class="form-group has-danger"><input type="text" class="form-control col-sm-12  border-left-info animated--grow-in" name="tutor" id="tutor" value=""> </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Persyaratan Bantuan</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Scan Kartu Keluarga</label>
            </div>
            <div class="col-sm-4">
                <div class="form-group has-danger">
                    <input class="form-control col-sm-12  border-left-info animated--grow-in" type="file" id="files" name="files">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Scan KTP</label>
            </div>
            <div class="col-sm-4">
                <div class="form-group has-danger">
                    <input class="form-control col-sm-12  border-left-info animated--grow-in" type="file" id="files" name="files">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Foto Kondisi 1</label>
            </div>
            <div class="col-sm-4">
                <div class="form-group has-danger">
                    <input class="form-control col-sm-12  border-left-info animated--grow-in" type="file" id="files" name="files">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Foto Kondisi 2</label>
            </div>
            <div class="col-sm-4">
                <div class="form-group has-danger">
                    <input class="form-control col-sm-12  border-left-info animated--grow-in" type="file" id="files" name="files">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Foto Kondisi 3</label>
            </div>
            <div class="col-sm-4">
                <div class="form-group has-danger">
                    <input class="form-control col-sm-12  border-left-info animated--grow-in" type="file" id="files" name="files">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Dokumen Pendukung</label>
            </div>
            <div class="col-sm-4">
                <div class="form-group has-danger">
                    <input class="form-control col-sm-12  border-left-info animated--grow-in" type="file" id="files" name="files">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="checkbox">
                <label for="persetujuan"><input type="checkbox" name="persetujuan" id="persetujuan" required="">
                    Menyatakan bahwa apa yang tertulis pada formulir benar adanya dan berhak menerima bantuan yang diajukan.</label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4"> </div>
            <button class="btn btn-success btn-md btn-icon-split" target="_blank" onclick="tombol()"><span class="icon text-white-50"> <i class="fas fa-check"></i></span><span class="text">Simpan</span></button>&nbsp;&nbsp;
            <button class="btn btn-danger btn-md btn-icon-split" onclick="del(this.value)" value="A310190001"><span class="icon text-white-50"> <i class="fas fa-trash"></i></span><span class="text">Batal</span></button>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>