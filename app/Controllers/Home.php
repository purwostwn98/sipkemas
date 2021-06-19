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
	public function daftar()
	{
		$data = [
			'kecamatan' => 	$this->kecamatanModel->findAll()
		];
		return view('landing/form_daftar', $data);
	}
	public function cekAjuan()
	{
		return view('landing/cek_ajuan');
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
