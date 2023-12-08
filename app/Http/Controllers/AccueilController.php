<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;

class AccueilController extends Controller {
    private const ABILITY = 'accueil';

    public function index() {
        $response = Http::get('https://data-transitions2050.ademe.fr/data-fair/api/v1/catalog/datasets?topics=TJWq9NFA4igXtdTLEYRa0,Iiyy_fvwjxDnhG9hu3ZVF,osPW_q87OEXxcllo_gAj4&select=id');

        $table_ids = [];
        if($response->successful()) {
            $results = $response->json();
            foreach($results['results'] as $result) {
                array_push($table_ids, $result['id']);
            }
        }

        return view(self::ABILITY.'.index', compact('table_ids'));
    }
}
