<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        TipoUsuario::factory()->create([
            'nombre_tipo_usuario' => 'Administrador',
        ]);
        TipoUsuario::factory()->create([
            'nombre_tipo_usuario' => 'Docente',
        ]);
        TipoUsuario::factory()->create([
            'nombre_tipo_usuario' => 'Estudiante',
        ]);

        User::factory()->create([
            'name' => 'ADMIN',
            'email' => 'admin@info.com',
            'password' => Hash::make('password'),
            'tipo_usuario_id' => '1',
        ]);

        User::factory()->create([
            'name' => 'DOCENTE',
            'email' => 'docente@info.com',
            'password' => Hash::make('password'),
            'tipo_usuario_id' => '2',
        ]);

        User::factory()->create([
            'name' => 'ESTUDIANTE',
            'email' => 'estudiante@info.com',
            'password' => Hash::make('password'),
            'tipo_usuario_id' => '3',
        ]);
    }
}
