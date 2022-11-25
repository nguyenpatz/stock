<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //

        $banks = DB::table('bank_account')
            ->select('id')
            ->get();
        
        
        $faker = Faker::create();
        foreach (range(1,10) as $value) {
            DB::table('partner')->insert([
                'bank_id' => rand(1,count($banks)-1),
                'name' => $faker->name(),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'note' => $faker->paragraph(2),
                'birthday' => $faker->date(),
            ]);
        }
    }
}
