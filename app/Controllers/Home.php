<?php

namespace App\Controllers;

use App\Models\PemohonModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;

class Home extends BaseController
{
	protected $pemohonModel;
	protected $kecamatanModel;
	protected $kelurahanModel;

	public function __construct()
	{
		$this->pemohonModel = new PemohonModel();
		$this->kecamatanModel = new KecamatanModel();
		$this->kelurahanModel = new KelurahanModel();
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
}
