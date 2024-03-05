<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Box;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperar todos los vehículos de la base de datos
        $items = Item::all();

        // Pasar la lista de vehículos a la vista
        return view('items.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $boxes = Box::all();
        return view('items.create', ['boxes' => $boxes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'picture' => 'image|nullable',
            'box_id' => 'required|numeric'
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('public/photos');
            $validated['picture'] = $path;
        }

        $request->user()->items()->create($validated);

        return redirect(route('items.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'picture' => 'image|nullable',
            'box_id' => 'required|numeric'
        ]);

        $item->update($validated);

        return redirect(route('item.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $this->authorize('delete', $item);

        $item->delete();

        return redirect(route('items.index'));
    }
}
