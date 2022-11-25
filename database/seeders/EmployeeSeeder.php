<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Employee;
use App\Models\Partner;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        foreach (range(1,10) as $value) {
            # code...
            DB::table('employee')->insert([
                'name' => $faker->name(),
                'address' => $faker->address(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
            ]);
        }
    }
}
