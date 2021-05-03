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
    public function detailajuan_i()
    {
        return view('kelurahan/detailajuan_i');
    }
}
