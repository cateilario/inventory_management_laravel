<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Item;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('loans.index', [
            'loans' => Loan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        return view('loans.store', [
            'item_id' => Item::find($id),
            'items' => Item::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['checkout_date'] = date('Y-m-d');

        $user = auth()->user();
        $request['user_id'] = $user->id;

        $validatedData = $request->validate([
            'user_id' => 'required',
            'item_id' => 'required',
            'checkout_date' => 'required',
            'due_date' => 'required',
        ]);

        Loan::create($validatedData);
        return redirect()->route('loans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $loan = Loan::find($id);
        $loan->returned_date = date('Y-m-d');
        $loan->save();
        return redirect()->route('loans.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loans)
    {
        //
    }
}
