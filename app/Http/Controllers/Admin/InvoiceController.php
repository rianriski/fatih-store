<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use App\Models\ShippingAddress;
use App\Models\Transaction;
use App\Models\Coupon;
use App\User;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoices = Invoice::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.transactions.invoices.index')->with([
            'invoices' => $invoices
        ]);
    }

    public function create()
    {
        $users = User::all();
        $shipping_addresses = ShippingAddress::all();
        $coupons = Coupon::all();

        return view('pages.transactions.invoices.create')->with([
            'users' => $users,
            'shipping_addresses' => $shipping_addresses,
            'coupons' => $coupons,
        ]);
    }

    public function dropdownUser($user_id)
    {

        $uuid = DB::table('transactions')->where('user_id', $user_id)->pluck('uuid');

        echo json_encode($uuid);
    }

    public function store(InvoiceRequest $request)
    {

        Invoice::create([
            'user_id' => $request->user_id,
            'transaction_uuid' => $request->transaction_uuid,
            'shipping_address_id' => $request->shipping_address_id,
            'sub_total' => $request->sub_total,
            'courier' => $request->courier,
            'shipping_cost' => $request->shipping_cost,
            'coupon' => $request->coupon,
            'discount' => $request->discount,
            'transaction_total' => $request->transaction_total,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('invoices')
            ->with('success', 'The invoice has been added successfully');
    }

    public function totalStore($id, $total)
    {

        $model = Invoice::findOrFail($id);
        $model->update([
            'transaction_total' => $total
        ]);

        return "Update";
    }

    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        $modelCoupon = Coupon::where('id', '=', 3)->get();
        $coupon = $modelCoupon[0];

        // parameter
        $user_id = Invoice::where('id', $id)->pluck('user_id');
        $coupon_id = Invoice::where('id', $id)->pluck('coupon_id');
        $transaction_uuid = Invoice::where('id', $id)->pluck('transaction_uuid');
        $shipping_address_id = Invoice::where('id', $id)->pluck('shipping_address_id');

        // additional data
        $user = User::where('id', $user_id[0])->first();
        $transactions = Transaction::where('uuid', $transaction_uuid[0])->get();
        $address = ShippingAddress::where('id', $shipping_address_id[0])->first();

        if ($coupon_id[0] == null) {
            $coupon;
        } else {
            $coupon = Coupon::where('id', $coupon_id[0])->first();
        }

        return view('pages.transactions.invoices.show')->with([
            'invoice' => $invoice,
            'user' => $user,
            'transactions' => $transactions,
            'address' => $address,
            'coupon' => $coupon,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $invoices = Invoice::where('transaction_uuid', 'like', '%' . $search . '%')->paginate(5);

        return view('pages.transactions.invoices.index')->with([
            'invoices' => $invoices
        ]);
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $modelCoupon = Coupon::where('id', '=', 3)->get();
        $coupon = $modelCoupon[0];

        // parameter
        $user_id = Invoice::where('id', $id)->pluck('user_id');
        $coupon_id = Invoice::where('id', $id)->pluck('coupon_id');
        $transaction_uuid = Invoice::where('id', $id)->pluck('transaction_uuid');
        $shipping_address_id = Invoice::where('id', $id)->pluck('shipping_address_id');

        // additional data
        $user = User::where('id', $user_id[0])->first();
        $transactions = Transaction::where('uuid', $transaction_uuid[0])->get();
        $address = ShippingAddress::where('id', $shipping_address_id[0])->first();

        if ($coupon_id[0] == null) {
            $coupon;
        } else {
            $coupon = Coupon::where('id', $coupon_id[0])->first();
        }

        return view('pages.transactions.invoices.edit')->with([
            'invoice' => $invoice,
            'user' => $user,
            'transactions' => $transactions,
            'address' => $address,
            'coupon' => $coupon,
        ]);
    }

    public function pending($id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->update([
            'status' => "pending",
        ]);

        return redirect()
            ->route('invoices')
            ->with('info', 'The invoice has been updated successfully');
    }

    public function success($id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->update([
            'status' => "success",
        ]);

        return redirect()
            ->route('invoices')
            ->with('info', 'The invoice has been updated successfully');
    }

    public function failed($id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->update([
            'status' => "failed",
        ]);

        return redirect()
            ->route('invoices')
            ->with('info', 'The invoice has been updated successfully');
    }

    public function destroy($id)
    {
        $model = Invoice::findOrFail($id);
        $transaction_uuid = Invoice::where('id', $id)->pluck('transaction_uuid');

        DB::table('transactions')
            ->where('uuid', $transaction_uuid)
            ->delete();

        $model->delete();

        return redirect()
            ->route('invoices')
            ->with('danger', 'The invoice has been deleted successfully');
    }
}
