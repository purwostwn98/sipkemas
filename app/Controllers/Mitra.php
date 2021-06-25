<?php

namespace App\Controllers;

use App\Models\AjuanModel;
use App\Models\PemohonModel;
use App\Models\UploadModel;
use App\Models\AjuanLbgModel;
use CodeIgniter\I18n\Time;

class Mitra extends BaseController
{
    protected $ajuanModel;
    protected $pemohonModel;
    protected $uploadModel;
    protected $ajuanLbgModel;
    public function __construct()
    {
        $this->ajuanModel = new AjuanModel();
        $this->pemohonModel = new PemohonModel();
        $this->uploadModel = new UploadModel();
        $this->ajuanLbgModel = new AjuanLbgModel();
    }

    public function dftrajuan_i()
    {
        $data = [
            'bttn' => 'mit_dftrajuan',
            'ajuan_baru' => $this->ajuanModel
                ->where('trajuan.idStsAjuan', 4)
                ->where('idJnsAjuan', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->findAll(),
            'ajuan_proses' => $this->ajuanModel
                ->where('trajuan.idStsAjuan', 5)
                ->where('idJnsAjuan', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->findAll(),
            'ajuan_selesai' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 6)
                ->where('idJnsAjuan', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->findAll()
        ];
        return view('mitra/dftrajuan_i', $data);
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
