<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            $image_path = $request->file('photo')->store('sliders', 'public');
        }

        Slider::create([
            'title' => $request->title,
            'label1' => $request->label1,
            'label2' => $request->label2,
            'label3' => $request->label3,
            'photo' => $image_path,
            'slug' => Str::slug($request->title),
        ]);

        return redirect()->route('slider.create')->with('success', 'Data Berhasil Disimpan!');
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
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
        // dd($request);
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $slider = Slider::findOrFail($id);

        $slider->update([
            'title' => $request->title,
            'label1' => $request->label1,
            'label2' => $request->label2,
            'label3' => $request->label3,
            'slug' => Str::slug($request->title),
            'status' => $request->status,
        ]);

        if ($request->hasFile('photo')) {
            $image_path = $request->file('photo')->store('sliders', 'public');

            //delete old image
            Storage::delete('public/'.$slider->photo);

            $slider->update([
                'photo'     => $image_path
            ]);
        }


        return redirect()->route('slider.index')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Slider::findOrFail($id);
        Storage::delete('public/'.$item->photo);
        $item->delete();

        return redirect()->route('slider.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
