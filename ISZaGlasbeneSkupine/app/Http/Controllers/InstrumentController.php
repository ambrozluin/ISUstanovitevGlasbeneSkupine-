<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

    // Add to my instruments
    public function store(Instrument $instrument) {
       // dd($instrument->id);
        $newInstrument = Instrument::create([
            'ime' => $instrument->ime,
            'cena' => $instrument->cena,
            'vrsta' => $instrument->vrsta,
            'user_id' => auth()->id()
        ]);

        return redirect('/instruments')->with('message', 'Instrument added successfully');
    }

    public function list() {
        return view('instruments.list', [
            'instruments' => Instrument::where('user_id',auth()->id())->get()
        ]);
    }

    public function remove(Instrument $instrument)
    {
        $instruments = Instrument::all();
        $instrument = $instruments->find($instrument->id);
        $instrument -> delete();
        
        return redirect('/instruments/list')->with('message', 'Instrument deleted successfully');
    }
}
