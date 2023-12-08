<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizzController extends Controller
{
    private const ABILITY = 'quizz';

    public function index()
    {
        return view(self::ABILITY . '.index');
    }
}
