<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessoiresVoituresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accessoire_voiture')->delete();
        for ($i = 1; $i <= 100; $i++) {
            $numbers = range(1, 20);
            shuffle($numbers);
            $n = rand(3, 6);
            for ($j = 1; $j <= $n; $j++) {
                DB::table('accessoire_voiture')->insert(
                    [
                        'accessoire_id' => $i,
                        'voiture_id' => $numbers[$j]
                    ]
                );
            }
        }
    }
}
