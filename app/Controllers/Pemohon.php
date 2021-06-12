<?php

namespace App\Controllers;

use App\Models\PemohonModel;

class Pemohon extends BaseController
{
    protected $pemohonModel;
    public function __construct()
    {
        $this->pemohonModel = new PemohonModel();
    }

    public function dtpemohon()
    {
        $konfirmasi = $this->request->getVar('konfirmasi');
        $noDaftar = $this->request->getVar('no');
        $data = [
            'bttn' => 'dtpemohon',
            'konfirmasi' => $konfirmasi,
            'pemohon' => $this->pemohonModel->where('noDaftar', $noDaftar)
                ->join('eagama', 'eagama.idAgama = mpemohon.idAgama')
                ->first()
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
                // $msg = [
                //     'a' => [
                //         'b' => "Captcha Berhasil"
                //     ]
                // ];
                // echo json_encode($msg);
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
                    $noDaftar = random_int(1000, 4000);
                    $data = [
                        'noDaftar' => $noDaftar,
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
                        'stsPendaftaran' => 0,
                    ];
                    $save = $this->pemohonModel->insert($data);
                    if ($save) {
                        $msg = [
                            'berhasil' => [
                                'no' => $noDaftar
                            ]
                        ];
                    }
                }
                echo json_encode($msg);
            } else {
                $msg = [
                    'a' => [
                        'b' => "Captcha Gagal"
                    ]
                ];
                echo json_encode($msg);
            };
        }
    }

    //Konfirmasi Pendaftaran
    public function konfirmasi()
    {
        $noDaftar = $this->request->getVar('no');
        $status = $this->request->getVar('konfirmasi');
        $data = [
            'stsPendaftaran' => $status
        ];
        if ($this->pemohonModel->set($data)->where('noDaftar', $noDaftar)->update()) {
            return redirect()->to('/kelurahan/dftrpemohon_i');
        }
    }

    public function hapus()
    {
        $idPemohon = $this->request->getVar('no');
        if ($this->pemohonModel->delete($idPemohon)) {
            return redirect()->to('/kelurahan/dftrpemohon_i');
        }
    }
}
