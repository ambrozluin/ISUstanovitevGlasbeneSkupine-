<?php

namespace App\Http\Controllers;

use App\Models\GlasbenaSkupina;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class GlasbenaSkupinaController extends Controller
{

    //show all
    public function index() {
        return view('index', [
            'glasbeneskupine' => GlasbenaSkupina::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //Show single glasbena skupina
    public function show(GlasbenaSkupina $glasbenaskupina) {
        return view('glasbeneskupine.show', [
            'glasbenaskupina' => $glasbenaskupina
        ]);
    }

    // Show Create Form
    public function create() {
        return view('glasbeneskupine.ustanovi');
    }

    // Store music group data
    public function store(Request $request) {
        $formFields = $request->validate([
            'imeskupine' => ['required', Rule::unique('glasbeneskupine', 'imeskupine')],
            'zanr' => ['required'],
            'lokacija' => 'required',
            'oznake' => 'required',
            'opis' => 'required'
        ]);

        if($request->hasFile('slika')) {
            $formFields['slika'] = $request->file('slika')->store('slike', 'public');
        }

        $formFields['user_id'] = auth()->id();

        GlasbenaSkupina::create($formFields);

        return redirect('/')->with('message', 'Glasbena skupina ustanovljena!');
    }
}
