<?php

namespace App\Http\Controllers;

class AccueilController extends Controller {
    private const ABILITY = 'accueil';

    public function index() {
        return view(self::ABILITY.'.index');
    }
}
