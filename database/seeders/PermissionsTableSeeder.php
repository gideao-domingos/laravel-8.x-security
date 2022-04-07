<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list'=>'Listar Função',
            'role-create'=>'Criar Função',
            'role-edit'=>'Editar Função',
            'role-delete'=>'Eliminar Função',
            'user-list'=>'Listar Utilizadores',
            'user-create'=>'Criar Utilizador',
            'user-edit'=>'Editar Utilizador',
            'user-delete'=>'Eliminar Utilizador'
         ];

        foreach ($permissions as $key => $value) {
            Permission::create([
                'name' => $key,
                'label' => $value,
            ]);
        }
    }
}
