<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderFinal extends Model
{
	public $timestamps = false;
	protected $table = 'order_final';
	protected $fillable = [
		'nik',
		'id_barang',
		'tahun',
		'imei',
		'kelengkapan',
		'pinjaman',
		'tenor',
		'jatuh_tempo',
		'jumlah_tebus',
		'tanggal',
		'nota',
		'bunga',
		'denda',
		'status',
		'total_pelunasan',
		'tanggal_tebus',
	];

	public function konsumen()
	{
		return $this->belongsTo('App\Konsumen', 'nik', 'nik');
	}

	public function barang()
	{
		return $this->belongsTo('App\Barang', 'id_barang');
	}

	public function perpanjangan()
	{
		return $this->hasMany('App\Perpanjangan', 'id_order_final');
	}

	public function getPinjamanRpAttribute()
	{
		return number_format($this->pinjaman, 2, ',', '.');
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

	public function getTotalPelunasanRpAttribute()
	{
		return number_format($this->total_pelunasan, 2, ',', '.');
	}

}
