<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    // Show all Instruments
    public function index() {
            return view('instruments.show', [
                'instruments' => Instrument::all()
        ]);
    }
}
