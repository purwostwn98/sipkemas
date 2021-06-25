<?php

namespace App\Controllers;

class Gerbangska extends BaseController
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
            $this->session->setFlashdata('errorUser', $validation->getError('User'));
            $this->session->setFlashdata('errorPassword', $validation->getError('Password'));
            return redirect()->to('/gerbangska/index');
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

                    if ($row->idPrivUser == 2) {
                        return redirect()->to('/kelurahan/dftrpemohon_i');
                    } elseif ($row->idPrivUser == 3) {
                        return redirect()->to('/dinsos/dftrajuan_i');
                    } elseif ($row->idPrivUser == 4) {
                        return redirect()->to('/kesra/dftrajuan_i');
                    } elseif ($row->idPrivUser == 5) {
                        return redirect()->to('/mitra/dftrajuan_i');
                    }
                } else {
                    $this->session->setFlashdata('errorPassword', 'Maaf Password Anda salah');
                    return redirect()->to('/gerbangska/index');
                }
            } else {
                $this->session->setFlashdata('errorUser', 'Maaf User tidak ditemukan');
                return redirect()->to('/gerbangska/index');
            }
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/home/index');
    }

    //--------------------------------------------------------------------

}
