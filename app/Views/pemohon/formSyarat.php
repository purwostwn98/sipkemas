<!-- <div class="card-body unggahSyarat"> -->
<?php $no = 0;
foreach ($Syarat as $syarat) : ?>
    <div class="row">
        <div class="col-sm-1"> </div>
        <div class="col-sm-4">
            <label for=""><?= $syarat['Syarat']; ?></label>
        </div>
        <div class="col-sm-4">
            <div class="form-group has-danger">
                <input type="hidden" name="labelSyarat[]" value="<?= $syarat['Syarat']; ?>">
                <input type="hidden" name="idSyarat[]" value="<?= $syarat['idSyarat']; ?>">
                <input class="form-control col-sm-12  border-left-info animated--grow-in" type="file" id="files" name="files[]">
            </div>
        </div>
    </div>
<?php $no++;
endforeach ?>
<input type="hidden" name="jmlSyarat" value="<?= $no; ?>">

<!-- </div> -->