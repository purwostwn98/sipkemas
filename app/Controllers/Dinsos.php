<?php

namespace App\Controllers;

use App\Models\AjuanModel;
use App\Models\PemohonModel;
use App\Models\UploadModel;
use CodeIgniter\I18n\Time;

class Dinsos extends BaseController
{
    protected $ajuanModel;
    protected $pemohonModel;
    protected $uploadModel;
    public function __construct()
    {
        $this->session = session();

        $this->ajuanModel = new AjuanModel();
        $this->pemohonModel = new PemohonModel();
        $this->uploadModel = new UploadModel();
    }


    //cek privilege sbg petugas dinsos
    public function cek()
    {
        if ($this->session->get('privUser') <> '3') {
            $this->session->destroy();
            return redirect()->to('/home/index');
            exit;
        }
    }

    public function dftrajuan_i()
    {
        $this->cek();
        $data = [
            'bttn' => 'sos_dftrajuan',
            'ajuan_baru' => $this->ajuanModel
                ->where('trajuan.idStsAjuan', 2)
                ->where('idJnsAjuan', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->findAll(),
            'ajuan_proses' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 3)
                ->where('trajuan.idStsAjuan <=', 5)
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
        return view('dinsos/sos_dftrajuan_i', $data);
    }
    public function detailajuan_i($noAjuan)
    {
        $this->cek();
        $ajuan = $this->ajuanModel->where('noAjuan', $noAjuan)
            ->join('estatusajuan as sts', 'sts.idStsAjuan = trajuan.idStsAjuan')
            ->first();
        $data = [
            'bttn' => 'sos_dftrajuan',
            'ajuan' => $this->ajuanModel->where('noAjuan', $noAjuan)
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('estatusajuan as sts', 'sts.idStsAjuan = trajuan.idStsAjuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->first(),
            'idStsAjuan' => $ajuan['idStsAjuan'],
            'StatusAjuan' => $ajuan['StatusAjuan'],
            'pemohon' => $this->pemohonModel->where('idPemohon', $ajuan['idPemohon'])
                ->join('eagama', 'eagama.idAgama = mpemohon.idAgama')
                ->join('ekelurahan', 'ekelurahan.idKel = mpemohon.idKel')
                ->join('ekecamatan', 'ekecamatan.idKec = ekelurahan.idKec')
                ->first(),
            'dokumen' => $this->uploadModel->where('idAjuan', $ajuan['idAjuan'])
                ->join('trsyarat', 'trsyarat.idSyarat = trupload.idSyarat')
                ->findAll()
        ];
        return view('dinsos/sos_detailajuan_i', $data);
    }

    public function updateAjuan()
    {
        $this->cek();
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'eSik' => [
                    'label' => 'E-SIK',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'rekomendasi' => [
                    'label' => 'rekomendasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Anda harus memilih salah satu {field}'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'eSik' => $validation->getError('eSik'),
                        'rec' => $validation->getError('rekomendasi'),
                        'token' => csrf_hash(),
                    ]
                ];
            } else {
                $data = [
                    'eSik' => $this->request->getVar('eSik'),
                    'idRecDinsos' => $this->request->getVar('rekomendasi'),
                    'ketRecDinsos' => $this->request->getVar('ketRecDinsos'),
                    //'tgRecDinsos' => date('Y-m-d'),
                    'tgRecDinsos' => new Time('now', 'Asia/Jakarta', 'en_US'),
                    'idStsAjuan' => 3
                ];
                $save = $this->ajuanModel->where('idAjuan', $this->request->getVar('idAjuan'))->set($data)->update();
                if ($save) {
                    $msg = [
                        'berhasil' => [
                            'pesan' => "Rekomendasi berhasil dikirim",
                            'link' => "/dinsos/dftrajuan_i"
                        ]
                    ];
                } else {
                    $msg = [
                        'error' => [
                            'rec' => "Gagal simpan",
                            'token' => csrf_hash(),
                        ]
                    ];
                }
            }

            echo json_encode($msg);
        }
    }
}
