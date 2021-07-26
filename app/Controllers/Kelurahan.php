<?php

namespace App\Controllers;

use App\Models\PemohonModel;
use App\Models\FormulirModel;
use App\Models\AjuanModel;
use App\Models\UploadModel;
use App\Models\AjuanLbgModel;


class Kelurahan extends BaseController
{
    protected $pemohonModel;
    protected $formulirModel;
    protected $ajuanModel;
    protected $uploadModel;
    protected $ajuanLbgModel;




    public function __construct()
    {
        $this->session = session();

        $this->pemohonModel = new PemohonModel();
        $this->formulirModel = new FormulirModel();
        $this->ajuanModel = new AjuanModel();
        $this->uploadModel = new UploadModel();
        $this->ajuanLbgModel = new AjuanLbgModel();


        //print_r('x');exit;
        //return view('/kelurahan/kel_dftrpemohon_i');
        //$nama =$this->session->get('privUser');
        //if ($nama == '3'){print_r($nama); exit;}


    }

    //cek privilege sbg petugas kelurahan
    public function cek()
    {
        if ($this->session->get('privUser') <> '2') {
            $this->session->destroy();
            return redirect()->to('/home/index');
            exit;
        }
    }
    public function dtpemohon()
    {

        $this->cek();
        $konfirmasi = $this->request->getVar('konfirmasi');
        if ($konfirmasi == 'cfcd208495d565ef66e7dff9f98764da') {
            $kode = 0;
            $noFormulir = $this->request->getVar('no');
            $pemohon = $this->formulirModel->where('noFormulir', $noFormulir)
                ->join('eagama', 'eagama.idAgama = mformulir.idAgama')
                ->join('ekelurahan', 'ekelurahan.idKel = mformulir.idKel')
                ->join('ekecamatan', 'ekecamatan.idKec = ekelurahan.idKec')
                ->first();
        } elseif ($konfirmasi == 'c4ca4238a0b923820dcc509a6f75849b') {
            $kode = 1;
            $idPemohon = $this->request->getVar('idPemohon');
            $pemohon = $this->pemohonModel->where('idPemohon', $idPemohon)
                ->join('eagama', 'eagama.idAgama = mpemohon.idAgama')
                ->join('ekelurahan', 'ekelurahan.idKel = mpemohon.idKel')
                ->join('ekecamatan', 'ekecamatan.idKec = ekelurahan.idKec')
                ->first();
        }
        $data = [
            'bttn' => 'dtpemohon',
            'konfirmasi' => $kode,
            'pemohon' => $pemohon
        ];
        return view('kelurahan/dtpemohon', $data);
    }
    public function dftrpemohon_i()
    {

        $this->cek();
        $idKelurahan = $this->session->get('idLembaga');
        $data = [
            'bttn' => 'dftrpemohon',
            'pemohonBaru' => $this->formulirModel
                ->where('idKel', $idKelurahan)
                ->findAll(),
            'pemohon_terdaftar' => $this->pemohonModel->where('idKel', $idKelurahan)
                ->findAll(),
        ];
        return view('kelurahan/kel_dftrpemohon_i', $data);
    }

    //Konfirmasi Pendaftaran
    public function konfirmasi()
    {
        $this->cek();
        $data = [
            'NIK' => $this->request->getVar('nik'),
            'Nama' => $this->request->getVar('nama'),
            'tempatLahir' => $this->request->getVar('tempatLahir'),
            'tgLahir' => $this->request->getVar('tgLahir'),
            'gender' => $this->request->getVar('gender'),
            'Alamat' => $this->request->getVar('alamat'),
            'idKel' => $this->request->getVar('kelurahan'),
            'idAgama' => $this->request->getVar('agama'),
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
        ];
        if ($this->pemohonModel->save($data)) {
            $idFormulir = $this->request->getVar('idFormulir');
            $this->formulirModel->delete($idFormulir);
            return redirect()->to('/kelurahan/dftrpemohon_i');
        }
    }

    public function hapusForm()
    {
        $this->cek();
        $idFormulir = $this->request->getVar('no');
        if ($this->formulirModel->delete($idFormulir)) {
            return redirect()->to('/kelurahan/dftrpemohon_i');
        }
    }

