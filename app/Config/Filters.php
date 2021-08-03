<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'pemohonFilter' => \App\Filters\PemohonFilters::class,
		'kelurahanFilter' => \App\Filters\KelurahanFilters::class,
		'dinsosFilter' => \App\Filters\DinsosFilters::class,
		'kesraFilter' => \App\Filters\KesraFilters::class,
		'mitraFilter' => \App\Filters\MitraFilters::class
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		//yang boleh diakses sebelum login
		'before' => [
			// 'honeypot',
			'csrf' => ['except' => [
				'Home', 'home/*',
				'Pemohon', 'pemohon/form_syarat',
				'Kesra', 'kesra/frEditSyarat',
				'Kesra', 'kesra/doHapusSyarat',
				'Kesra', 'kesra/createKodeBantuan'
			]],
			'pemohonFilter' => ['except' => [
				'gerbangska', 'gerbangska/*',
				'home', 'home/*',
				'pemohon', 'pemohon/frpemohon',
				'pemohon', 'pemohon/proses_daftar',
				'pemohon', 'pemohon/cetakForm/*',
				'pemohon', 'pemohon/prosesCekAjuan',
				'pemohon', 'pemohon/prosesCekAjuan',
			]],
			'kelurahanFilter' => ['except' => [
				'gerbangska', 'gerbangska/*',
				'home', 'home/*',
				'pemohon', 'pemohon/frpemohon',
				'pemohon', 'pemohon/proses_daftar',
				'pemohon', 'pemohon/cetakForm/*',
				'pemohon', 'pemohon/prosesCekAjuan',
				'pemohon', 'pemohon/prosesCekAjuan',
			]],
			'dinsosFilter' => ['except' => [
				'gerbangska', 'gerbangska/*',
				'home', 'home/*',
				'pemohon', 'pemohon/frpemohon',
				'pemohon', 'pemohon/proses_daftar',
				'pemohon', 'pemohon/cetakForm/*',
				'pemohon', 'pemohon/prosesCekAjuan',
				'pemohon', 'pemohon/prosesCekAjuan',
			]],
			'kesraFilter' => ['except' => [
				'gerbangska', 'gerbangska/*',
				'home', 'home/*',
				'pemohon', 'pemohon/frpemohon',
				'pemohon', 'pemohon/proses_daftar',
				'pemohon', 'pemohon/cetakForm/*',
				'pemohon', 'pemohon/prosesCekAjuan',
				'pemohon', 'pemohon/prosesCekAjuan',
			]],
			'mitraFilter' => ['except' => [
				'gerbangska', 'gerbangska/*',
				'home', 'home/*',
				'pemohon', 'pemohon/frpemohon',
				'pemohon', 'pemohon/proses_daftar',
				'pemohon', 'pemohon/cetakForm/*',
				'pemohon', 'pemohon/prosesCekAjuan',
				'pemohon', 'pemohon/prosesCekAjuan',
			]],
		],
		//yang boleh diakses setelah login
		'after'  => [
			'toolbar',
			// 'honeypot',
			'pemohonFilter' => ['except' => [
				'pemohon', 'pemohon/*',
			]],
			'kelurahanFilter' => ['except' => [
				'kelurahan', 'kelurahan/*',
				'kelurahan', 'kelurahan/*/*',
				'pemohon', 'pemohon/alur_bantuan',
			]],
			'dinsosFilter' => ['except' => [
				'dinsos', 'dinsos/*',
				'dinsos', 'dinsos/*/*'
			]],
			'kesraFilter' => ['except' => [
				'kesra', 'kesra/*',
				'kesra', 'kesra/*/*'
			]],
			'mitraFilter' => ['except' => [
				'mitra', 'mitra/*',
				'mitra', 'mitra/*/*',
				'kesra', 'kesra/editProgram',
				'kesra', 'kesra/frEditSyarat',
				'kesra', 'kesra/doEditSyarat',
				'kesra', 'kesra/doHapusSyarat',
				'kesra', 'kesra/doTambahSyarat',
				'kesra', 'kesra/doEditProgram',
				'kesra', 'kesra/frTambahProgram',
				'kesra', 'kesra/createKodeBantuan',
				'kesra', 'kesra/doTambahProgram',
				'kesra', 'kesra/doHapusProgram',
			]],
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
