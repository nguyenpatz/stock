<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Bank_account;
use Faker\Factory as Faker;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $banks = [
        'VietcomBank',
        'BIDV',
        'VBSP',
        'Vietinbank',
        'VN-Agribank',
        'Techcombank',
        'Sacombank',
        'MB Bank',
        'VPBank',
        'ACB',
        'SHB',
        'VIB',
        'Viet A bank',
        'Eximbank',
        'Đông Á Bank',
    ];

    public function run()
    {
        //

        $faker = Faker::create();
        foreach (range(1,10) as $value) {
            # code...
            DB::table('bank_account')->insert([
                'name' => $this->banks[rand(0,count($this->banks)-1)],
                'number_account' => $faker->unique()->numberBetween(1000000000, 9999999999),
            ]);
        }
    }
}
