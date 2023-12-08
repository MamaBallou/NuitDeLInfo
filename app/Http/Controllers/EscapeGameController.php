<?php

namespace App\Http\Controllers;

use App\Enums\Pages;
use Illuminate\Http\Request;

class EscapeGameController extends Controller
{
    private const ABILITY = 'escape-game';

    public function index()
    {
        return view(self::ABILITY . '.index');
    }
}
