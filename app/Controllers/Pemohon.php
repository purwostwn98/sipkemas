<?php

namespace App\Controllers;

use App\Models\AjuanModel;
use App\Models\BantuanModel;
use App\Models\SyaratModel;
use App\Models\FormulirModel;
use App\Models\PemohonModel;
use App\Models\UploadModel;
use App\Models\AjuanLbgModel;
use CodeIgniter\I18n\Time;
use Mpdf\Mpdf;
use TheSeer\Tokenizer\Token;

class Pemohon extends BaseController
{
    protected $pemohonModel;
    protected $formulirModel;
    protected $ajuanModel;
    protected $bantuanModel;
    protected $syaratModel;
    protected $uploadModel;
    protected $ajuanLbgModel;
    public function __construct()
    {
        $this->pemohonModel = new PemohonModel();
        $this->formulirModel = new FormulirModel();
        $this->ajuanModel = new AjuanModel();
        $this->bantuanModel = new BantuanModel();
        $this->syaratModel = new SyaratModel();
        $this->uploadModel = new UploadModel();
        $this->ajuanLbgModel = new AjuanLbgModel();
    }


    public function frpemohon()
    {
        $data['bttn'] = 'frpemohon';
        return view('pemohon/frpemohon', $data);
    }

    //proses
    public function proses_daftar()
    {
        if ($this->request->isAJAX()) {
            $security = \Config\Services::security();
            // $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            // $recaptcha_secret = '6LdlXhwbAAAAAJFSMK0WUDl4TffxdJc-eHnblZZB';
            // $recaptcha_response = $this->request->getVar('g-recaptcha-response');

            // $verify = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
            // $recaptcha = json_decode($verify);
            $hslbenar = $this->request->getVar('hslbenar');
            $jawaban = $this->request->getVar('jawabCpt');
            if (md5($jawaban) == $hslbenar) {
                $validation = \Config\Services::validation();
                $valid = $this->validate([
                    'NIK' => [
                        'label' => 'NIK',
                        'rules' => 'required|is_unique[mpemohon.NIK]|exact_length[16]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'is_unique' => 'Maaf, {field} sudah terdaftar',
                            'exact_length' => '{field} harus 16 angka'
                        ]
                    ],
                    'gender' => [
                        'label' => 'Jenis Kelamin',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'nama' => [
                        'label' => 'Nama',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'tempatlahir' => [
                        'label' => 'Tempat lahir',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'tgLahir' => [
                        'label' => 'Tanggal lahir',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'alamat' => [
                        'label' => 'Alamat',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'kecamatan' => [
                        'label' => 'Kecamatan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'kelurahan' => [
                        'label' => 'Kelurahan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'telepon' => [
                        'label' => 'Telepon',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'agama' => [
                        'label' => 'Agama',
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
                            'nama' => $validation->getError('nama'),
                            'tempatlahir' => $validation->getError('tempatlahir'),
                            'tgLahir' => $validation->getError('tgLahir'),
                            'alamat' => $validation->getError('alamat'),
                            'kecamatan' => $validation->getError('kecamatan'),
                            'kelurahan' => $validation->getError('kelurahan'),
                            'agama' => $validation->getError('agama'),
                            'telepon' => $validation->getError('telepon'),
                            'token' => csrf_hash(),
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
                        'b' => "Hasil perhitungan Anda salah",
                        'token' => csrf_hash(),
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
                ->join('ekelurahan', 'ekelurahan.idKel = mformulir.idKel')
                ->join('ekecamatan', 'ekecamatan.idKec = ekelurahan.idKec')
                ->first()
        ];
        return view("landing/cetak_form", $data);
    }

    // Proses Cek Ajuan
    public function prosesCekAjuan()
    {
        // $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        // $recaptcha_secret = '6LdlXhwbAAAAAJFSMK0WUDl4TffxdJc-eHnblZZB';
        // $recaptcha_response = $this->request->getVar('g-recaptcha-response');

        // $verify = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        // $recaptcha = json_decode($verify);
        $hslbenar = $this->request->getVar('hslbenar');
        $jawaban = $this->request->getVar('jawabCpt');
        //if ($recaptcha->success == true) {
        if (md5($jawaban) == $hslbenar) {
            $noAjuan = $this->request->getPost('noAjuan');
            $countAjuan = $this->ajuanModel->where('noAjuan', $noAjuan)->countAllResults();
            if ($countAjuan == 0) {
                session()->setFlashdata('pesan', 'Mohon maaf, nomor ajuan belum terdaftar');
                return redirect()->to('/home/cekAjuan');
            } elseif ($countAjuan > 1) {
                session()->setFlashdata('pesan', 'Mohon maaf, nomor ajuan anda tidak valid');
                return redirect()->to('/home/cekAjuan');
            } else {
                $ajuan = $this->ajuanModel->where('noAjuan', $noAjuan)
                    ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                    ->first();
                $dapat_session = [
                    'login' => true,
                    'privUser' => 1,
                    'namauser' => $ajuan['Nama'],
                    'idAjuan' => $ajuan['idAjuan'],
                    'noAjuan' => $noAjuan,
                    'idPemohon' => $ajuan['idPemohon'],
                    'eSik' => $ajuan['eSik'],
                    'idStsAjuan' => $ajuan['idStsAjuan']
                ];
                $this->session->set($dapat_session);
                return redirect()->to('/pemohon/biodata');
            }
        } else {
            session()->setFlashdata('pesan', 'Mohon maaf, hasil perhitungan Anda salah');
            return redirect()->to('/home/cekAjuan');
        }
    }

    // setelah ini harus login dulu
    public function biodata()
    {
        $idPemohon = $this->session->get('idPemohon');
        $data = [
            'bttn' => 'dtpemohon',
            'pemohon' => $this->pemohonModel->where('idPemohon', $idPemohon)
                ->join('eagama', 'eagama.idAgama = mpemohon.idAgama')
                ->join('ekelurahan', 'ekelurahan.idKel = mpemohon.idKel')
                ->join('ekecamatan', 'ekecamatan.idKec = ekelurahan.idKec')
                ->first(),
        ];
        return view('/pemohon/biodata', $data);
    }

    public function form_ajuan()
    {
        $data = [
            'bttn' => 'syarat_ketentuan',
            'bantuan' => $this->bantuanModel
                ->where('StatusProgram', 'active')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')->findAll()
        ];
        return view('pemohon/ajuan_form_v', $data);
    }

    // Load form syarat dinamis
    public function form_syarat()
    {
        if ($this->request->isAJAX()) {
            $kodeBantuan = $this->request->getVar('kodeBantuan');
            $data = [
                'Syarat' => $this->syaratModel->where('kodeBantuan', $kodeBantuan)
                    ->where('StatusSyarat', 'active')
                    ->findAll()
            ];
            $msg = [
                'data' => view('pemohon/formSyarat', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    //Proses Simpan Data Ajuan dari Pemohon
    public function ajukanBantuan()
    {
        if ($this->session->get('idStsAjuan') == 1) {
            if ($this->request->isAJAX()) {
                $validation = \Config\Services::validation();
                // Jika e-sik tidak terdaftar dan jenis ajuan individu
                if ($this->session->get('eSik') == 0 && $this->request->getVar('jnsbantuan') == 0) {
                    $valid = [
                        'jnsbantuan' => [
                            'label' => 'Jenis Bantuan',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} tidak boleh kosong'
                            ]
                        ],
                        'kodeBantuan' => [
                            'label' => 'Program Bantuan',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} tidak boleh kosong'
                            ]
                        ],
                        'files' => [
                            'label' => 'file syarat',
                            'rules' => 'uploaded[files]|max_size[files,4096]|ext_in[files,pdf,jpeg,jpg,png]|mime_in[files,application/pdf,image/jpeg,image/jpg,image/png]',
                            'errors' => [
                                'uploaded' => 'Semua {field} tidak boleh kosong',
                                'max_size' => 'Mohon maaf, ukuran {field} tidak boleh melebihi 4MB',
                                'ext_in' => 'Mohon maaf, semua {field} harus dalam format pdf/jpg/jpeg/png',
                                'mime_in' => 'Mohon maaf, terdapat {field} yang bukan pdf/jpg/jpeg/png',
                            ]
                        ],
                        'srtKetPemohon' => [
                            'label' => 'File Surat Keterangan Pemohon',
                            'rules' => 'uploaded[srtKetPemohon]|max_size[srtKetPemohon,4096]|ext_in[srtKetPemohon,pdf]|mime_in[srtKetPemohon,application/pdf]',
                            'errors' => [
                                'uploaded' => '{field} tidak boleh kosong',
                                'max_size' => 'Mohon maaf, ukuran {field} tidak boleh melebihi 4MB',
                                'ext_in' => 'Mohon maaf, {field} harus dalam format pdf',
                                'mime_in' => 'Mohon maaf, {field} bukan pdf',
                            ]
                        ]
                    ];
                } else {
                    $valid = [
                        'jnsbantuan' => [
                            'label' => 'Jenis Bantuan',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} tidak boleh kosong'
                            ]
                        ],
                        'kodeBantuan' => [
                            'label' => 'Program Bantuan',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} tidak boleh kosong'
                            ]
                        ],
                        'files' => [
                            'label' => 'file syarat',
                            'rules' => 'uploaded[files]|max_size[files,4096]|ext_in[files,pdf,jpeg,jpg,png]|mime_in[files,application/pdf,image/jpeg,image/jpg,image/png]',
                            'errors' => [
                                'uploaded' => 'Semua {field} tidak boleh kosong',
                                'max_size' => 'Mohon maaf, ukuran {field} tidak boleh melebihi 4MB',
                                'ext_in' => 'Mohon maaf, semua {field} harus dalam format pdf/jpg/jpeg/png',
                                'mime_in' => 'Mohon maaf, terdapat {field} yang bukan pdf/jpg/jpeg/png',
                            ]
                        ]
                    ];
                }
                if (!$this->validate($valid)) {
                    $msg = [
                        'error' => [
                            'jnsbantuan' => $validation->getError('jnsbantuan'),
                            'kodeBantuan' => $validation->getError('kodeBantuan'),
                            'srtKetPemohon' => $validation->getError('srtKetPemohon'),
                            'files' => $validation->getError('files'),
                            'token' => csrf_hash(),
                        ]
                    ];
                } else {
                    $jnsBantuan = $this->request->getVar('jnsbantuan');
                    // Jika ajuan lembaga
                    if ($jnsBantuan == 1) {
                        $valid = $this->validate([
                            'namaLbg' => [
                                'label' => 'Nama Lembaga',
                                'rules' => 'required',
                                'errors' => [
                                    'required' => '{field} harus diisi'
                                ]
                            ],
                            'alamatLbg' => [
                                'label' => 'Alamat Lembaga',
                                'rules' => 'required',
                                'errors' => [
                                    'required' => '{field} harus diisi'
                                ]
                            ],
                        ]);
                        if (!$valid) {
                            $msg = [
                                'error' => [
                                    'jnsbantuan' => $validation->getError('namaLbg'),
                                    'kodeBantuan' => $validation->getError('alamatLbg'),
                                    'token' => csrf_hash(),
                                ]
                            ];
                            echo json_encode($msg);
                            return FALSE;
                        } else {
                            $dataLbg = [
                                'idAjuan' => $this->session->get('idAjuan'),
                                'namaLembaga' => $this->request->getVar('namaLbg'),
                                'alamat' => $this->request->getVar('alamatLbg'),
                                'Akta' => $this->request->getVar('noAkta')
                            ];
                            $this->ajuanLbgModel->save($dataLbg);
                        }
                    }
                    //Set status ajuan
                    if ($jnsBantuan == 0) {
                        //Jika individu lewat dinsos
                        $idStsAjuan = 2;
                        $idJnsAjuan = 0;
                    } elseif ($jnsBantuan == 1) {
                        //Jika Lembaga langsung kesra
                        $idStsAjuan = 3;
                        $idJnsAjuan = 1;
                    }
                    // rubah format nilai
                    $strNilaiKebutuhan = $this->request->getVar('kebutuhan');
                    $numbNilaiKebutuhan = str_replace(".", "", $strNilaiKebutuhan);
                    // Jika e-sik tidak terdaftar = upload surat ket. pemohon
                    if ($this->session->get('eSik') == 0 && $this->request->getVar('jnsbantuan') == 0) {
                        // get file surat ket. pemohon
                        $srtKetPemohon = $this->request->getFile('srtKetPemohon');
                        $namaFile = $srtKetPemohon->getRandomName();
                        // simpan surat ket. pemohon ke directory
                        $srtKetPemohon->move('uploads_syarat', $namaFile);
                        $dataAjuan = [
                            'tgAjuan' => date('Y-m-d'),
                            'kodeBantuan' => $this->request->getVar('kodeBantuan'),
                            'Keperluan' => $this->request->getVar('keperluan'),
                            'Kebutuhan' => $numbNilaiKebutuhan,
                            'idStsAjuan' => $idStsAjuan,
                            'idJnsAjuan' => $idJnsAjuan,
                            'srtKetPemohon' => $namaFile
                        ];
                    } else {
                        $dataAjuan = [
                            'tgAjuan' => date('Y-m-d'),
                            'kodeBantuan' => $this->request->getVar('kodeBantuan'),
                            'Keperluan' => $this->request->getVar('keperluan'),
                            'Kebutuhan' => $numbNilaiKebutuhan,
                            'idStsAjuan' => $idStsAjuan,
                            'idJnsAjuan' => $idJnsAjuan
                        ];
                    }
                    //Simpan update ajuan
                    $save = $this->ajuanModel->where('noAjuan', $this->session->get('noAjuan'))->set($dataAjuan)->update();
                    // Files Syarat
                    $files = $this->request->getFileMultiple('files');
                    $idSyarat = $this->request->getVar('idSyarat');
                    // Simpan Files Syarat
                    if ($save) {
                        // simpan syarat ke database
                        foreach ($files as $a => $file) {
                            if ($file->isValid() && !$file->hasMoved()) {
                                $newName[$a] = $file->getRandomName();
                                $dataSyarat = [
                                    'idAjuan' => $this->session->get('idAjuan'),
                                    'idSyarat' => $idSyarat[$a],
                                    'namaFile' => $newName[$a],
                                ];
                                if ($this->uploadModel->save($dataSyarat)) {
                                    // simpan syarat ke directory penyimpanan
                                    $moveDocument = $file->move('uploads_syarat', $newName[$a]);
                                    if ($moveDocument) {
                                        //Update session status ajuan
                                        $_SESSION['idStsAjuan'] = $idStsAjuan;
                                        $msg = [
                                            'berhasil' => [
                                                'pesan' => "Berhasil",
                                                'link' => "/pemohon/resumeAjuan"
                                            ]
                                        ];
                                    } else {
                                        $msg = [
                                            'error' => [
                                                'files' => "Gagal simpen ke directory",
                                                'token' => csrf_hash(),
                                            ]
                                        ];
                                    }
                                } else {
                                    $msg = [
                                        'error' => [
                                            'files' => "Gagal simpan syarat ke database",
                                            'token' => csrf_hash(),
                                        ]
                                    ];
                                }
                            }
                        }
                    }
                }
                echo json_encode($msg);
            } else {
                exit("Maaf perintah tidak dapat diproses");
            }
        } else {
            exit('Maaf ajuan sudah tidak dapat diedit, hubungi kelurahan jika ingin me-reset ajuan');
        }
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

    public function resumeAjuan()
    {
        $noAjuan = $this->session->get('noAjuan');
        $idAjuan = $this->session->get('idAjuan');
        $data = [
            'bttn' => 'resumeAjuan',
            'ajuan' => $this->ajuanModel->where('noAjuan', $noAjuan)
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('estatusajuan as sts', 'sts.idStsAjuan = trajuan.idStsAjuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->first(),
            'lembaga' => $this->ajuanLbgModel->where('idAjuan', $idAjuan)->first(),
            'dokumen' => $this->uploadModel->where('idAjuan', $idAjuan)
                ->join('trsyarat', 'trsyarat.idSyarat = trupload.idSyarat')
                ->findAll()
        ];
        // dd($idAjuan);
        return view('pemohon/resume_ajuan', $data);
    }

    public function cetakResume()
    {
        $noAjuan = $this->session->get('noAjuan');
        $idAjuan = $this->session->get('idAjuan');
        $data = [
            'bttn' => 'resumeAjuan',
            'ajuan' => $this->ajuanModel->where('noAjuan', $noAjuan)
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('estatusajuan as sts', 'sts.idStsAjuan = trajuan.idStsAjuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('ekelurahan', 'ekelurahan.idKel = mpemohon.idKel')
                ->join('ekecamatan', 'ekecamatan.idKec = ekelurahan.idKec')
                ->first(),
            'lembaga' => $this->ajuanLbgModel->where('idAjuan', $idAjuan)->first(),
            'tglNow' => new Time('now', 'Asia/Jakarta', 'en_US')
        ];
        $mpdf = new Mpdf([
            'debug' => TRUE, 'mode' => 'utf-8', 'format' => 'A4-P',
            'margin_top' => 8, 'margin_bottom' => 10, 'margin_left' => 20, 'margin_right' => 12
        ]);
        $html = view('pemohon/resume_pdf.php', $data);
        $mpdf->text_input_as_HTML = true;
        $mpdf->WriteHTML($html);

        $mpdf->Output($data['ajuan']['Nama'] . ".pdf", 'D');
    }
}
