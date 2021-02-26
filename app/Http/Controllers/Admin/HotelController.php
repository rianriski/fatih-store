<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::orderBy('created_at', 'desc')->paginate(3);

        return view('pages.hotels.index')->with([
            'hotels' => $hotels
        ]);
    }

    public function create()
    {
        return view('pages.hotels.create');
    }

    public function store(HotelRequest $request)
    {
        $data = $request->all();
        Hotel::create($data);

        return redirect()
            ->route('hotels')
            ->with('success', 'Data hotel berhasil ditambahkan');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $hotels = Hotel::where('nama', 'like', '%' . $search . '%')->paginate(3);

        return view('pages.hotels.index')->with([
            'hotels' => $hotels
        ]);
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);

        return view('pages.hotels.edit')->with([
            'hotel' => $hotel
        ]);
    }

    public function update(HotelRequest $request, $id)
    {
        $data = $request->all();
        $model = Hotel::findOrFail($id);
        $model->update($data);

        return redirect()
            ->route('hotels')
            ->with('info', 'Data hotel berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = Hotel::findOrFail($id);
        $data->delete();

        return redirect()
            ->route('hotels')
            ->with('danger', 'Data hotel berhasil dihapus');
    }
}
