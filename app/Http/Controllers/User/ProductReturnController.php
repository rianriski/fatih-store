<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductReturnRequest;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\ProductReturn;
use Illuminate\Support\Facades\Auth;

class ProductReturnController extends Controller
{

    public function index()
    {
        $products = ProductReturn::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('pages.user.returns.index')->with([
            'products' => $products
        ]);
    }

    public function create()
    {
        $invoices = Invoice::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('pages.user.returns.create')->with([
            'invoices' => $invoices
        ]);
    }

    public function store(ProductReturnRequest $request)
    {
        $uuid = Invoice::where('id', $request->invoice_id)->pluck('transaction_uuid');

        if ($request->file('photo_1')) {
            $main = $request->file('photo_1')->store('photos');
        } else {
            $main = '';
        }

        if ($request->file('photo_2')) {
            $second = $request->file('photo_2')->store('photos');
        } else {
            $second = '';
        }

        if ($request->file('photo_3')) {
            $third = $request->file('photo_3')->store('photos');
        } else {
            $third = '';
        }

        ProductReturn::create([
            'user_id' => Auth::id(),
            'invoice_id' => $request->invoice_id,
            'uuid' => $uuid[0],
            'reason' => $request->reason,
            'courier' => $request->courier,
            'receipt' => $request->receipt,
            'status' => 'pending',
            'photo_1' => $main,
            'photo_2' => $second,
            'photo_3' => $third,
        ]);

        return redirect()
            ->route('user.returns')
            ->with('success', 'The request has been applied successfully');
    }

    public function show($id)
    {
        $data = ProductReturn::findOrFail($id);

        return view('pages.user.returns.show')->with([
            'data' => $data
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = ProductReturn::where('uuid', 'like', '%' . $search . '%')->paginate(5);

        return view('pages.user.returns.index')->with([
            'products' => $products
        ]);
    }
}
