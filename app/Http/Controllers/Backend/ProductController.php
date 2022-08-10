<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use App\Models\Size;
use App\Models\User;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Product::latest()->get();
        $products =  Product::latest()->get();

        foreach ($products as $key => $data) {
            $data->gallery = json_decode($data->gallery);
        }

        // return $products;
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        $colors = Color::latest()->get();
        $sizes = Size::latest()->get();
        $brands = Brand::latest()->get();
        // $users = User::where('role_id', 1 || 'role_id', 2 && 'status', 1)->andWhere('status', true)->get();
        $users = User::where(function ($query) {
            $query->where('role_id', 1)
                ->orWhere('role_id', 2);
        })->where(function ($query) {
            $query->where('status', true);
        })->get();

        return view('backend.product.form', compact('categories', 'tags', 'colors', 'sizes', 'brands', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'title' =>  'required|string',
            'description'  =>  'required|string',
            'price'  =>  'required|string',
            'featured_image' =>  'nullable|image'
        ]);
        $product = Product::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'sku' => $request->sku,
            'user_id' => $request->user_id,
            'brand_id' => $request->brand_id,

            'product_collections' => $request->product_collections,
            'labels' => $request->labels,
            'weight' => $request->weight,
            'height' => $request->height,
            'length' => $request->length,
            'wide' => $request->wide,
            'price' => $request->price,
            'sale_price' => $request->sale_price,

            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'featured' => $request->filled('featured'),
            'trending' => $request->filled('trending'),
            'popular' => $request->filled('popular'),
            'status' => $request->filled('status'),
        ]);

        // upload featured_image
        if ($request->hasFile('featured_image')) {
            // File::delete(public_path('uploads/products/') . $user->featured_image);
            $image       = $request->file('featured_image');
            $filename    = 'product-' . time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(300, 300);
            $image_resize->save(public_path('uploads/products/' . $filename));
            $product->featured_image = $filename;
            $product->save();
        }
        if ($request->hasfile('gallery')) {
            foreach ($request->file('gallery') as $key => $file) {
                $name = 'gallery-' . time() . '.' . $file->extension();
                $image_resize = Image::make($file);
                $image_resize->fit(300, 300);
                $image_resize->save(public_path('uploads/products/gallery/' . $name));
                $data[] = $name;
            }
            $product->gallery = json_encode($data);
            $product->save();
        }
        $product->categories()->attach($request->categories);
        $product->tags()->attach($request->tags);
        $product->colors()->attach($request->colors);
        $product->sizes()->attach($request->sizes);

        notify()->success('Product Successfully Added.', 'Added');
        return redirect()->route('app.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        $colors = Color::latest()->get();
        $sizes = Size::latest()->get();
        $brands = Brand::latest()->get();
        // $users = User::where('role_id', 1 || 'role_id', 2 && 'status', 1)->andWhere('status', true)->get();
        $users = User::where(function ($query) {
            $query->where('role_id', 1)
                ->orWhere('role_id', 2);
        })->where(function ($query) {
            $query->where('status', true);
        })->get();

        return view('backend.product.form', compact('product', 'categories', 'tags', 'colors', 'sizes', 'brands', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        // return $request->all();
        $this->validate($request, [
            'title' =>  'required|string',
            'description'  =>  'required|string',
            'price'  =>  'required|string',
            'featured_image' =>  'nullable|image'
        ]);
        $product->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'sku' => $request->sku,
            'user_id' => $request->user_id,
            'brand_id' => $request->brand_id,

            'product_collections' => $request->product_collections,
            'labels' => $request->labels,
            'weight' => $request->weight,
            'height' => $request->height,
            'length' => $request->length,
            'wide' => $request->wide,
            'price' => $request->price,
            'sale_price' => $request->sale_price,

            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'featured' => $request->filled('featured'),
            'trending' => $request->filled('trending'),
            'popular' => $request->filled('popular'),
            'status' => $request->filled('status'),
        ]);

        // upload featured_image
        if ($request->hasFile('featured_image')) {
            File::delete(public_path('uploads/products/') . $product->featured_image);
            $image       = $request->file('featured_image');
            $filename    = 'product-' . time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(300, 300);
            $image_resize->save(public_path('uploads/products/' . $filename));
            $product->featured_image = $filename;
            $product->update();
        }
        if ($request->hasfile('gallery')) {
            foreach ($request->file('gallery') as $key => $file) {
                $name = 'gallery-' . time() . '.' . $file->extension();
                $image_resize = Image::make($file);
                $image_resize->fit(300, 300);
                $image_resize->save(public_path('uploads/products/gallery/' . $name));
                $data[] = $name;
            }
            $product->gallery = json_encode($data);
            $product->update();
        }
        $product->categories()->sync($request->categories);
        $product->tags()->sync($request->tags);
        $product->colors()->sync($request->colors);
        $product->sizes()->sync($request->sizes);

        notify()->success('Product Successfully Updated.', 'Updated');
        return redirect()->route('app.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $image_path = public_path("\uploads\products\\") . $product->featured_image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        } else {
            $product->delete();
            //abort(404);
        }
        $product->delete();
        notify()->success("Portfolio Successfully Deleted", "Deleted");
        return back();
    }
}
