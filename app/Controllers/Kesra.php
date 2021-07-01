<?php

namespace App\Controllers;


use App\Models\AjuanModel;
use App\Models\PemohonModel;
use App\Models\UploadModel;
use App\Models\AjuanLbgModel;
use App\Models\KelurahanModel;
use App\Models\MitraModel;
use App\Models\BantuanModel;
use App\Models\SyaratModel;
use CodeIgniter\I18n\Time;

class Kesra extends BaseController
{
    protected $ajuanModel;
    protected $pemohonModel;
    protected $uploadModel;
    protected $ajuanLbgModel;
    protected $kelurahanModel;
    protected $mitraModel;
    protected $bantuanModel;
    protected $syaratModel;
    public function __construct()
    {
        $this->session = session();
        $this->ajuanModel = new AjuanModel();
        $this->pemohonModel = new PemohonModel();
        $this->uploadModel = new UploadModel();
        $this->ajuanLbgModel = new AjuanLbgModel();
        $this->kelurahanModel = new KelurahanModel();
        $this->mitraModel = new MitraModel();
        $this->bantuanModel = new BantuanModel();
        $this->syaratModel = new SyaratModel();
    }

    //cek privilege sbg petugas kesra
    public function cek()
    {
        if ($this->session->get('privUser') <> '4') {
            $this->session->destroy();
            return redirect()->to('/home/index');
            exit;
        }
    }

