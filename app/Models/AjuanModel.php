<?php

namespace App\Models;

use CodeIgniter\Model;

class AjuanModel extends Model
{
    protected $table      = 'trajuan';
    protected $primaryKey = 'idAjuan';
    protected $useTimestamps = true;
    protected $createdField  = 'tgAjuan';
    protected $updatedField  = 'tgHasil';
    protected $allowedFields = [
        'noAjuan', 'idPemohon', 'tgAjuan', 'idBantuan', 'Keperluan', 'Kebutuhan', 'idStsAjuan', 'idRecDinsos', 'ketRecDinsos',
        'tgRecDinsos', 'idRecKesra', 'ketRecKesra', 'tgRecKesra', 'idRecSurvey', 'ketRecSurvey', 'tgRecSurvey', 'tgHasil',
        'nilaiDisetujui', 'jnsBantuan', 'lastEditor', 'eSik', 'idLbgAjuan'
    ];
}
