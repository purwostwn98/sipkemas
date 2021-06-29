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
        $idMitra = $this->session->get('idLembaga');
        $data = [
            'bttn' => 'mit_dftrajuan',
            'ajuan_baru' => $this->ajuanModel
                ->where('trajuan.idStsAjuan', 4)
                ->where('idJnsAjuan', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->where('trbantuan.idMitra', $idMitra)
                ->findAll(),
            'ajuan_proses' => $this->ajuanModel
                ->where('trajuan.idStsAjuan', 5)
                ->where('idJnsAjuan', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->where('trbantuan.idMitra', $idMitra)
                ->findAll(),
            'ajuan_selesai' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 6)
                ->where('idJnsAjuan', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->where('trbantuan.idMitra', $idMitra)
                ->findAll()
        ];
        return view('mitra/dftrajuan_i', $data);
    }
    public function dftrajuan_l()
    {
        $idMitra = $this->session->get('idLembaga');
        $data = [
            'bttn' => 'mit_dftrajuan',
            'ajuan_baru' => $this->ajuanModel
                ->where('trajuan.idStsAjuan', 4)
                ->where('idJnsAjuan', 1)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->join('trlembaga', 'trlembaga.idAjuan = trajuan.idAjuan')
                ->where('trbantuan.idMitra', $idMitra)
                ->findAll(),
            'ajuan_proses' => $this->ajuanModel
                ->where('trajuan.idStsAjuan', 5)
                ->where('idJnsAjuan', 1)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->join('trlembaga', 'trlembaga.idAjuan = trajuan.idAjuan')
                ->where('trbantuan.idMitra', $idMitra)
                ->findAll(),
            'ajuan_selesai' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 6)
                ->where('idJnsAjuan', 1)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->join('trlembaga', 'trlembaga.idAjuan = trajuan.idAjuan')
                ->where('trbantuan.idMitra', $idMitra)
                ->findAll()
        ];
        return view('mitra/dftrajuan_l', $data);
    }
    public function detailajuan_i($noAjuan)
    {
        $ajuan = $this->ajuanModel->where('noAjuan', $noAjuan)
            ->join('estatusajuan as sts', 'sts.idStsAjuan = trajuan.idStsAjuan')
            ->first();
        $data = [
            'bttn' => 'mit_dftrajuan',
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
        return view('mitra/detailajuan_i', $data);
    }

    public function detailajuan_l($noAjuan)
    {
        $ajuan = $this->ajuanModel->where('noAjuan', $noAjuan)
            ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
            ->join('estatusajuan as sts', 'sts.idStsAjuan = trajuan.idStsAjuan')
            ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
            ->first();
        $data = [
            'bttn' => 'mit_dftrajuan',
            'ajuan' => $ajuan,
            'idStsAjuan' => $ajuan['idStsAjuan'],
            'StatusAjuan' => $ajuan['StatusAjuan'],
            'pemohon' => $this->pemohonModel->where('idPemohon', $ajuan['idPemohon'])
                ->join('eagama', 'eagama.idAgama = mpemohon.idAgama')
                ->join('ekelurahan', 'ekelurahan.idKel = mpemohon.idKel')
                ->join('ekecamatan', 'ekecamatan.idKec = ekelurahan.idKec')
                ->first(),
            'lembaga' => $this->ajuanLbgModel->where('idAjuan', $ajuan['idAjuan'])->first(),
            'dokumen' => $this->uploadModel->where('idAjuan', $ajuan['idAjuan'])
                ->join('trsyarat', 'trsyarat.idSyarat = trupload.idSyarat')
                ->findAll()
        ];
        return view('mitra/detailajuan_l', $data);
    }

    public function doTindakan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'persetujuan' => [
                    'label' => 'persetujuan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Anda harus memilih salah satu {field}'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'persetujuan' => $validation->getError('persetujuan'),
                    ]
                ];
            } else {
                // Jika disetujui maka nilai bantuan wajib
                if ($this->request->getVar('persetujuan') == 1) {
                    //validasi nilai bantuan
                    $valid2 = $this->validate([
                        'nilai' => [
                            'label' => 'Nilai bantuan',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} tidak boleh kosong'
                            ]
                        ],
                    ]);
                    if (!$valid2) {
                        $msg = [
                            'error' => [
                                'nilai' => $validation->getError('nilai'),
                            ]
                        ];
                        echo json_encode($msg);
                        return FALSE;
                    }
                }
                if ($this->request->getVar('persetujuan') == 1) {
                    $idStsAjuan = 7;
                } elseif ($this->request->getVar('persetujuan') == 2) {
                    $idStsAjuan = 5;
                } elseif ($this->request->getVar('persetujuan') == 3) {
                    $idStsAjuan = 6;
                }
                // rubah format nilai
                $strNilaiDisetujui = $this->request->getVar('nilai');
                $numbNilaiDisetujui = str_replace(".", "", $strNilaiDisetujui);

                $data = [
                    'nilaiDisetujui' => $numbNilaiDisetujui,
                    'ketRecSurvey' => $this->request->getVar('alasan'),
                    'tgRecSurvey' => new Time('now', 'Asia/Jakarta', 'en_US'),
                    'idStsAjuan' => $idStsAjuan
                ];
                $save = $this->ajuanModel->where('idAjuan', $this->request->getVar('idAjuan'))->set($data)->update();
                if ($save) {
                    $msg = [
                        'berhasil' => [
                            'pesan' => "Hasil berhasil dikirim",
                            'link' => "/mitra/dftrajuan_i"
                        ]
                    ];
                } else {
                    $msg = [
                        'error' => [
                            'rec' => "Gagal simpan",
                        ]
                    ];
                }
            }

            echo json_encode($msg);
        }
    }
}
