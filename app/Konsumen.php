<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
	public $timestamps = false;
	protected $table = 'konsumen';
	protected $primaryKey = 'nik';
	public $incrementing = false;
	protected $fillable = [
		'nama',
		'nik',
		'no_hp',
		'alamat',
	];
}
