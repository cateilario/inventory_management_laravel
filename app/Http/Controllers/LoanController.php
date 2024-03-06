<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('loans.index', [
            'loans' => Loan::all(),
            'items' => Item::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loans.create', [
            'items' => Item::all(),
            'users' => User::all(),
            'selectedItem' => request('item_id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user()->id;
        $validated['user_id'] = $user;

        $validated= $request->validate([
            'item_id' => 'required|exists:items,id',
            'due_date' => 'required|date',
        ]);

        $validated['checkout_date'] = now();

        Loan::create($validated);
        return redirect()->route('loans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return view('loans.show', [
            'loan' => $loan,
            'item' => $loan->item,
            'user' => $loan->user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        // $loan = Loan::find($id);
        // $loan->returned_date = date('Y-m-d');
        // $loan->save();
        // return redirect()->route('loans.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
         $loan->update([
            'returned_date' => now(),
        ]);

        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loans)
    {
        //
    }
}