    public function hapusPemohon()
    {
        $this->cek();
        $idPemohon = $this->request->getVar('no');
        $riwayatAjuan = $this->ajuanModel->where('idPemohon', $idPemohon)->countAllResults();
        if ($riwayatAjuan >= 1) {
            $this->session->setFlashdata('dontDelete', 'Maaf pemohon tidak dapat dihapus, karena sudah masuk di riwayat ajuan');
            return redirect()->to("/kelurahan/dtpemohon?konfirmasi=c4ca4238a0b923820dcc509a6f75849b&idPemohon=$idPemohon");
        } else {
            if ($this->pemohonModel->delete($idPemohon)) {
                return redirect()->to('/kelurahan/dftrpemohon_i');
            }
        }
    }

    public function pengajuanBantuan()
    {
        $this->cek();
        if ($this->request->isAJAX()) {
            $idPemohon = $this->request->getVar('idPemohon');
            $noAjuan = random_int(00000000, 99999999);
            $cekNomorAjuan = $this->ajuanModel->where('noAjuan', $noAjuan)->countAllResults();
            while ($cekNomorAjuan >= 1) {
                $noAjuan = random_int(00000000, 99999999);
                $cekNomorAjuan = $this->ajuanModel->where('noAjuan', $noAjuan)->countAllResults();
            }
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'eSik' => [
                    'label' => 'E-SIK',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Mohon pilih status {field} pemohon'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'esik' => $validation->getError('eSik'),
                    ]
                ];
            } else {
                $data = [
                    'idPemohon' => $idPemohon,
                    'noAjuan' => $noAjuan,
                    'eSik' => $this->request->getVar('eSik'),
                    'idStsAjuan' => 1,
                    'idJnsAjuan' => 0
                ];
                if ($this->ajuanModel->save($data)) {
                    $msg = [
                        'berhasil' => [
                            'noAjuan' => $noAjuan,
                            'link' => "/kelurahan/dftrpemohon_i"
                        ]
                    ];
                }
            }
            echo json_encode($msg);
        } else {
            exit("Maaf perintah tidak dapat diproses");
        }
    }

    public function dftrajuan_i()
    {
        $this->cek();
        $idKelurahan = $this->session->get('idLembaga');
        $data = [
            'bttn' => 'dftrajuan',
            'ajuan_baru' => $this->ajuanModel
                ->where('trajuan.idStsAjuan', 1)
                ->where('idJnsAjuan =', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->where('idKel', $idKelurahan)
                ->findAll(),
            'ajuan_proses' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 2)
                ->where('trajuan.idStsAjuan <=', 5)
                ->where('idJnsAjuan =', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->where('idKel', $idKelurahan)
                ->findAll(),
            'ajuan_selesai' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 6)
                ->where('idJnsAjuan =', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->where('idKel', $idKelurahan)
                ->findAll()
        ];

        return view('kelurahan/kel_dftrajuan_i', $data);
    }

    public function dftrajuan_l()
    {
        $this->cek();
        $idKelurahan = $this->session->get('idLembaga');
        $data = [
            'bttn' => 'dftrajuan',
            'ajuan_proses' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 2)
                ->where('trajuan.idStsAjuan <=', 5)
                ->where('trajuan.idJnsAjuan =', 1)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->join('trlembaga', 'trlembaga.idAjuan = trajuan.idAjuan')
                ->where('idKel', $idKelurahan)
                ->findAll(),
            'ajuan_selesai' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 6)
                ->where('trajuan.idJnsAjuan =', 1)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->join('trlembaga', 'trlembaga.idAjuan = trajuan.idAjuan')
                ->where('idKel', $idKelurahan)
                ->findAll()

        ];
        return view('kelurahan/kel_dftrajuan_l', $data);
    }

    public function detailajuan_i($noAjuan)
    {
        $this->cek();
        $ajuan = $this->ajuanModel->where('noAjuan', $noAjuan)
            ->join('estatusajuan as sts', 'sts.idStsAjuan = trajuan.idStsAjuan')
            ->first();
        $data = [
            'bttn' => 'dftrajuan',
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
        return view('kelurahan/kel_detailajuan_i', $data);
    }

    public function detailajuan_l($noAjuan)
    {
        $this->cek();
        $ajuan = $this->ajuanModel->where('noAjuan', $noAjuan)
            ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
            ->join('estatusajuan as sts', 'sts.idStsAjuan = trajuan.idStsAjuan')
            ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
            ->first();
        $data = [
            'bttn' => 'dftrajuan',
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
        return view('kelurahan/kel_detailajuan_l', $data);
    }
}
