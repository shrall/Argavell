<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bundle;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('bundle', '0')->get();
        return view('admin.product.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = time() . '-' . $request['image']->getClientOriginalName();
        $request->image->move(public_path('uploads/products'), $image);
        if ($request->bundle == '0') {
            Product::create([
                'name' => $request->name,
                'description' => $request->detail,
                'bundle' => $request->bundle,
                'type' => $request->type,
                'weight' => $request->weight,
                'stock' => $request->stock,
                'price' => $request->price,
                'img' => $image,
                'size' => [10],
                'facts' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'howtouse' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'ingredients' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ]);
        }else {
            $bundle_items = explode(",", $request->bundle_items);
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->detail,
                'bundle' => $request->bundle,
                'bundle_start' => $request->date_start,
                'bundle_end' => $request->date_end,
                'type' => $request->type,
                'weight' => $request->weight,
                'stock' => $request->stock,
                'price' => $request->price,
                'img' => $image,
                'size' => [10],
                'facts' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'howtouse' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'ingredients' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ]);
            foreach($bundle_items as $item){
                Bundle::create([
                    'bundle_id' => $product->id,
                    'product_id' => $item,
                ]);
            }
        }
        return redirect()->route('admin.product.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    function add_bundle_item(Request $request)
    {
        if (!$request->has('items')) {
            $products = Product::where('id', 'asd')->get();
        } else {
            $products = Product::whereIn('id', array_unique($request->items, SORT_REGULAR))->get();
        }
        return view('admin.product.inc.table.bundle', compact('products'));
    }
}
