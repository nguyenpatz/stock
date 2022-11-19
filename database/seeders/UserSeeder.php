<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('user')->insert(
        // [
        //     ['name' => 'admin1', 'password' => 'admin123', 'perm_read' => 1, 'perm_write' => 1, 'perm_create' => 1, 'perm_unlink' => 1],
        //     ['name' => 'admin2', 'password' => 'admin123', 'perm_read' => 1, 'perm_write' => 1, 'perm_create' => 1, 'perm_unlink' => 1],
        // ]);
    }
}
