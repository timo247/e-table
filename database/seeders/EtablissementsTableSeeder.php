<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EtablissementsTableSeeder extends Seeder
{
    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etablissements')->delete();
        for ($i = 1; $i <= 20; $i++) {
            $date = $this->randDate();
            DB::table('etablissements')->insert(
                [
                    'nom' => 'Etablissement' . $i,
                    'created_at' => $date,
                    'updated_at' => $date
                ]
            );
        }
    }
}
