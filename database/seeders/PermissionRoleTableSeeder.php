<?php


namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 8; $i++){
            DB::table('permission_role')->insert([
                'permission_id' => $i,
                'role_id' => 3,
            ]);
        }
    }
}
