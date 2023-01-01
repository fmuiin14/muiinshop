<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        return view('admin.brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $image_path = '';
        if ($request->hasFile('photo')) {
            $image_path = $request->file('photo')->store('brands', 'public');
        }


        Brand::create([
            'title' => $request->title,
            'label1' => $request->label1,
            'label2' => $request->label2,
            'label3' => $request->label3,
            'photo' => $image_path,
            'slug' => Str::slug($request->title),
        ]);

        return redirect()->route('brand.create')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $brand = Brand::findOrFail($id);

        $brand->update([
            'title' => $request->title,
            'label1' => $request->label1,
            'label2' => $request->label2,
            'label3' => $request->label3,
            'slug' => Str::slug($request->title),
            'status' => $request->status,
        ]);

        if ($request->hasFile('photo')) {
            $image_path = $request->file('photo')->store('brands', 'public');

            //delete old image
            Storage::delete('public/'.$brand->photo);

            $brand->update([
                'photo'     => $image_path
            ]);
        }


        return redirect()->route('brand.index')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Brand::findOrFail($id);
        Storage::delete('public/'.$item->photo);
        $item->delete();

        return redirect()->route('brand.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
