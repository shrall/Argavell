<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bundle;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Promotion;
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
            $the_sizes = array_chunk(explode(",", $request->item_sizes), 4);
            $stocks = [];
            $sizes = [];
            $prices = [];
            $price_discounts = [];
            foreach ($the_sizes as $key => $ts) {
                array_push($stocks, $ts[0]);
                array_push($sizes, $ts[1]);
                array_push($prices, $ts[2]);
                array_push($price_discounts, 0);
            }
            Product::create([
                'name' => $request->name,
                'sku' => $request->sku,
                'description' => $request->detail,
                'bundle' => $request->bundle,
                'type' => $request->type,
                'weight' => $request->weight,
                'stock' => $stocks,
                'price' => $prices,
                'price_discount' => $price_discounts,
                'img' => $image,
                'size' => $sizes,
                'facts' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'howtouse' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'ingredients' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ]);
        } else {
            $bundle_items = explode(",", $request->bundle_items);
            $bundle_item_sizes = explode(",", $request->bundle_item_sizes);
            $bundle_item_keys = explode(",", $request->bundle_item_keys);
            $product = Product::create([
                'name' => $request->name,
                'sku' => $request->sku,
                'description' => $request->detail,
                'bundle' => $request->bundle,
                'bundle_start' => $request->date_start,
                'bundle_end' => $request->date_end,
                'type' => $request->type,
                'weight' => $request->weight,
                'stock' => [$request->stock],
                'price' => [$request->price],
                'price_discount' => [$request->price_discount ? $request->price_discount : 0],
                'img' => $image,
                'size' => [0],
                'facts' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'howtouse' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'ingredients' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ]);
            foreach ($bundle_items as $key => $item) {
                Bundle::create([
                    'bundle_id' => $product->id,
                    'product_id' => $item,
                    'size' => $bundle_item_sizes[$key],
                    'key' => $bundle_item_keys[$key]
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
        $products = Product::where('bundle', '0')->get();
        return view('admin.product.edit', compact('products', 'product'));
    }
    public function edit_promotion(Product $product)
    {
        $products = Product::where('bundle', '0')->get();
        return view('admin.voucher.edit', compact('products', 'product'));
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
        if ($request->bundle == '0') {
            $the_sizes = array_chunk(explode(",", $request->item_sizes), 4);
            $stocks = [];
            $sizes = [];
            $prices = [];
            $price_discounts = [];
            foreach ($the_sizes as $key => $ts) {
                array_push($stocks, $ts[0]);
                array_push($sizes, $ts[1]);
                array_push($prices, $ts[2]);
                array_push($price_discounts, 0);
            }
            $product->update([
                'name' => $request->name,
                'sku' => $request->sku,
                'description' => $request->detail,
                'bundle' => $request->bundle,
                'bundle_start' => null,
                'bundle_end' => null,
                'type' => $request->type,
                'weight' => $request->weight,
                'stock' => $stocks,
                'price' => $prices,
                'price_discount' => $price_discounts,
                'size' => $sizes,
                'facts' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'howtouse' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'ingredients' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ]);
        } else {
            $bundle_items = explode(",", $request->bundle_items);
            $bundle_item_sizes = explode(",", $request->bundle_item_sizes);
            $bundle_item_keys = explode(",", $request->bundle_item_keys);
            $product->update([
                'name' => $request->name,
                'sku' => $request->sku,
                'description' => $request->detail,
                'bundle' => $request->bundle,
                'bundle_start' => $request->date_start,
                'bundle_end' => $request->date_end,
                'type' => $request->type,
                'weight' => $request->weight,
                'stock' => [$request->stock],
                'price' => [$request->price],
                'price_discount' => [$request->price_discount ?? 0],
                'size' => [0],
                'facts' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'howtouse' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'ingredients' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ]);
            Bundle::where('bundle_id', $product->id)->delete();
            foreach ($bundle_items as $key => $item) {
                Bundle::create([
                    'bundle_id' => $product->id,
                    'product_id' => $item,
                    'size' => $bundle_item_sizes[$key],
                    'key' => $bundle_item_keys[$key]
                ]);
            }
        };
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $bundles = Bundle::where('product_id', $product->id)->get();
        foreach ($bundles as $key => $bundle) {
            $bundle->delete();
        }
        $carts = Cart::where('product_id', $product->id)->where('transaction_id', null)->get();
        foreach ($carts as $key => $cart) {
            $cart->delete();
        }
        $promotions = Promotion::where('product_id', $product->id)->get();
        foreach ($promotions as $key => $promotion) {
            $promotion->delete();
        }
        $product->delete();
        return redirect()->route('admin.product.index');
    }

    function add_bundle_item(Request $request)
    {
        $items = $request->items;
        $keys = $request->keys;
        $products = Product::all();
        return view('admin.product.inc.table.bundle', compact('items', 'keys', 'products'));
    }

    function add_sizes(Request $request)
    {
        $sizes = $request->sizes;
        return view('admin.product.inc.size', compact('sizes'));
    }
}
