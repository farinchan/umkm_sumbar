<?php

namespace App\Http\Controllers\Web\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class CityController extends Controller
{
    //

    public function index(Request $request)
    {
        $search = $request->input('q');
        $city = City::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })
            ->paginate(10);
        $city->appends(['q' => $search]);
        $data = [
            'title' => 'Kota',
            'subTitle' => null,
            'page_id' => 10,
            'city' => $city
        ];
        return view('back.city.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'postal_code' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.kota.index')->with('error', 'Gagal Menambahkan Kota Baru')->withInput()->withErrors($validator);
        }

        $city = new City();
        $city->name = $request->input('name');
        $city->slug = Str::slug($request->input('name'), '-');
        $city->postal_code = $request->input('postal_code');
        $city->save();
        return redirect()->route('admin.kota.index')->with('success', 'Berhasil menambahkan kota baru');
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'postal_code' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.kota.index')->with('error', 'Gagal Mengubah Kota')->withInput()->withErrors($validator);
        }

        $city = City::findOrFail($id);
        $city->name = $request->input('name');
        $city->slug = Str::slug($request->input('name'), '-');
        $city->postal_code = $request->input('postal_code');
        $city->save();
        return redirect()->route('admin.kota.index')->with('success', 'Berhasil mengubah kota');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->route('admin.kota.index')->with('success', 'Berhasil menghapus kota');
    }

    
}
