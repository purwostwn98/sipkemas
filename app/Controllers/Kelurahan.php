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
                'idStsAjuan' => 1
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
            'ajuan_proses' => $this->ajuanModel->where('trajuan.idStsAjuan <', 5)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->findAll(),
            'ajuan_selesai' => $this->ajuanModel->where('trajuan.idStsAjuan >=', 5)
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
            'bttn' => 'dftrajuan'
        ];
        return view('kelurahan/kel_dftrajuan_l', $data);
    }
    public function detailajuan_i()
    {
        $data = [
            'bttn' => 'dftrajuan'
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
    public function form_ajuan()
    {
        $data['bttn'] = 'syarat_ketentuan';
        return view('kelurahan/ajuan_form_v', $data);
    }
    public function alur_bantuan()
    {
        $data['bttn'] = 'alur_bantuan';
        return view('kelurahan/alur_bantuan', $data);
    }
    public function syarat_ketentuan()
    {
        $data['bttn'] = 'syarat_ketentuan';
        return view('kelurahan/syarat_ketentuan', $data);
    }
}
