<?php

namespace App\Controllers;

use App\Models\PemohonModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\FormulirModel;
use App\Models\AjuanModel;
use App\Models\BantuanModel;
use App\Models\MitraModel;
use CodeIgniter\I18n\Time;
use Mpdf\Mpdf;

class Home extends BaseController
{
	protected $pemohonModel;
	protected $kecamatanModel;
	protected $kelurahanModel;
	protected $formulirModel;
	protected $ajuanModel;
	protected $mitraModel;

	public function __construct()
	{
		$this->pemohonModel = new PemohonModel();
		$this->kecamatanModel = new KecamatanModel();
		$this->kelurahanModel = new KelurahanModel();
		$this->formulirModel = new FormulirModel();
		$this->ajuanModel = new AjuanModel();
		$this->mitraModel = new MitraModel();
		$this->programModel = new BantuanModel();
	}
	public function index()
	{
		#Data waktu
		$tgl_now = new Time('now', 'Asia/Jakarta', 'en_US');
		$tahun_now = $tgl_now->getYear();

		#Data time series
		for ($tahun = 2020; $tahun <= $tahun_now; $tahun++) {
			$pmi = $this->ajuanModel
				->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
				->where('trbantuan.idMitra', 1)
				->where('idStsAjuan', 7)
				->where('year(tgHasil)', $tahun)
				->countAllResults();
			$lazis = $this->ajuanModel
				->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
				->where('trbantuan.idMitra', 2)
				->where('idStsAjuan', 7)
				->where('year(tgHasil)', $tahun)
				->countAllResults();
			$baznas = $this->ajuanModel
				->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
				->where('trbantuan.idMitra', 3)
				->where('idStsAjuan', 7)
				->where('year(tgHasil)', $tahun)
				->countAllResults();
			$pms = $this->ajuanModel
				->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
				->where('trbantuan.idMitra', 4)
				->where('idStsAjuan', 7)
				->where('year(tgHasil)', $tahun)
				->countAllResults();
			$jumlah_timeseries[$tahun] = array($pmi, $lazis, $baznas, $pms);
		}

		$program = $this->programModel->findAll();
		foreach ($program as $prg) {
			$jmlAjuan = $this->ajuanModel
				->where('kodeBantuan', $prg['kodeBantuan'])
				->where('idStsAjuan', 7)
				->where('year(tgHasil)', $tahun_now)
				->countAllResults();
			$dataProgram[$prg['namaProgram']] = $jmlAjuan;
		}

		$mitra = $this->mitraModel->findAll();
		foreach ($mitra as $key => $mit) {
			$jmlMitra = $this->ajuanModel
				->join('trbantuan', 'trbantuan.kodeBantuan = trajuan.kodeBantuan')
				->where('idMitra', $mit['idMitra'])
				->where('idStsAjuan', 7)
				->where('year(tgHasil)', $tahun_now)
				->countAllResults();
			$dataMitra[$mit['NamaMitra']] = $jmlMitra;
		}
		$data = [
			"countAjuan" => $this->ajuanModel->where('idStsAjuan', 7)->countAllResults(),
			"countMitra" => $this->mitraModel->countAllResults(),
			"countProgram" => $this->programModel->countAllResults(),
			"dataProgram" => $dataProgram,
			"dataMitra" => $dataMitra,
			"jumlah_timeseries" => $jumlah_timeseries,
			"tahun_now" => $tahun_now
		];
		// print_r($data['dataProgram']);
		// die;
		return view('landing/index', $data);
	}

	public function bantuan()
	{
		return view('landing/detail_bantuan');
	}
	public function bantuan2()
	{
		return view('landing/detail_bantuan2');
	}
	public function bantuan3()
	{
		return view('landing/detail_bantuan3');
	}
	public function bantuan4()
	{
		return view('landing/detail_bantuan4');
	}
	public function daftar()
	{
		$a = random_int(1, 9);
		$b = random_int(1, 9);
		$operator = "x+";
		$opr = substr($operator, mt_rand(0, strlen($operator) - 1), 1);
		$angka = array(
			1 =>   'satu',
			'dua',
			'tiga',
			'empat',
			'lima',
			'enam',
			'tujuh',
			'delapan',
			'sembilan'
		);
		if ($opr == 'x') {
			$hasil = $a * $b;
			$text_opr = 'dikali';
		} elseif ($opr == '+') {
			$hasil = $a + $b;
			$text_opr = 'ditambah';
		}
		$text = 'Berapa ' . $angka[$a] . ' ' . $text_opr . ' ' . $angka[$b] . '?';
		// $this->session->set(['hsl' => $hasil]);
		$data = [
			'text' => $text,
			'hasil' => $hasil,
			'kecamatan' => 	$this->kecamatanModel->findAll()
		];
		return view('landing/form_daftar', $data);
	}

	public function cekAjuan()
	{
		$a = random_int(1, 9);
		$b = random_int(1, 9);
		$operator = "x+";
		$opr = substr($operator, mt_rand(0, strlen($operator) - 1), 1);
		$angka = array(
			1 =>   'satu',
			'dua',
			'tiga',
			'empat',
			'lima',
			'enam',
			'tujuh',
			'delapan',
			'sembilan'
		);
		if ($opr == 'x') {
			$hasil = $a * $b;
			$text_opr = 'dikali';
		} elseif ($opr == '+') {
			$hasil = $a + $b;
			$text_opr = 'ditambah';
		}
		$text = 'Berapa ' . $angka[$a] . ' ' . $text_opr . ' ' . $angka[$b] . '?';
		$data = [
			'text' => $text,
			'hasil' => $hasil,
		];
		return view('landing/cek_ajuan', $data);
	}

	// load kelurahan
	public function load_kelurahan()
	{

		if ($this->request->isAJAX()) {
			$idKec = $this->request->getVar('idKec');
			$data = [
				'kelurahan' => $this->kelurahanModel->where('idKec', $idKec)->findAll()
			];

			$msg = [
				'data' => view('tambahan/kelurahan', $data)
			];

			echo json_encode($msg);
		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function cetakFormulir($idFormulir)
	{
		$mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A5-L']);
		$formulir = $this->formulirModel
			->join('eagama', 'eagama.idAgama = mformulir.idAgama')
			->join('ekelurahan', 'ekelurahan.idKel = mformulir.idKel')
			->join('ekecamatan', 'ekecamatan.idKec = ekelurahan.idKec')
			->find($idFormulir);
		// dd($formulir);
		$data = [
			'formulir' => $formulir
		];
		$html = view('landing/formDaftarPDF', $data);
		$mpdf->text_input_as_HTML = true;
		$mpdf->SetHeader('SIPKEMAS|Formulir Pendaftaran|{PAGENO}');
		$mpdf->SetFooter('Sekretariat Daerah Bidang Kesejahteraan Rakyat');
		$mpdf->WriteHTML($html);
		// $this->response->setHeader('Content-Type', 'application/pdf');

		$mpdf->Output($formulir['noFormulir'] . '.pdf', 'D');
	}
}
