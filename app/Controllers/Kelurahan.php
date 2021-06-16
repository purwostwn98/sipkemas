<?php

namespace App\Controllers;

use App\Models\PemohonModel;
use App\Models\FormulirModel;
use App\Models\AjuanModel;

class Kelurahan extends BaseController
{
    protected $pemohonModel;
    protected $formulirModel;
    protected $ajuanModel;
    public function __construct()
    {
        $this->pemohonModel = new PemohonModel();
        $this->formulirModel = new FormulirModel();
        $this->ajuanModel = new AjuanModel();
    }

    public function dtpemohon()
    {
        $konfirmasi = $this->request->getVar('konfirmasi');
        if ($konfirmasi == 'cfcd208495d565ef66e7dff9f98764da') {
            $kode = 0;
            $noFormulir = $this->request->getVar('no');
            $pemohon = $this->formulirModel->where('noFormulir', $noFormulir)
                ->join('eagama', 'eagama.idAgama = mformulir.idAgama')
                ->first();
        } elseif ($konfirmasi == 'c4ca4238a0b923820dcc509a6f75849b') {
            $kode = 1;
            $idPemohon = $this->request->getVar('idPemohon');
            $pemohon = $this->pemohonModel->where('idPemohon', $idPemohon)
                ->join('eagama', 'eagama.idAgama = mpemohon.idAgama')
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
        $data = [
            'bttn' => 'dftrpemohon',
            'pemohonBaru' => $this->formulirModel->findAll(),
            'pemohon_terdaftar' => $this->pemohonModel->findAll()
        ];
        return view('kelurahan/kel_dftrpemohon_i', $data);
    }

    //Konfirmasi Pendaftaran
    public function konfirmasi()
    {
        $status = $this->request->getVar('status');
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
        $idFormulir = $this->request->getVar('no');
        if ($this->formulirModel->delete($idFormulir)) {
            return redirect()->to('/kelurahan/dftrpemohon_i');
        }
    }

    public function hapusPemohon()
    {
        $idPemohon = $this->request->getVar('no');
        if ($this->pemohonModel->delete($idPemohon)) {
            return redirect()->to('/kelurahan/dftrpemohon_i');
        }
    }

    public function pengajuanBantuan()
    {
        if ($this->request->isAJAX()) {
            $idPemohon = $this->request->getVar('idPemohon');
            $noAjuan = random_int(00000000, 99999999);
            $cekNomorAjuan = $this->ajuanModel->where('noAjuan', $noAjuan)->countAllResults();
            while ($cekNomorAjuan >= 1) {
                $noAjuan = random_int(00000000, 99999999);
                $cekNomorAjuan = $this->ajuanModel->where('noAjuan', $noAjuan)->countAllResults();
            }
            $data = [
                'idPemohon' => $idPemohon,
                'noAjuan' => $noAjuan,
                'idStsAjuan' => 1,
                'idLbgAjuan' => 0
            ];
            if ($this->ajuanModel->save($data)) {
                $msg = [
                    'berhasil' => [
                        'noAjuan' => $noAjuan,
                        'link' => "/kelurahan/dftrpemohon_i"
                    ]
                ];
            }
            echo json_encode($msg);
        } else {
            exit("Maaf perintah tidak dapat diproses");
        }
    }

    public function dftrajuan_i()
    {
        $data = [
            'bttn' => 'dftrajuan',
            'ajuan_proses' => $this->ajuanModel
                ->where('trajuan.idStsAjuan <', 5)
                ->where('idLbgAjuan =', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->findAll(),
            'ajuan_selesai' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 5)
                ->where('idLbgAjuan =', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->findAll()
        ];
        // dd($data['ajuan_proses']);
        return view('kelurahan/kel_dftrajuan_i', $data);
    }

    public function dftrajuan_l()
    {
        $data = [
            'bttn' => 'dftrajuan',
        ];
        return view('kelurahan/kel_dftrajuan_l', $data);
    }

    public function detailajuan_i($noAjuan)
    {
        $ajuan = $this->ajuanModel->where('noAjuan', $noAjuan)
            ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
            ->first();
        $data = [
            'bttn' => 'dftrajuan',
            'ajuan' => $ajuan,
            'pemohon' => $this->pemohonModel->where('idPemohon', $ajuan['idPemohon'])
                ->join('eagama', 'eagama.idAgama = mpemohon.idAgama')
                ->first()
        ];
        return view('kelurahan/kel_detailajuan_i', $data);
    }
    public function detailajuan_l()
    {
        $data = [
            'bttn' => 'dftrajuan'
        ];
        return view('kelurahan/kel_detailajuan_l', $data);
    }
}
