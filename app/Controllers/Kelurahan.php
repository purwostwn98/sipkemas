<?php

namespace App\Controllers;

class Kelurahan extends BaseController
{
    public function dftrpemohon_i()
    {
        return view('kelurahan/kel_dftrpemohon_i');
    }
    public function dftrpemohon_l()
    {
        return view('kelurahan/kel_dftrpemohon_l');
    }
    public function dftrajuan_i()
    {
        return view('kelurahan/kel_dftrajuan_i');
    }
    public function dftrajuan_l()
    {
        return view('kelurahan/kel_dftrajuan_l');
    }
    public function detailajuan_i()
    {
        return view('kelurahan/kel_detailajuan_i');
    }
    public function detailajuan_l()
    {
        return view('kelurahan/kel_detailajuan_l');
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
