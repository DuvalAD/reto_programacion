<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InitialRegisters extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $date_ = date('Y-m-d H:i:s');

        $user_adm = DB::table('users')->insertGetId([
            'username' => 'ROOT',
            'rol' => 'Administrador',
            'name' => 'ROOT',
            'status' => 1,
            'password' => Hash::make('123456'),
            'created_at' => $date_
        ]);

        DB::table('employees')->insert([
            'identification' => '11111111111',
            'first_name' => 'ROOT',
            'last_name' => 'ROOT',
            'email' => 'root@dominio.com',
            'vaccinated' => 0,
            'user_fk' => $user_adm,
            'created_at' => $date_
        ]);

        $user_colab = DB::table('users')->insertGetId([
            'username' => 'COLABORADOR',
            'rol' => 'Colaborador',
            'name' => 'COLABORADOR',
            'status' => 1,
            'password' => Hash::make('123456'),
            'created_at' => $date_
        ]);

        DB::table('employees')->insert([
            'identification' => '2222222222',
            'first_name' => 'COLABORADOR',
            'last_name' => 'COLABORADOR',
            'email' => 'colaborador@dominio.com',
            'vaccinated' => 0,
            'user_fk' => $user_colab,
            'created_at' => $date_
        ]);

        DB::table('vaccines')->insert([
            ['name' => 'AstraZeneca','created_at' => $date_],
            ['name' => 'Pfizer','created_at' => $date_],
            ['name' => 'Sinovac','created_at' => $date_]
        ]);
    }
}
