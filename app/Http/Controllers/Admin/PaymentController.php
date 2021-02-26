<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Models\Invoice;
use App\User;
use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.transactions.payments.index')->with([
            'payments' => $payments
        ]);
    }

    public function create()
    {
        $invoices = Invoice::paginate(5);

        return view('pages.transactions.payments.create')->with([
            'invoices' => $invoices
        ]);
    }

    public function store(PaymentRequest $request)
    {
        $photo = $request->file('payment_confirmation')->store('photos');

        Payment::create([
            'invoice_id' => $request->invoice_id,
            'payment_confirmation' => $photo,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('payments')
            ->with('success', 'The payment has been added successfully');
    }

    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        $invoice_id = Payment::where('id', $id)->pluck('invoice_id');
        $invoice = Invoice::findOrFail($invoice_id[0]);

        // retrieve transaction data
        $transaction_uuid = Invoice::where('id', $invoice_id[0])->pluck('transaction_uuid');
        $transactions = Transaction::where('uuid', $transaction_uuid[0])->get();

        // retrieve user data
        $user_id = Invoice::where('id', $invoice_id)->pluck('user_id');
        $user = User::findOrFail($user_id[0]);
        $customer = Customer::findOrFail($user_id[0]);

        return view('pages.transactions.payments.show')->with([
            'payment' => $payment,
            'user' => $user,
            'invoice' => $invoice,
            'customer' => $customer,
            'transactions' => $transactions
        ]);
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $invoice_id = Payment::where('id', $id)->pluck('invoice_id');
        $invoice = Invoice::findOrFail($invoice_id[0]);

        // retrieve transaction data
        $transaction_uuid = Invoice::where('id', $invoice_id[0])->pluck('transaction_uuid');
        $transactions = Transaction::where('uuid', $transaction_uuid[0])->get();

        // retrieve user data
        $user_id = Invoice::where('id', $invoice_id)->pluck('user_id');
        $user = User::findOrFail($user_id[0]);
        $customer = Customer::findOrFail($user_id[0]);

        return view('pages.transactions.payments.edit')->with([
            'payment' => $payment,
            'user' => $user,
            'invoice' => $invoice,
            'customer' => $customer,
            'transactions' => $transactions
        ]);
    }

    public function failed($id)
    {
        $payment = Payment::findOrFail($id);

        $payment->update([
            'status' => "Failed",
        ]);

        return redirect()
            ->route('payments')
            ->with('info', 'The payment has been updated successfully');
    }

    public function success($id)
    {
        $payment = Payment::findOrFail($id);

        $payment->update([
            'status' => "Success",
        ]);

        return redirect()
            ->route('payments')
            ->with('info', 'The payment has been updated successfully');
    }

    public function pending($id)
    {
        $payment = Payment::findOrFail($id);

        $payment->update([
            'status' => "Pending",
        ]);

        return redirect()
            ->route('payments')
            ->with('info', 'The payment has been updated successfully');
    }

    public function destroy($id)
    {
        $data = Payment::findOrFail($id);
        $photo = $data->pluck('payment_confirmation');

        // dd($photo[0]);
        $data->delete();
        Storage::delete($photo[0]);

        return redirect()
            ->route('payments')
            ->with('danger', 'The product has been deleted successfully');
    }
}
