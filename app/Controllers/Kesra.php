<?php

namespace App\Controllers;

class Kesra extends BaseController
{
    public function dftrajuan_i()
    {
        return view('kesra/dftrajuan_i');
    }
    public function dftrajuan_l()
    {
        return view('kesra/dftrajuan_l');
    }
    public function detailajuan_i()
    {
        $data = [
            'status' => $this->request->getVar('status')
        ];
        return view('kesra/detailajuan_i', $data);
    }
    public function detailajuan_l()
    {
        $data = [
            'status' => $this->request->getVar('status')
        ];
        return view('kesra/detailajuan_l', $data);
    }
}
