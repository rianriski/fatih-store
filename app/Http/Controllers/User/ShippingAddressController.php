<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShippingAddressRequest;

class ShippingAddressController extends Controller
{
    public function index()
    {
        $addresses = ShippingAddress::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('pages.user.addresses.index')->with([
            'addresses' => $addresses
        ]);
    }

    public function create()
    {
        return view('pages.user.addresses.create');
    }

    public function store(ShippingAddressRequest $request)
    {
        ShippingAddress::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'receiver' => $request->receiver,
            'phone' => $request->phone,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
        ]);

        return redirect()
            ->route('user.shipping.addresses')
            ->with('success', 'The address has been added successfully');
    }

    public function show($id)
    {
        $address = ShippingAddress::where('id', $id)->first();

        return view('pages.user.addresses.show')->with([
            'address' => $address
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $addresses = ShippingAddress::where('user_id', Auth::id())
            ->where('address', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('pages.user.addresses.index')->with([
            'addresses' => $addresses
        ]);
    }

    public function edit($id)
    {
        $address = ShippingAddress::where('id', $id)->first();

        return view('pages.user.addresses.edit')->with([
            'address' => $address,
        ]);
    }

    public function update(ShippingAddressRequest $request, $id)
    {
        $data = $request->all();
        $model = ShippingAddress::where('id', $id)->first();

        $model->update($data);

        return redirect()
            ->route('user.shipping.addresses')
            ->with('info', 'The address has been updated successfully');
    }

    public function destroy($id)
    {
        $model = ShippingAddress::where('id', $id)->first();
        $model->delete();

        return redirect()
            ->route('user.shipping.addresses')
            ->with('danger', 'The address has been deleted successfully');
    }
}
