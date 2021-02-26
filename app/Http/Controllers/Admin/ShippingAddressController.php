<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingAddress;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ShippingAddressRequest;

class ShippingAddressController extends Controller
{

    public function index()
    {
        $addresses = ShippingAddress::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.shipping.index')->with([
            'addresses' => $addresses
        ]);
    }

    public function create()
    {
        $users = User::all()->except(1);

        return view('pages.shipping.create')->with([
            'users' => $users
        ]);
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
            ->route('shipping.addresses')
            ->with('success', 'The address has been added successfully');
    }

    public function show($id)
    {
        $address = ShippingAddress::where('id', $id)->first();

        return view('pages.shipping.show')->with([
            'address' => $address
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $addresses = ShippingAddress::where('address', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('pages.shipping.index')->with([
            'addresses' => $addresses
        ]);
    }

    public function edit($id)
    {
        $users = User::all();

        $address = ShippingAddress::where('id', $id)->first();

        return view('pages.shipping.edit')->with([
            'address' => $address,
            'users' => $users,
        ]);
    }

    public function update(ShippingAddressRequest $request, $id)
    {
        $data = $request->all();
        $model = ShippingAddress::where('id', $id)->first();

        $model->update($data);

        return redirect()
            ->route('shipping.addresses')
            ->with('info', 'The address has been updated successfully');
    }

    public function destroy($id)
    {
        $model = ShippingAddress::where('id', $id)->first();
        $model->delete();

        return redirect()
            ->route('shipping.addresses')
            ->with('danger', 'The address has been deleted successfully');
    }
}
