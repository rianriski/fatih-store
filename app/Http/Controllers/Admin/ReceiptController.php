<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReceiptRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Receipt;

class ReceiptController extends Controller
{

    public function index()
    {
        $receipts = Receipt::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.transactions.receipts.index')->with([
            'receipts' => $receipts
        ]);
    }

    public function create()
    {
        $invoices = Invoice::where('status', 'pending')->get();

        return view('pages.transactions.receipts.create')->with([
            'invoices' => $invoices
        ]);
    }

    public function store(ReceiptRequest $request)
    {
        $invoice = Invoice::findOrFail($request->invoice_id);
        $uuid = $invoice->pluck('transaction_uuid');

        Receipt::create([
            'invoice_id' => $request->invoice_id,
            'uuid' => $uuid[0],
            'receipt' => $request->receipt,
        ]);

        return redirect()
            ->route('receipts')
            ->with('success', 'The receipt information has been added successfully');
    }

    public function show($id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $receipts = Receipt::where('uuid', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('pages.transactions.receipts.index')->with([
            'receipts' => $receipts
        ]);
    }

    public function edit($id)
    {
        $receipt = Receipt::findOrFail($id);

        return view('pages.transactions.receipts.edit')->with([
            'receipt' => $receipt
        ]);
    }

    public function update(ReceiptRequest $request, $id)
    {
        $receipt = Receipt::findOrFail($id);

        $receipt->update([
            'receipt' => $request->receipt
        ]);

        return redirect()
            ->route('receipts')
            ->with('info', 'The receipt information has been updated successfully');
    }

    public function destroy($id)
    {
        $receipt = Receipt::findOrFail($id);
        $receipt->delete();

        return redirect()
            ->route('receipts')
            ->with('danger', 'The receipt information has been deleted successfully');
    }
}
