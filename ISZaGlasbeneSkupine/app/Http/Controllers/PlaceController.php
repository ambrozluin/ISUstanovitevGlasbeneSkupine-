<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index() {
        return view('places.list', [
            'places' => Place::all()
        ]);
    }

    public function create() {
        return view('places.create');
    }

    // Store Place data
    public function store(Request $request) {

        $formFields = $request->validate([
            'lokacija' => 'required',
            'cena' => 'required',
            'tags' => 'required',
            'telefon' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Place::create($formFields);

        return redirect('/places')->with('message', 'Music place created successfully!');
    }
}
