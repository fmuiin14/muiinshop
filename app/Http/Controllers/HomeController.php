<?php

namespace App\Http\Controllers;

use App\Models\DetailAlamatUser;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index');
    }

    public function profile()
    {
        $user = Auth::user();
        $provinces = Province::all();
        $alamats = DetailAlamatUser::where('id_user', '=', $user->id)->get();

        return view('user.profile', compact('user', 'provinces', 'alamats'));
    }

    public function getKabupaten( request $request) {
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option>Pilih Kabupaten</option>";
        foreach ($kabupatens as $value) {
            $option.= "<option value='$value->id'>$value->name</option>";
        }
        echo $option;
    }

    public function getKecamatan( request $request) {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();
        $option = "<option>Pilih Kecamatan</option>";
        foreach ($kecamatans as $value) {
            $option.= "<option value='$value->id'>$value->name</option>";
        }
        echo $option;
    }

    public function getKelurahan( request $request) {
        $id_kecamatan = $request->id_kecamatan;

        $kelurahans = Village::where('district_id', $id_kecamatan)->get();
        $option = "<option>Pilih Kelurahan</option>";

        foreach ($kelurahans as $value) {
            $option.= "<option value='$value->id'>$value->name</option>";
        }
        echo $option;
    }
}
