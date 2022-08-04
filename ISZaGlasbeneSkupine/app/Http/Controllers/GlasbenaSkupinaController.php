<?php

namespace App\Http\Controllers;

use App\Models\GlasbenaSkupina;
use Illuminate\Http\Request;

class GlasbenaSkupinaController extends Controller
{

    // Show Create Form
    public function create() {
        return view('skupine.ustanovi');
    }
}
