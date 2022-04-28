<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VoituresTableSeeder extends Seeder
{


    private function randDate() {
        $nbJours = rand(-2800, 0);
        return Carbon::now()->addDays($nbJours);
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('voitures')->delete();
        for ($i = 1; $i <= 100; $i++) {
            $date = $this->randDate();
            DB::table('voitures')->insert([
                'marque' => 'Marque' . $i,
                'type' => 'Type' . $i,
                'couleur'=>'couleur'.$i,
                'cylindree'=> rand(1, 1.5),
                'user_id' => rand(1, 10),
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }
}
