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
}
