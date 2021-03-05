<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //
    public function score() {
        return view("site.Score");
    }
}
