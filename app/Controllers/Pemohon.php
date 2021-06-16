<?php

namespace App\Controllers;

use App\Models\FormulirModel;
use App\Models\PemohonModel;

class Pemohon extends BaseController
{
    protected $pemohonModel;
    protected $formulirModel;
    public function __construct()
    {
        $this->pemohonModel = new PemohonModel();
        $this->formulirModel = new FormulirModel();
    }

    public function dtpemohon()
    {
        $konfirmasi = $this->request->getVar('konfirmasi');
        if ($konfirmasi == 0) {
            $noFormulir = $this->request->getVar('no');
            $pemohon = $this->formulirModel->where('noFormulir', $noFormulir)
                ->join('eagama', 'eagama.idAgama = mformulir.idAgama')
                ->first();
        } elseif ($konfirmasi == 1) {
            $idPemohon = $this->request->getVar('idPemohon');
            $pemohon = $this->pemohonModel->where('idPemohon', $idPemohon)
                ->join('eagama', 'eagama.idAgama = mpemohon.idAgama')
                ->first();
        }
        $data = [
            'bttn' => 'dtpemohon',
            'konfirmasi' => $konfirmasi,
            'pemohon' => $pemohon
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
}
