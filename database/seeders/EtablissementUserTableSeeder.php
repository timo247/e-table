<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EtablissementUserTableSeeder extends Seeder
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
        DB::table('etablissement_user')->delete();
        $date = $this->randDate();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('etablissement_user')->insert(
                [
                    'user_id' => $i,
                    'etablissement_id' => $i,
                    'created_at' => $date,
                    'updated_at' => $date
                ]
            );
        }

        //Relie l'utilisateur 1 à tous les établissements
        for ($i = 2; $i <= 10; $i++) {
            DB::table('etablissement_user')->insert(
                [
                    'user_id' => 1,
                    'etablissement_id' => $i
                ]
            );
        }
    }
}
