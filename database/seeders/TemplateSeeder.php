<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Template;
use Faker\Factory as Faker;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('template')->insert([
            ['name' => 'Sale', 'warehouse_id' => 1],
            ['name' => 'Sale 2', 'warehouse_id' => 2],
        ]);
    }
}
