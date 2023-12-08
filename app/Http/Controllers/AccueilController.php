<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;

class AccueilController extends Controller {
    private const ABILITY = 'accueil';

    public function index() {
        return view(self::ABILITY.'.index');
    }
}
