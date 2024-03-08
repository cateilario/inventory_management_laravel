<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Item;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

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
    public function create(): View
    {
        $item_id = request()->input('item_id');

        return view('loans.create', [
            'items' => Item::all(),
            'users' => User::all(),
            'item_id' => $item_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $validated = $request->validate([
        'item_id' => 'required',
        'due_date' => 'required',
    ]);

    $validated['user_id'] = auth()->user()->id;
    $validated['checkout_date'] = now();

    Loan::create($validated);

    return redirect()->route('loans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan): View
    {
        $loan = Loan::find($loan->id);

        return view('loans.index', [
            'loans' => Loan::all(),
            'user' => $loan->user,
            'item' => $loan->item,
            'loan'  => $loan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        // return view('loans.edit', [
        //     'loan' => Loan::find($id),
        //     'items' => Item::all(),
        //     'item_id' => Item::find(Loan::find($id)->item_id)

        // ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $loan->update(['returned_date'=>now()]);
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
