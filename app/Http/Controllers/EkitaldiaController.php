<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekitaldia;
use App\Models\Kategoria;
use Illuminate\Support\Facades\Storage;

class EkitaldiaController extends Controller
{
    function index(){
        $ekitaldiak = Ekitaldia::all();

        return view('ekitaldiak.show', [
            'ekitaldiak' => $ekitaldiak
        ]);
    }

    public function create()
    {
        $kategoriak = Kategoria::all();
        return view('ekitaldiak.create', compact('kategoriak'));
    }

    public function store(Request $request)
    {
        // 1. Datuen balidazioa
        $validatedData = $request->validate([
            'izenburua'    => 'required|string|max:255',
            'deskribapena' => 'required|string',
            'data'         => 'required|date',
            'aretoa'       => 'required|string|max:255',
            'edukiera'     => 'required|integer|min:1',
            'prezioa'      => 'required|numeric|min:0',
            'kategoria_id' => 'required|exists:kategoriak,id',
            'irudia'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 2. Irudia baldin badago, gorde eta bidea lortu
        if ($request->hasFile('irudia')) {
            // storage/app/public/ekitaldiak karpetan gordeko da eta bidea bueltatuko du
            $path = $request->file('irudia')->store('ekitaldiak', 'public');
            // Adibidez bidea: 'ekitaldiak/abc123xyz.jpg' -> /storage/ekitaldiak/abc123xyz.jpg
            $validatedData['image_url'] = Storage::url($path);
        }

        // 2. Datu-basean ekitaldi berria sortu
        Ekitaldia::create($validatedData);

        // 3. Ekitaldien zerrendara bideratu (flash mezu batekin)
        return redirect()->route('ekitaldia.show')
            ->with('success', 'Ekitaldia ondo sortu da!');
    }

    public function show($id){
        $ekitaldia = Ekitaldia::findOrFail($id);

        return view('ekitaldiak.show', [
            'ekitaldia' => $ekitaldia
        ]);
    }

    public function edit($id){
        $ekitaldia = Ekitaldia::findOrFail($id);
        $kategoriak = Kategoria::all();

        return view('ekitaldiak.edit', [
            'ekitaldia' => $ekitaldia,
            'kategoriak' => $kategoriak,
        ]);
    }

    public function update($id, Request $request){

        $request->validate([
            'izenburua' => 'required|string|max:255',
            'aretoa' => 'required|string|max:255',
            'deskribapena' => 'required|string|max:1000',
            'data' => 'required|date',
            'prezioa' => 'required|numeric|min:0',
            'edukiera' => 'required|integer|min:1',
            'irudia'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $ekitaldia = Ekitaldia::findOrFail($id);

        if ($request->hasFile('irudia')) {
            // Irudi zaharra ezabatu storage-tik lehendik bazegoen
            if ($ekitaldia->image_url) {
                $oldPath = str_replace('/storage/', '', $ekitaldia->image_url);
                Storage::disk('public')->delete($oldPath);
            }

            // Irudi berria gorde
            $path = $request->file('irudia')->store('ekitaldiak', 'public');
            $validatedData['image_url'] = Storage::url($path);
        }

        $ekitaldia->update($validatedData);

        return redirect()->route('ekitaldia.index')->with('success', 'Ekitaldia ongi eguneratu da!');
    }

    public function destroy($id){
        $ekitaldia = Ekitaldia::findOrFail($id);
        $ekitaldia->delete();
    
        return redirect()->route('dashboard')->with('success', 'Ekitaldia ongi borratu da!');
    }
}
