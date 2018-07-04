<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perpanjangan extends Model
{
	public $timestamps = false;
	protected $table = 'perpanjangan';
	protected $fillable = [
		'id_order_final',
		'tenor',
		'jatuh_tempo',
		'jumlah_tebus',
		'tanggal',
		'bunga',
		'denda',
		'admin',
	];
	protected $appends=['bunga_baru_rp'];

	public function order()
	{
		return $this->belongsTo('App\OrderFinal', 'id_order_final');
	}

	public function getJumlahTebusRpAttribute()
	{
		return number_format($this->jumlah_tebus, 2, ',', '.');
	}

	public function getBungaRpAttribute()
	{
		return number_format($this->bunga, 2, ',', '.');
	}

	public function getDendaRpAttribute()
	{
		return number_format($this->denda, 2, ',', '.');
	}

	public function getAdminRpAttribute()
	{
		return number_format($this->admin, 2, ',', '.');
	}

	public function getBungaBaruRpAttribute()
	{
		return number_format($this->jumlah_tebus-$this->order->pinjaman);
	}
}
