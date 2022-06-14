<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static $mois = [
        "Janvier",
        "Fevrier",
        "Mars",
        "Avril",
        "Mai",
        "Juin",
        "Juillet",
        "Août",
        "Septembre",
        "Octobre",
        "Novembre",
        "Decembre"
    ];
    public function run()
    {
        foreach (self::$mois as $mois) {
            DB::table('Mois')->insert([
                'libelle' => $mois
            ]);
        }
    }
}
