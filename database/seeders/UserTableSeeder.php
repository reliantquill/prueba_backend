<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = new User();
        $user->identificacion    = '1';
        $user->nombres           = 'CARLOS';
        $user->apellidos         = 'CARREÑO';
        $user->email             = 'a@a.com';
        $user->password          =  Hash::make('123');
        $user->estado_id         = 1;
        $user->email_verified_at = null;
        $user->remember_token    = null;
        $user->save();
    }
}
