<?php

namespace App\Http\Controllers\Backend;

use App\Models\Ad;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::orderBy('order', 'DESC')->get();
        return view('backend.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ads.form');
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
        $ad = Ad::create([
            'name' => $request->name,
            'ads_location' => $request->ads_location,
            'slug' => Str::slug($request->name),
            'status' => $request->filled('status'),
        ]);
        // upload image
        if ($request->hasFile('image')) {
            // File::delete(public_path('uploads/ads/') . $ad->image);
            $image       = $request->file('image');
            $filename    = 'ads-' . time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(300, 300);
            $image_resize->save(public_path('uploads/ads/' . $filename));
            $ad->image = $filename;
            $ad->save();
        }

        notify()->success('ads Successfully Added.', 'Added');
        return redirect()->route('app.ads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view('backend.ads.form', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        // return $request;
        $ad->update([
            'name' => $request->name,
            'ads_location' => $request->ads_location,
            'status' => $request->filled('status'),
        ]);
        // upload image
        if ($request->hasFile('image')) {
            // File::delete(public_path('uploads/ads/') . $ad->image);
            $image       = $request->file('image');
            $filename    = 'ads-' . time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(300, 300);
            $image_resize->save(public_path('uploads/ads/' . $filename));
            $ad->image = $filename;
            $ad->update();
        }
        notify()->success('Ads Updated Successfully.', 'Updated');
        return redirect()->route('app.ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();
        notify()->success("Ads Successfully Deleted", "Deleted");
        return back();
    }
}
