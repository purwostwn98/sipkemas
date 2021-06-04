<?php

namespace App\Controllers;

class Dinsos extends BaseController
{
    public function dftrajuan_i()
    {
        return view('dinsos/sos_dftrajuan_i');
    }
    public function dftrajuan_l()
    {
        return view('dinsos/sos_dftrajuan_l');
    }
    public function detailajuan_i()
    {
        $data = [
            "status" => $this->request->getVar('status')
        ];
        return view('dinsos/sos_detailajuan_i', $data);
    }
}
