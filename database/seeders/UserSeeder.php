<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@correo.com',
            'password'=>Hash::make('adminadmin'),
            'email_verified_at'=>now(),
            'fecha_creacion'=>now()->getTimestamp(),
            'fecha_modificacion'=>now()->getTimestamp()
        ]);

        User::create([
            'name'=>'admin2',
            'email'=>'admin2@correo.com',
            'password'=>Hash::make('adminadmin'),
            'email_verified_at'=>now(),
            'fecha_creacion'=>now()->getTimestamp(),
            'fecha_modificacion'=>now()->getTimestamp()
        ]);

        User::create([
            'name'=>'admin3',
            'email'=>'admin3@correo.com',
            'password'=>Hash::make('adminadmin'),
            'email_verified_at'=>now(),
            'fecha_creacion'=>now()->getTimestamp(),
            'fecha_modificacion'=>now()->getTimestamp()
        ]);
    }
}
