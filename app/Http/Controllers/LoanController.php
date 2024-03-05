<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use Illuminate\Http\Request;
use App\Models\Item;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperar todos los vehículos de la base de datos
        $loans = Loan::all();

        // Pasar la lista de vehículos a la vista
        return view('loans.index', ['loans' => $loans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('loans.create', [
            'items' => Item::all(),
            'item_id' => Item::find($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Para el checkout_date cogemos la fecha de creacion del prestamo
        $request['checkout_date'] = date('Y-m-d');


        //cogemos el usuario que esta logeado
        $user = auth()->user();
        $request['user_id'] = $user->id;

        //Guarda el prestamo en la base de datos, debemos guardar el nombre del usuario que lo presta, el nombre del item y la fecha de devolucion
        $validatedData = $request->validate([
            'user_id' => 'required',
            'item_id' => 'required',
            'checkout_date' => 'required',
            'due_date' => 'required',
        ]);

        //pasamos una variable que guarde el nombre del item que coincida con item_id
        $item = Item::find($request['item_id']);

        //Le pasamos los users y los items a la vista
        Loan::create($validatedData)::with('user', 'items')->get();
        return redirect()->route('loans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
