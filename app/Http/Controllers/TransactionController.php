<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Transaction; // Pastikan model Transaction sudah diimpor

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $transactions = Transaction::all();

    return view('pages.transactions.index', [
        'transactions' => $transactions,
        'title' => 'Transactions'
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        return view('pages.transactions.create', [
            'products' => $products,
            'title' => 'Add New Transaction'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $product = Product::findOrFail($request->product);

        if($request->quantity > $product->stock){
            return back()->with('eror', 'Quantity exceeds stock, current stock is: ' . $product->stock);
        }

        //untuk mengudate stock
        $update_product['stock'] = $product->stock - $request->quantity;
        $product->update($update_product);

        transaction::create($data);
        return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        Transaction::findOrFail($id)->delete();

        return redirect()->back();
    }
}
