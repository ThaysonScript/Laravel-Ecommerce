<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criarUsuario = new User;

        $criarUsuario->firstName = 'Cristiano';
        $criarUsuario->lastName = 'Ronaldo';
        $criarUsuario->email = 'CristianoRonaldo@gmail.com';
        $criarUsuario->password = bcrypt('12345678');

        $criarUsuario->save();
    }
}
