<?php

namespace App\Http\Controllers\Backend;

use App\Models\Color;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::orderBy('order', 'DESC')->get();
        return view('backend.color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.color.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $color = Color::create([
            'name' => $request->name,
            'color_code' => $request->color_code,
            'slug' => Str::slug($request->name),
            'status' => $request->filled('status'),
        ]);

        notify()->success('Color Successfully Added.', 'Added');
        return redirect()->route('app.color.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('backend.color.form', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        // return $request;
        $color->update([
            'name' => $request->name,
            'color_code' => $request->color_code,
            'slug' => Str::slug($request->name),
            'status' => $request->filled('status'),
        ]);
        $color->save();

        notify()->success('Color Successfully Update.', 'Update');
        return redirect()->route('app.color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $color->delete();
        notify()->success('Color Successfully Deleted.', 'Deleted');
        return redirect()->route('app.color.index');
    }
}
