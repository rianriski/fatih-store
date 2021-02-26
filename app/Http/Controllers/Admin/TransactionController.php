<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Product;
use App\Models\Transaction;
use App\Http\Requests\TransactionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.transactions.list.index')->with([
            'transactions' => $transactions
        ]);
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();

        return view('pages.transactions.list.create')->with([
            'products' => $products,
            'users' => $users,
        ]);
    }

    public function store(TransactionRequest $request)
    {
        $uuid = Str::upper('TRX' . uniqid());

        $data = $request->all();
        $quantity = (int)$data['quantity'][0];
        $price = Product::findOrFail($request->product_id)->pluck('price');
        $total = (int)$price[0] * (int)$quantity;

        Transaction::create([
            'uuid' => $uuid,
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'transaction_total' => $total
        ]);

        return redirect()
            ->route('transactions')
            ->with('success', 'The transaction has been added successfully');
    }

    public function show($id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $transactions = Transaction::where('uuid', 'like', '%' . $search . '%')->paginate(5);

        return view('pages.transactions.list.index')->with([
            'transactions' => $transactions
        ]);
    }

    public function edit($id)
    {
        $products = Product::all();
        $users = User::all();
        $transaction = Transaction::where('id', $id)->first();

        return view('pages.transactions.list.edit')->with([
            'products' => $products,
            'users' => $users,
            'transaction' => $transaction,
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($uuid)
    {
        $model = Transaction::where('uuid', $uuid)->get();
        $model->delete();

        return redirect()
            ->route('transactions')
            ->with('danger', 'The transaction has been deleted successfully');
    }
}
