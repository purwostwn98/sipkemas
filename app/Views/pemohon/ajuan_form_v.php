<?= $this->extend("/layout/template.php"); ?>
<?= $this->section("konten"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Formulir Ajuan Bantuan</h1>

</div>
<!-- Form Ajuan -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ajuan Bantuan</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <label for="">Jenis Bantuan</label>
            </div>
            <div class="col-sm-4">
                <div class="form-group has-danger">
                    <select class="form-control col-sm-12  border-left-info animated--grow-in" name="jnsbantuan" id="div" onchange="getval(this);">
                        <option value="1">Individu</option>
                        <option value="2">Lembaga</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <label for="">Program Bantuan</label>
            </div>
            <div class="col-sm-6">
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
                <label for="">Nilai Ajuan</label>
            </div>
            <div class="col-sm-6">
                <div class="form-group has-danger">
                    <input type="number" class="form-control col-sm-12  border-left-info animated--grow-in" name="kebutuhan" id="kebutuhan" placeholder="1000000">
                    <small id="nilai" class="form-text text-primary"><i>Isikan nominal bantuan yang dibutuhkan misalnya 750000</i></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-4">
                <label for="">Deskripsi Permohonan</label>
            </div>
            <div class="col-sm-6">
                <div class="form-group has-danger">
                    <textarea type="text" rows="3" class="form-control col-sm-12  border-left-info animated--grow-in" name="tutor" id="tutor" value=""></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Identitas Lembaga -->
<div id="form_lembaga" style="display: none;" class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Identitas Lembaga</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <label for="">Nama Lembaga</label>
            </div>
            <div class="col-sm-6">
                <div class="form-group has-danger">
                    <input type="text" class="form-control col-sm-12  border-left-info animated--grow-in" name="tutor" id="tutor" value="">
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <label for="">Alamat Lembaga</label>
            </div>
            <div class="col-sm-6">
                <div class="form-group has-danger">
                    <input type="text" class="form-control col-sm-12  border-left-info animated--grow-in" name="tutor" id="tutor" value="">
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <label for="">No. Lembaga</label>
            </div>
            <div class="col-sm-6">
                <div class="form-group has-danger">
                    <input type="text" class="form-control col-sm-12  border-left-info animated--grow-in" name="tutor" id="tutor" value="">
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
</div>
<!-- Persyaratan Ajuan -->
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
                    Menyatakan bahwa apa yang tertulis pada formulir dan syarat yang diunggah benar adanya dan bersedia dibatalkan ajuannya apabila
                    data tidak valid.</label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4"> </div>
            <button class="btn btn-success btn-md btn-icon-split" target="_blank" onclick="tombol()"><span class="icon text-white-50"> <i class="fas fa-check"></i></span><span class="text">Ajukan</span></button>&nbsp;&nbsp;
            <button class="btn btn-danger btn-md btn-icon-split" onclick="del(this.value)" value="A310190001"><span class="icon text-white-50"> <i class="fas fa-trash"></i></span><span class="text">Batal</span></button>
        </div>
    </div>
</div>

<script>
    function getval(sel) {
        if (sel.value == "1") {
            $("#form_lembaga").css("display", "none");
        } else if (sel.value == "2") {
            $("#form_lembaga").css("display", "block");
        }
    }
</script>
<?= $this->endSection(); ?>