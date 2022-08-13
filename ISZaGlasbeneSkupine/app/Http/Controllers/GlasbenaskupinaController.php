<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Glasbenaskupina;
use App\Models\User;

class GlasbenaskupinaController extends Controller
{
    // Show all listings
    public function index() {
        return view('glasbeneskupine.index', [
            'glasbeneskupine' => Glasbenaskupina::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //Show single listing
    public function show(Glasbenaskupina $glasbenaskupina) {

        $users = User::all();
        return view('glasbeneskupine.show', [
            'glasbeneskupine' => $glasbenaskupina,
            'users' => $users
        ]);
    }

    // Show Create Form
    public function create() {
        return view('glasbeneskupine.create');
    }

    // Store Listing Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'imeskupine' => 'required',
            'zanr' => 'required',
            'lokacija' => 'required',
            'tags' => 'required',
            'opis' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Glasbenaskupina::create($formFields);

        return redirect('/')->with('message', 'Music group created successfully!');
    }

    // Show Edit Form
    public function edit(Glasbenaskupina $glasbenaskupina) {
        return view('glasbeneskupine.edit', ['glasbenaskupina' => $glasbenaskupina]);
    }

    // Update Listing Data
    public function update(Request $request, Glasbenaskupina $glasbenaskupina) {
        // Make sure logged in user is owner
        if($glasbenaskupina->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'imeskupine' => 'required',
            'zanr' => 'required',
            'lokacija' => 'required',
            'tags' => 'required',
            'opis' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $glasbenaskupina->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Glasbenaskupina $glasbenaskupina) {
        // Make sure logged in user is owner
        if($glasbenaskupina->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $glasbenaskupina->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // Manage Listings
    public function manage() {
        return view('glasbeneskupine.manage', ['glasbeneskupine' => auth()->user()->glasbeneskupine()->get()]);
    }
    
}
