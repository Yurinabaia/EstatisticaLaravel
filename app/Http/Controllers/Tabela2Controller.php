<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class Tabela2Controller extends Controller
{
    //
    public function mediana() 
    {
        return View('site.tela2');
    }
}
