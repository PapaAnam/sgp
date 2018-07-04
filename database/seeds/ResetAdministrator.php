<?php

use Illuminate\Database\Seeder;

class ResetAdministrator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
        	'username'=>'admin',
        	'password'=>bcrypt('admin'),
        ]);
        echo 'admin berhasil direset';
    }
}
