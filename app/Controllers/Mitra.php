<?php

namespace App\Controllers;

class Mitra extends BaseController
{
    public function dftrajuan_i()
    {
        return view('mitra/dftrajuan_i');
    }
    public function dftrajuan_l()
    {
        return view('mitra/dftrajuan_l');
    }
    public function detailajuan_i()
    {
        $data = [
            'status' => $this->request->getVar('status')
        ];
        return view('mitra/detailajuan_i', $data);
    }
    public function detailajuan_l()
    {
        $data = [
            'status' => $this->request->getVar('status')
        ];
        return view('mitra/detailajuan_l', $data);
    }
}
