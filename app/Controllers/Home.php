<?php

namespace App\Controllers;

class Home extends BaseController
{
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
		return view('landing/form_daftar');
	}
}
