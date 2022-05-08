<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ConsommationsTableSeeder extends Seeder
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
        DB::table('consommations')->delete();
        for ($i = 1; $i <= 100; $i++) {
            $date = $this->randDate();
            $n=rand(0,8);
            $consommations=["cocktail", "vin", "entree", "plat", "dessert", "biere", "sansAlcool", "viennoiseries","boissonChaude"];
            DB::table('consommations')->insert(
                [
                    'nom' => $consommations[$n] . $i,
                    'description' => 'orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                    'image_url' => 'image_url'.$i.'.png',
                    'categorie' => $consommations[$n],
                    'prix' => rand(1, 50),
                    'tags' => "tag".rand(1,9). ", tag".rand(1,9),
                    'etablissement_id' => rand(1,20)
                ]
            );
        }
    }
}
