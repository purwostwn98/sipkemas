<?php

namespace App\Controllers;

class Pemohon extends BaseController
{
    public function dtpemohon()
    {
        return view('pemohon/dtpemohon');
    }

    public function frpemohon()
    {
        return view('pemohon/frpemohon');
    }
}
