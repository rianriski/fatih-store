<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\User;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    public $photo;

    public function index()
    {
        $customers = User::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.customers.index')->with([
            'customers' => $customers
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $customers = User::where('name', 'like', '%' . $search . '%')->paginate(5);

        return view('pages.customers.index')->with([
            'customers' => $customers
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $customer = DB::table('customers')->where('user_id', $id)->first();
        return view('pages.customers.show')->with([
            'customer' => $customer,
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $customer = DB::table('customers')->where('user_id', $id)->first();
        return view('pages.customers.edit')->with([
            'customer' => $customer,
            'user' => $user
        ]);
    }

    public function update(CustomerRequest $request, $id)
    {

        User::where('id', $id)->update([
            'name' => $request->name,
        ]);

        $data = Customer::where('user_id', $id)->pluck('photo');

        if ($request->file('photo')) {
            if ($data) {
                Storage::delete($data[0]);
            }
            $photo = $request->file('photo')->store('photos');
        } else {
            $photo = $data[0];
        }

        Customer::where('user_id', $id)->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'birth' => $request->birth,
            'gender' => $request->gender,
            'photo' => $photo
        ]);

        return redirect()
            ->route('customers')
            ->with('info', 'The customer profile has been updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $photo = Customer::where('user_id', $id)->pluck('photo');

        DB::table('customers')->where('user_id', $id)->delete();
        $user->removeRole('user');
        $user->delete();
        if ($photo) {
            Storage::delete($photo[0]);
        }

        return redirect()
            ->route('customers')
            ->with('danger', 'The customer has been deleted successfully');
    }
}
