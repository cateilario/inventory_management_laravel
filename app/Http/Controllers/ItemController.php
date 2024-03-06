<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Box;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'picture' => 'image|nullable',
            'box_id' => 'required|exists:boxes,id'
        ]);

        $item = new Item($request->only(['name', 'description', 'price', 'box_id']));
        if ($request->hasFile('picture')) {
            $item->picture = $request->file('picture')->store('items_pictures', 'public');
        }

        $item->save();

        return redirect(route('items.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', [
            'item' => $item,
            'loans' => Loan::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        return view('items.edit', [
            'item' => Item::find($id),
            'boxes' => Box::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'box_id' => 'required|exists:boxes,id'
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('public/photos');
            $validated['picture'] = $path;
        } else {
            $validated['picture'] = null;
        }

        $item = Item::find($id);
        $item->update($validated);

        return redirect(route('items.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect(route('items.index'));
    }
}
