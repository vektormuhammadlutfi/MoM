<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HoldingController extends Controller
{
    public function index() {
        return view('holding');
    }
}
