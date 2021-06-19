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
        'Nama', 'tgLahir', 'tempatLahir', 'gender', 'NIK', 'Alamat', 'idKel', 'tgInput', 'updated_at', 'idAgama',
        'telepon', 'email'
    ];
}
class FormulirModel extends Model
{
    protected $table      = 'mformulir';
    protected $primaryKey = 'idFormulir';
    protected $useTimestamps = true;
    protected $createdField  = 'tgInput';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = [
        'noFormulir', 'Nama', 'tgLahir', 'tempatLahir', 'gender', 'NIK', 'Alamat', 'idKel', 'tgInput', 'updated_at', 'idAgama',
        'telepon', 'email'
    ];
}

class KecamatanModel extends Model
{
    protected $table      = 'ekecamatan';
    protected $primaryKey = 'idKec';
}
class KelurahanModel extends Model
{
    protected $table      = 'ekelurahan';
    protected $primaryKey = 'idKel';
}
