<?php

namespace App\Controllers;


use App\Models\PemohonModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\FormulirModel;
use Mpdf\Mpdf;

class Home extends BaseController
{
	protected $pemohonModel;
	protected $kecamatanModel;
	protected $kelurahanModel;
	protected $formulirModel;

	public function __construct()
	{
		$this->pemohonModel = new PemohonModel();
		$this->kecamatanModel = new KecamatanModel();
		$this->kelurahanModel = new KelurahanModel();
		$this->formulirModel = new FormulirModel();
	}
	public function index()
	{
		return view('landing/index');
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
