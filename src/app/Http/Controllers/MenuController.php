<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show()
    {
        if (auth()->check()) {
            return view('menu.menu1');
        }
        return view('menu.menu2');
    }
}
