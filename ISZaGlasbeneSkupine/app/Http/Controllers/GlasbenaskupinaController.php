<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Glasbenaskupina;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GlasbenaskupinaController extends Controller
{
    // Show all Music groups
    public function index() {
        return view('glasbeneskupine.index', [
            'glasbeneskupine' => Glasbenaskupina::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //Show single Music group
    public function show(Glasbenaskupina $glasbenaskupina) {
        $authUser = Auth::id();
        $users = User::all();
        return view('glasbeneskupine.show', [
            'glasbeneskupine' => $glasbenaskupina,
            'users' => $users,
            'authUser' => $authUser
        ]);
    }

    // Show Create Form
    public function create() {
        return view('glasbeneskupine.create');
    }

    // Store Music group Data
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

    // Update Music group Data
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

        return back()->with('message', 'Music group updated successfully!');
    }

    // Delete Music group
    public function destroy(Glasbenaskupina $glasbenaskupina) {
        // Make sure logged in user is owner
        if($glasbenaskupina->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $glasbenaskupina->delete();
        return redirect('/')->with('message', 'Music group deleted successfully');
    }

    // Manage Music group
    public function manage() {
        return view('glasbeneskupine.manage', ['glasbeneskupine' => auth()->user()->glasbeneskupine()->get()]);
    }
    
}
