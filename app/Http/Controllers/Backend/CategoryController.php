<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::where('parent_id', null)->orderBy('order', 'DESC')->get();
        $categories = Category::orderBy('order', 'DESC')->get();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_category = Category::where('parent_id', 0)->orderBy('order', 'DESC')->get();
        return view('backend.category.form', compact('parent_category'));
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
        $category = Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_category,
            'slug' => Str::slug($request->name),
            'status' => $request->filled('status'),
        ]);

        // upload images
        if ($request->hasFile('image')) {
            // File::delete(public_path('uploads/users/') . $user->image);
            $image       = $request->file('image');
            $filename    = 'category-' . time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(300, 300);
            $image_resize->save(public_path('uploads/category/' . $filename));
            $category->icon_image = $filename;
            $category->save();
        }

        notify()->success('Category Successfully Added.', 'Added');
        return redirect()->route('app.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parent_category = Category::where('parent_id', 0)->orderBy('order', 'DESC')->get();
        return view('backend.category.form', compact('category', 'parent_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // return $request;
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_category,
            'status' => $request->filled('status'),
        ]);
        // upload images
        if ($request->hasFile('image')) {
            // File::delete(public_path('uploads/users/') . $user->image);
            $image       = $request->file('image');
            $filename    = 'category-' . time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(300, 300);
            $image_resize->save(public_path('uploads/category/' . $filename));
            $category->icon_image = $filename;
            $category->update();
        }
        notify()->success('Category Updated Successfully.', 'Updated');
        return redirect()->route('app.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        notify()->success("Category Successfully Deleted", "Deleted");
        return back();
    }
}
