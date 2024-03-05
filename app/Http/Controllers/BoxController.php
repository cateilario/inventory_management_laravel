<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Http\Requests\StoreBoxRequest;
use App\Http\Requests\UpdateBoxRequest;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperar todos los vehículos de la base de datos
        $boxes = Box::all();

        // Pasar la lista de vehículos a la vista
        return view('boxes.index', ['boxes' => $boxes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $boxes = Box::all();
        return view('boxes.create', ['boxes' => $boxes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoxRequest $request)
    {
        $validated = $request->validate([
            'label' => 'required|max:255',
            'location' => 'required|max:255'
        ]);

        $request->user()->boxes()->create($validated);

        return redirect(route('boxes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        return view('boxes.show', ['box' => $box]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box)
    {
        return view('boxes.edit', ['box' => $box]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoxRequest $request, Box $box)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $box->update($validated);

        return redirect(route('boxes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        $box->delete();

        return redirect(route('boxes.index'));
    }
}
