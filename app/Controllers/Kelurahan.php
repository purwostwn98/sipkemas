<?php

namespace App\Controllers;

use App\Models\PemohonModel;

class Kelurahan extends BaseController
{
    protected $pemohonModel;
    public function __construct()
    {
        $this->pemohonModel = new PemohonModel();
    }
    public function dftrpemohon_i()
    {
        $data = [
            'bttn' => 'dftrpemohon',
            'pemohonBaru' => $this->pemohonModel->where('stsPendaftaran', 0)->findAll(),
            'pemohon_terdaftar' => $this->pemohonModel->where('stsPendaftaran', 1)->findAll()
        ];
        return view('kelurahan/kel_dftrpemohon_i', $data);
    }
    public function dftrpemohon_l()
    {
        $data = [
            'bttn' => 'dftrpemohon'
        ];
        return view('kelurahan/kel_dftrpemohon_l', $data);
    }
    public function dftrajuan_i()
    {
        $data = [
            'bttn' => 'dftrajuan'
        ];
        return view('kelurahan/kel_dftrajuan_i', $data);
    }
    public function dftrajuan_l()
    {
        $data = [
            'bttn' => 'dftrajuan'
        ];
        return view('kelurahan/kel_dftrajuan_l', $data);
    }
    public function detailajuan_i()
    {
        $data = [
            'bttn' => 'dftrajuan'
        ];
        return view('kelurahan/kel_detailajuan_i', $data);
    }
    public function detailajuan_l()
    {
        $data = [
            'bttn' => 'dftrajuan'
        ];
        return view('kelurahan/kel_detailajuan_l', $data);
    }
    public function form_ajuan()
    {
        $data['bttn'] = 'syarat_ketentuan';
        return view('kelurahan/ajuan_form_v', $data);
    }
    public function alur_bantuan()
    {
        $data['bttn'] = 'alur_bantuan';
        return view('kelurahan/alur_bantuan', $data);
    }
    public function syarat_ketentuan()
    {
        $data['bttn'] = 'syarat_ketentuan';
        return view('kelurahan/syarat_ketentuan', $data);
    }
}
