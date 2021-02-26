<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{

    public $photo;

    public function index()
    {
        $coupons = Coupon::where('id', '<>', 3)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('pages.transactions.coupons.index')->with([
            'coupons' => $coupons
        ]);
    }

    public function create()
    {
        return view('pages.transactions.coupons.create');
    }

    public function store(CouponRequest $request)
    {
        Coupon::create([
            'name' => $request->name,
            'discount' => $request->discount,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('coupons')
            ->with('success', 'The coupon has been added successfully');
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);

        return view('pages.transactions.coupons.edit')->with([
            'coupon' => $coupon
        ]);
    }

    public function update(CouponRequest $request, $id)
    {
        $model = Coupon::findOrFail($id);

        $model->update([
            'name' => $request->name,
            'discount' => $request->discount,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('coupons')
            ->with('info', 'The coupon has been updated successfully');
    }

    public function destroy($id)
    {
        $model = Coupon::findOrFail($id)->delete();

        return redirect()
            ->route('coupons')
            ->with('danger', 'The coupon has been deleted successfully');
    }
}
