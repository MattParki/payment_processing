<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaTableController extends Controller
{
    public function index() {
        return view ('pizza-menu');
    }
}
