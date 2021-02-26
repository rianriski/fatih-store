<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $customer = DB::table('customers')
            ->where('user_id', Auth::id())
            ->first();

        return view('pages.user.profile.index')->with([
            'customer' => $customer,
            'user' => $user
        ]);
    }

    public function change()
    {
        return view('pages.user.profile.password');
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::id());
        $customer = DB::table('customers')
            ->where('user_id', Auth::id())
            ->first();

        return view('pages.user.profile.edit')->with([
            'customer' => $customer,
            'user' => $user
        ]);
    }

    public function update(CustomerRequest $request)
    {
        User::where('id', Auth::id())->update([
            'name' => $request->name,
        ]);

        $data = Customer::where('user_id', Auth::id())->pluck('photo');

        if ($request->file('photo')) {
            if ($data) {
                Storage::delete($data[0]);
            }
            $photo = $request->file('photo')->store('photos');
        } else {
            $photo = $data[0];
        }

        Customer::where('user_id', Auth::id())->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'birth' => $request->birth,
            'gender' => $request->gender,
            'photo' => $photo
        ]);

        return redirect()
            ->route('user.profile')
            ->with('info', 'The profile has been updated successfully');
    }

    public function updatePassword(PasswordRequest $request)
    {
        if ($request->new_password === $request->password) {
            User::where('id', Auth::id())->update([
                'password' => bcrypt($request->password)
            ]);

            return redirect()
                ->route('user.profile')
                ->with('info', 'The password has been updated successfully');
        } else {
            return redirect()
                ->route('user.change.password')
                ->with('danger', 'Password does not match');
        }
    }
}
