<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccessoiresTableSeeder extends Seeder
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
        DB::table('accessoires')->delete();
        for ($i = 1; $i <= 20; $i++) {

            $randN = rand(0,2);
            $types=["Kit Main Lbre", "Navigateur GPS", "Ecran Passager"];

            $date = $this->randDate();
            DB::table('accessoires')->insert(
                [
                    'type' => $types[$randN],
                    'type_url' => $this->reecritureUrl($types[$randN]),
                    'created_at' => $date,
                    'updated_at' => $date
                ]
            );
        }
    }

    private function reecritureUrl($string) {
        $accent=
    "ÀÁÂàÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâàäåæ" .
    "çèéêëìíîïðñòóôõöøùúûýýþÿ";
        $noAccent="aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby";
        $reecriture=strtr(trim($string),$accent,$noAccent);
        $url=preg_replace("# #","-",$reecriture);
        return  $url;
        }
}
