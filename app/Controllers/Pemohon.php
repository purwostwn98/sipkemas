<?php

namespace App\Controllers;

class Pemohon extends BaseController
{
    public function dtpemohon()
    {
        $konfirmasi = $this->request->getVar('konfirmasi');
        $data = [
            'bttn' => 'dtpemohon',
            'konfirmasi' => $konfirmasi
        ];
        return view('pemohon/dtpemohon', $data);
    }
    public function frpemohon()
    {
        $data['bttn'] = 'frpemohon';
        return view('pemohon/frpemohon', $data);
    }
    public function ajuanbantuan()
    {
        $data['bttn'] = 'ajuanbantuan';
        return view('pemohon/dftrbantuan', $data);
    }
    public function timeline()
    {
        $data = ['bttn' => 'timelineajuan'];
        return view('pemohon/timelineajuan', $data);
    }
}
