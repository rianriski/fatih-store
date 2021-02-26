<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\User;
use App\Models\Transaction;
use App\Models\ShippingAddress;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Invoice::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('pages.user.orders.index')->with([
            'orders' => $orders
        ]);
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

        return view('pages.user.orders.show')->with([
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
        $orders = Invoice::where('transaction_uuid', 'like', '%' . $search . '%')->paginate(5);

        return view('pages.user.orders.index')->with([
            'orders' => $orders
        ]);
    }
}
