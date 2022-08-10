<?php

namespace App\Http\Controllers\Backend;

use App\Models\Size;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::orderBy('order', 'DESC')->get();
        return view('backend.size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.size.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size = Size::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->filled('status'),
        ]);
        $size->save();

        notify()->success('Size Successfully Added.', 'Added');
        return redirect()->route('app.size.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('backend.size.form', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $size->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->filled('status'),
        ]);
        $size->save();

        notify()->success('Size Successfully Update.', 'Update');
        return redirect()->route('app.size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
        notify()->success('Size Successfully Deleted.', 'Deleted');
        return redirect()->route('app.size.index');
    }
}