    public function dftrajuan_i()
    {
        $this->cek();
        $data = [
            'bttn' => 'dftrajuan',
            'ajuan_baru' => $this->ajuanModel
                ->where('trajuan.idStsAjuan', 3)
                ->where('idJnsAjuan', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->findAll(),
            'ajuan_proses' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 2)
                ->where('trajuan.idStsAjuan <=', 5)
                ->where('trajuan.idStsAjuan !=', 3)
                ->where('idJnsAjuan', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->findAll(),
            'ajuan_selesai' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 6)
                ->where('idJnsAjuan', 0)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->findAll()
        ];
        return view('kesra/dftrajuan_i', $data);
    }
    public function dftrajuan_l()
    {
        $this->cek();
        $data = [
            'bttn' => 'dftrajuan',
            'ajuan_baru' => $this->ajuanModel
                ->where('trajuan.idStsAjuan', 3)
                ->where('trajuan.idJnsAjuan', 1)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->join('trlembaga', 'trlembaga.idAjuan = trajuan.idAjuan')
                ->findAll(),
            'ajuan_proses' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 4)
                ->where('trajuan.idStsAjuan <=', 5)
                ->where('trajuan.idJnsAjuan', 1)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->join('trlembaga', 'trlembaga.idAjuan = trajuan.idAjuan')
                ->findAll(),
            'ajuan_selesai' => $this->ajuanModel
                ->where('trajuan.idStsAjuan >=', 6)
                ->where('trajuan.idJnsAjuan =', 1)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->join('estatusajuan', 'estatusajuan.idStsAjuan = trajuan.idStsAjuan')
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->join('trlembaga', 'trlembaga.idAjuan = trajuan.idAjuan')
                ->findAll()

        ];
        return view('kesra/dftrajuan_l', $data);
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
        return view('kesra/detailajuan_i', $data);
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
        return view('kesra/detailajuan_l', $data);
    }

    public function updateAjuan()
    {
        $this->cek();
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'rekomendasi' => [
                    'label' => 'rekomendasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Anda harus memilih salah satu {field}'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'rec' => $validation->getError('rekomendasi'),
                    ]
                ];
            } else {
                $data = [
                    'idRecKesra' => $this->request->getVar('rekomendasi'),
                    'ketRecKesra' => $this->request->getVar('ketRecKesra'),
                    'tgRecKesra' => new Time('now', 'Asia/Jakarta', 'en_US'),
                    'idStsAjuan' => 4
                ];
                $save = $this->ajuanModel->where('idAjuan', $this->request->getVar('idAjuan'))->set($data)->update();
                if ($save) {
                    $msg = [
                        'berhasil' => [
                            'pesan' => "Rekomendasi berhasil dikirim",
                            'link' => "/kesra/dftrajuan_i"
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

    public function dashboard()
    {
        // Print tgl Indonesia
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        if ($this->request->getPost('filter') == 'filter') {
            $tgAwal = $this->request->getPost('tgAwal');
            $tgAhir = $this->request->getPost('tgAkhir');
            $tgl = explode('-', $tgAwal);
            $tgl2 = explode('-', $tgAhir);
            $tglAwal = $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0];
            $tglAkhir = $tgl2[2] . ' ' . $bulan[(int)$tgl2[1]] . ' ' . $tgl2[0];
        } elseif ($this->request->getGet('hpsFilter') == 'noFilter') {
            // dd($this->request->getPost());
            $tgAwal = Time::parse('March 9, 2016 12:00:00', 'Asia/Jakarta');
            $tgAhir = new Time('now', 'Asia/Jakarta', 'en_US');
            $tglAwal = "Semua Data";
            $tglAkhir = "";
        } else {
            $tgAwal = Time::parse('March 9, 2016 12:00:00', 'Asia/Jakarta');
            $tgAhir = new Time('now', 'Asia/Jakarta', 'en_US');
            $tglAwal = "Semua Data";
            $tglAkhir = "";
        }

        //Untuk statistik kelurahan
        $dftrKelurahan = $this->kelurahanModel->findAll();
        foreach ($dftrKelurahan as $kel) {
            $countAjuanKelurahan = $this->ajuanModel
                ->where('idStsAjuan >', 1)
                ->where('tgHasil >=', $tgAwal)
                ->where('tgHasil <=', $tgAhir)
                ->join('mpemohon', 'mpemohon.idPemohon = trajuan.idPemohon')
                ->where('idKel', $kel['idKel'])
                ->countAllResults();
            $semuaKelurahan[$kel['Kelurahan']] = $countAjuanKelurahan;
            arsort($semuaKelurahan);
        }
        // Untuk statistik mitra
        $dftrMitra = $this->mitraModel->findAll();
        foreach ($dftrMitra as $mit) {
            $countAjuanMitra = $this->ajuanModel
                ->where('idStsAjuan >', 1)
                ->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->where('trbantuan.idMitra', $mit['idMitra'])
                ->countAllResults();
            $semuaMitra[] = $countAjuanMitra;
        }
        $data = [
            'countPermintaan' => $this->ajuanModel
                ->where('idStsAjuan', 3)
                ->where('tgHasil >=', $tgAwal)
                ->where('tgHasil <=', $tgAhir)
                ->countAllResults(),
            'countProses' => $this->ajuanModel
                ->where('idStsAjuan >=', 2)
                ->where('idStsAjuan <', 6)
                ->where('idStsAjuan !=', 3)
                ->where('tgHasil >=', $tgAwal)
                ->where('tgHasil <=', $tgAhir)
                ->countAllResults(),
            'countDitolak' => $this->ajuanModel
                ->where('idStsAjuan', 6)
                ->where('tgHasil >=', $tgAwal)
                ->where('tgHasil <=', $tgAhir)
                ->countAllResults(),
            'countDisetujui' => $this->ajuanModel
                ->where('idStsAjuan', 7)
                ->where('tgHasil >=', $tgAwal)
                ->where('tgHasil <=', $tgAhir)
                ->countAllResults(),
            'totalDana' => $this->ajuanModel->selectSum('nilaiDisetujui')
                ->where('tgHasil >=', $tgAwal)
                ->where('tgHasil <=', $tgAhir)
                ->first(),
            'countKelurahan' => $semuaKelurahan,
            'countMitra' => $semuaMitra,
            'tglAwal' => $tglAwal,
            'tglAkhir' => $tglAkhir,
            'bttn' => 'dashboard_kesra'
        ];
        return view('kesra/dashboard', $data);
    }

    public function dftrMitra()
    {
        $data = [
            'bttn' => 'dftrmitra',
            'mitra' => $this->mitraModel->findAll()
        ];
        return view('kesra/dftrmitra', $data);
    }

    public function dftrBantuan()
    {
        $data = [
            'bttn' => 'dftrbantuan',
            'bantuan' => $this->bantuanModel
                ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
                ->findAll()
        ];
        return view('kesra/dftrbantuan', $data);
    }

    public function editProgram()
    {
        $idBantuan = $this->request->getVar('kode');
        $bantuan = $this->bantuanModel
            ->where('idBantuan', $idBantuan)
            ->join('mmitra', 'mmitra.idMitra = trbantuan.idMitra')
            ->first();
        $countSyarat = $this->syaratModel->where('kodeBantuan', $bantuan['kodeBantuan'])->countAllResults();
        if ($countSyarat >= 1) {
            $syaratProgram = $this->syaratModel->where('kodeBantuan', $bantuan['kodeBantuan'])->findAll();
        } else {
            $syaratProgram = 0;
        }
        $data = [
            'bttn' => 'dftrbantuan',
            'bantuan' => $bantuan,
            'syaratProgram' => $syaratProgram
        ];
        return view('kesra/editProgram', $data);
    }

    public function frEditSyarat()
    {
        if ($this->request->isAJAX()) {
            $idSyarat = $this->request->getVar('idSyarat');
            $data = [
                'syarat' => $this->syaratModel->find($idSyarat)
            ];
            $msg = [
                'sukses' => view('tambahan/frEditSyarat', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf perintah tidak dapat diproses');
        }
    }

    public function doEditSyarat()
    {
        if ($this->request->isAJAX()) {
            $idSyarat = $this->request->getVar('idSyarat');
            $data = [
                'Syarat' => $this->request->getVar('namaSyarat'),
                'StatusSyarat' => $this->request->getVar('StatusSyarat')
            ];
            if ($this->syaratModel->update($idSyarat, $data)) {
                $msg = [
                    'berhasil' => "Syarat berhasil diupdate"
                ];
            } else {
                $msg = [
                    'gagal' => "Syarat gagal diupdate"
                ];
            }

            echo json_encode($msg);
        } else {
            exit('Maaf perintah tidak dapat diproses');
        }
    }

    public function doHapusSyarat()
    {
        if ($this->request->isAJAX()) {
            $idSyarat = $this->request->getVar('idSyarat');
            $cekRiwayat = $this->uploadModel->where('idSyarat', $idSyarat)->countAllResults();
            if ($cekRiwayat >= 1) {
                $msg = [
                    'notallowed' => "Mohon maaf, syarat sudah digunakan dalam riwayat ajuan. Jika memang syarat sudah tidak berlaku, Anda bisa me-nonaktifkan melalui menu edit dan menambah syarat baru jika diperlukan"
                ];
            } else {
                if ($this->syaratModel->delete($idSyarat)) {
                    $msg = [
                        'berhasil' => "Syarat berhasil dihapus"
                    ];
                } else {
                    $msg = [
                        'gagal' => "Syarat gagal dihapus"
                    ];
                }
            }
            echo json_encode($msg);
        } else {
            exit('Maaf perintah tidak dapat diproses');
        }
    }

    public function doTambahSyarat()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'kodeBantuan' => $this->request->getVar('kodeBantuan'),
                'Syarat' => $this->request->getVar('namaSyarat'),
                'StatusSyarat' => $this->request->getVar('StatusSyarat')
            ];
            if ($this->syaratModel->save($data)) {
                $msg = [
                    'berhasil' => "Syarat berhasil ditambahkan"
                ];
            } else {
                $msg = [
                    'gagal' => "Syarat gagal ditambahkan"
                ];
            }

            echo json_encode($msg);
        } else {
            exit('Maaf perintah tidak dapat diproses');
        }
    }

    public function doEditProgram()
    {
        if ($this->request->isAJAX()) {
            $idBantuan = $this->request->getVar('idBantuan');
            $data = [
                'namaProgram' => $this->request->getVar('namaProgram'),
                'StatusProgram' => $this->request->getVar('StatusProgram'),
                'desBantuan' => $this->request->getVar('desBantuan')
            ];
            if ($this->bantuanModel->update($idBantuan, $data)) {
                $msg = [
                    'berhasil' => "Program Berhasil diupdate",
                    'link' => "/kesra/dftrBantuan",
                ];
            } else {
                $msg = [
                    'gagal' => "Program gagal diupdate",
                    'link' => "/kesra/dftrBantuan",
                ];
            }

            echo json_encode($msg);
        } else {
            exit('Maaf perintah tidak dapat diproses');
        }
    }
}
