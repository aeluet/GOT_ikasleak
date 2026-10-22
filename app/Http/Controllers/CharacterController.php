<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    function index(){
        $characters = Character::all();

        return view('dashboard', [
            'characters' => $characters
        ]);
    }

    function create(){
        return view('submit');
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'actor' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        
        Character::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Pertsonaia ongi gehitu da!');

    }

    function show($id){
        $character = Character::findOrFail($id);

        return view('show', [
            'character' => $character
        ]);
    }

    function edit($id){
        $character = Character::findOrFail($id);

        return view('edit', [
            'character' => $character
        ]);
    }

    function update($id, Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'actor' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $character = Character::findOrFail($id);
        $character->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Pertsonaia ongi eguneratu da!');
    }

    function destroy($id){
        $character = Character::findOrFail($id);
        $character->delete();
    
        return redirect()->route('dashboard')->with('success', 'Pertsonaia ongi borratu da!');
    }
}
