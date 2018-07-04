<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
	public $timestamps = false;
	protected $table = 'barang';
	protected $fillable = [
		'nama',
		'harga_a',
		'harga_b',
		'harga_c',
	];
}
