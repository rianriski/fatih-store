<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReturn;

class InvoiceReturnController extends Controller
{
    public function index()
    {
        $products = ProductReturn::orderBy('created_at', 'desc')
            ->paginate(5);

        return view('pages.returns.index')->with([
            'products' => $products
        ]);
    }

    public function show($id)
    {
        $data = ProductReturn::findOrFail($id);

        return view('pages.returns.show')->with([
            'data' => $data
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = ProductReturn::where('uuid', 'like', '%' . $search . '%')->paginate(5);

        return view('pages.returns.index')->with([
            'products' => $products
        ]);
    }

    public function edit($id)
    {
        $return = ProductReturn::findOrFail($id);

        return view('pages.returns.edit')->with([
            'return' => $return
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
