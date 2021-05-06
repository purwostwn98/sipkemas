<?php

namespace App\Controllers;

class Login extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function cekuser()
    {
        if ($this->request->isAJAX()) {
            $User = $this->request->getVar('User');
            $pass = $this->request->getVar('Password');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'User' => [
                    'label' => 'User',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

                'Password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'User' => $validation->getError('User'),
                        'Password' => $validation->getError('Password'),
                    ]
                ];
            } else {
                $cek_database = $this->db->query("SELECT * FROM muser 
                WHERE User='$User'");

                $result = $cek_database->getResult();

                if (count($result) > 0) {
                    $row = $cek_database->getRow();
                    $pass_tabel = $row->Password;

                    if ($pass == $pass_tabel) {
                        $dapat_session = [
                            'login' => true,
                            'namauser' => $row->Namauser,
                            'user' => $row->User,
                            'id_lembaga' => $row->idLembaga,
                            'privUser' => $row->idPrivUser,
                            'email' => $row->email,
                            'telepon' => $row->telepon
                        ];
                        $this->session->set($dapat_session);
                        $msg = [
                            'berhasil' => [
                                'link' => '/pemohon/dtpemohon'
                            ]
                        ];
                    } else {
                        $msg = [
                            'error' => [
                                'Password' => 'Maaf Password Anda salah'
                            ]
                        ];
                    }
                } else {
                    $msg = [
                        'error' => [
                            'User' => 'Maaf User tidak ditemukan'
                        ]
                    ];
                }
            }
            echo json_encode($msg);
        } else {
            exit("Tidak dapat diproses");
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/home/index');
    }

    //--------------------------------------------------------------------

}
