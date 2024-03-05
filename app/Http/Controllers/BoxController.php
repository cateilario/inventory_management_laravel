<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Recuperar todos los vehículos de la base de datos
        $items = Item::all();
        $boxes = Box::all();

        return view('boxes.index', [
            'boxes' => $items,
            'items' => $boxes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('boxes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Box::create($validated);

        return redirect(route('boxes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box): View
    {
        return view('boxes.show', [
            'box' => $box,
            'items' => $box->items,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //Devuelve a la vista edit con el id del box
        return view('boxes.edit', [
            'box' => Box::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(String $id)
    {
        $validated = request()->validate([
            'label' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $box = Box::find($id);
        $box->update($validated);

        return redirect(route('boxes.index'));
    }

    /**
     * Update the box_id for the specified item.
     */
    public function updateItemBox(Item $item, Request $request)
    {
        $request->validate([
            'box_id' => 'nullable|exists:boxes,id',
        ]);

        $item->update(['box_id' => $request->input('box_id')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $box = Box::find($id);

        $box->delete();

        return redirect(route('boxes.index'));
    }
}
