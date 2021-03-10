<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabelaController extends Controller
{
    //
    public function tabela() {
        return view("site.tabela");
    }
}
