<?php

namespace App\Controllers;

use App\Models\AjuanModel;
use App\Models\FormulirModel;
use App\Models\PemohonModel;

class Pemohon extends BaseController
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


    public function frpemohon()
    {
        $data['bttn'] = 'frpemohon';
        return view('pemohon/frpemohon', $data);
    }
    // public function ajuanbantuan()
    // {
    //     $data['bttn'] = 'ajuanbantuan';
    //     return view('pemohon/dftrbantuan', $data);
    // }
    // public function timeline()
    // {
    //     $data = ['bttn' => 'timelineajuan'];
    //     return view('pemohon/timelineajuan', $data);
    // }

    //proses
    public function proses_daftar()
    {
        if ($this->request->isAJAX()) {
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = '6LdlXhwbAAAAAJFSMK0WUDl4TffxdJc-eHnblZZB';
            $recaptcha_response = $this->request->getVar('g-recaptcha-response');

            $verify = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
            $recaptcha = json_decode($verify);
            if ($recaptcha->success == true) {
                $validation = \Config\Services::validation();
                $valid = $this->validate([
                    'NIK' => [
                        'label' => 'NIK',
                        'rules' => 'required|is_unique[mpemohon.NIK]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'is_unique' => 'Maaf, {field} sudah terdaftar'
                        ]
                    ],

                    'gender' => [
                        'label' => 'Jenis Kelamin',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                ]);

                if (!$valid) {
                    $msg = [
                        'error' => [
                            'Nik' => $validation->getError('NIK'),
                            'gender' => $validation->getError('gender'),
                        ]
                    ];
                } else {
                    $noDaftar = random_int(00000000, 99999999);
                    $noFormulir = "FR" . strval($noDaftar);
                    $data = [
                        'noFormulir' => $noFormulir,
                        'NIK' => $this->request->getVar('NIK'),
                        'Nama' => $this->request->getVar('nama'),
                        'tgLahir' => $this->request->getVar('tgLahir'),
                        'tempatLahir' => $this->request->getVar('tempatlahir'),
                        'Alamat' => $this->request->getVar('alamat'),
                        'idKel' => $this->request->getVar('kelurahan'),
                        'gender' => $this->request->getVar('gender'),
                        'idAgama' => $this->request->getVar('agama'),
                        'telepon' => $this->request->getVar('telepon'),
                        'email' => $this->request->getVar('email'),
                        // 'stsPendaftaran' => 0,
                    ];
                    $save = $this->formulirModel->insert($data);
                    if ($save) {
                        $msg = [
                            'berhasil' => [
                                'no' => $noFormulir,
                                'cetak' => "/pemohon/cetakForm/" . $noFormulir
                            ]
                        ];
                    }
                }
                echo json_encode($msg);
            } else {
                $msg = [
                    'a' => [
                        'b' => "Captcha tidak terverifikasi"
                    ]
                ];
                echo json_encode($msg);
            };
        }
    }

    //Cetak Formulir Pendaftaran
    public function cetakForm($noFormulir)
    {
        $data = [
            'pemohon' => $this->formulirModel->where('noFormulir', $noFormulir)
                ->join('eagama', 'eagama.idAgama = mformulir.idAgama')
                ->first()
        ];
        return view("landing/cetak_form", $data);
    }

    // Proses Cek Ajuan
    public function prosesCekAjuan()
    {
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = '6LdlXhwbAAAAAJFSMK0WUDl4TffxdJc-eHnblZZB';
        $recaptcha_response = $this->request->getVar('g-recaptcha-response');

        $verify = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($verify);
        if ($recaptcha->success == true) {
            $noAjuan = $this->request->getPost('noAjuan');
            $countAjuan = $this->ajuanModel->where('noAjuan', $noAjuan)->countAllResults();
            if ($countAjuan == 0) {
                session()->setFlashdata('pesan', 'Mohon maaf, nomor ajuan belum terdaftar');
                return redirect()->to('/home/cekAjuan');
            } elseif ($countAjuan > 1) {
                session()->setFlashdata('pesan', 'Mohon maaf, nomor ajuan anda tidak valid');
                return redirect()->to('/home/cekAjuan');
            } else {
                $ajuan = $this->ajuanModel->where('noAjuan', $noAjuan)->first();
                $dapat_session = [
                    'privUser' => 1,
                    'noAjuan' => $noAjuan,
                    'idPemohon' => $ajuan['idPemohon'],
                    'idStsAjuan' => $ajuan['idStsAjuan']
                ];
                $this->session->set($dapat_session);
                return redirect()->to('/pemohon/biodata');
            }
        } else {
            session()->setFlashdata('pesan', 'Mohon maaf, captcha anda tidak valid');
            return redirect()->to('/home/cekAjuan');
        }
    }

    public function biodata()
    {
        $idPemohon = $this->session->get('idPemohon');
        $data = [
            'bttn' => 'dtpemohon',
            'pemohon' => $this->pemohonModel->where('idPemohon', $idPemohon)
                ->join('eagama', 'eagama.idAgama = mpemohon.idAgama')
                ->first(),
        ];
        return view('/pemohon/biodata', $data);
    }

    public function form_ajuan()
    {
        $data['bttn'] = 'syarat_ketentuan';
        return view('pemohon/ajuan_form_v', $data);
    }
    public function alur_bantuan()
    {
        $data['bttn'] = 'alur_bantuan';
        return view('pemohon/alur_bantuan', $data);
    }
    public function syarat_ketentuan()
    {
        $data['bttn'] = 'syarat_ketentuan';
        return view('pemohon/syarat_ketentuan', $data);
    }
}
