<?php

namespace App\Models;

use CodeIgniter\Model;

class PemohonModel extends Model
{
    protected $table      = 'mpemohon';
    protected $primaryKey = 'idPemohon';
    protected $useTimestamps = true;
    protected $createdField  = 'tgInput';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = [
        'noDaftar', 'Nama', 'tgLahir', 'tempatLahir', 'gender', 'NIK', 'Alamat', 'idKel', 'tgInput', 'updated_at', 'idAgama',
        'telepon', 'email', 'stsPendaftaran'
    ];
}
