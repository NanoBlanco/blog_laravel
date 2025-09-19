<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with('user')->latest()->take(10)->get();

        return view('home', ['chirps' => $chirps]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mensaje' => 'required|string|max:250|min:5',
        ],[
            'mensaje.required' => 'Debe ingresar un mensaje',
            'mensaje.max' => 'El mensaje debe ser máximo de 250 caracteres',
            'mensaje.min' => 'El mensaje debe tener al menos 5 caracteres'
        ]);

        Chirp::create([
            'mensaje' => $validated['mensaje'],
        ]);

        return redirect('/')->with('success','Tu mensaje ha sido mostrado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        return view('chirps.edit', compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $validated = $request->validate([
            'mensaje' => 'required|string|max:250|min:5',
        ], [
            'mensaje.required' => 'Debe ingresar un mensaje',
            'mensaje.max' => 'El mensaje debe ser máximo de 250 caracteres',
            'mensaje.min' => 'El mensaje debe tener al menos 5 caracteres'
        ]);

        $chirp->update($validated);

        return redirect('/')->with('success', 'Tu mensaje ha sido actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        $chirp->delete();

        return redirect('/')->with('success', 'Tu mensaje ha sido eliminado!');
    }
}
