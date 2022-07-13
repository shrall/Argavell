<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Bundle;
use App\Models\Cart;
use App\Models\Guide;
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
        $images = explode(",", $request->item_guide_images);
        $titles = explode(",", $request->item_guide_titles);
        $descriptions = json_decode($request->item_guide_descriptions, true);

        $bimages = explode(",", $request->item_benefit_images);
        $bbanners = explode(",", $request->item_benefit_banners);
        $btitles = explode(",", $request->item_benefit_titles);
        $bdescriptions = json_decode($request->item_benefit_descriptions, true);

        if ($request->image) {
            $image = time() . '-' . $request['image']->getClientOriginalName();
            $request->image->move(public_path('uploads/products'), $image);
        } else {
            $image = null;
        }
        if ($request->banner) {
            $banner = time() . '-' . $request['banner']->getClientOriginalName();
            $request->banner->move(public_path('uploads/products'), $banner);
        } else {
            $image = null;
        }
        if ($request->video) {
            $video = time() . '-' . $request['video']->getClientOriginalName();
            $request->video->move(public_path('uploads/products'), $video);
        } else {
            $video = null;
        }
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
            $product = Product::create([
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
                'banner' => $banner,
                'link_video' => $video,
                'size' => $sizes,
                'facts' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'howtouse' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'ingredients' => $request->ingredients
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
                'banner' => $banner,
                'link_video' => $video,
                'size' => [0],
                'facts' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'howtouse' => ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"],
                'ingredients' => $request->ingredients
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

        foreach ($titles as $key => $title) {
            if ($title) {
                Guide::create([
                    'logo' => $images[$key],
                    'title' => $titles[$key],
                    'description' => $descriptions[$key],
                    'product_id' => $product->id
                ]);
            }
        }
        foreach ($btitles as $key => $title) {
            if ($title) {
                Benefit::create([
                    'icon' => $bimages[$key],
                    'banner' => $bbanners[$key],
                    'title' => $btitles[$key],
                    'content' => $bdescriptions[$key],
                    'product_id' => $product->id
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
        if ($request->image) {
            $image = time() . '-' . $request['image']->getClientOriginalName();
            $request->image->move(public_path('uploads/products'), $image);
        } else {
            if ($request->image_delete == '1') {
                $image = null;
            } else {
                $image = $product->img;
            }
        }
        if ($request->banner) {
            $banner = time() . '-' . $request['banner']->getClientOriginalName();
            $request->banner->move(public_path('uploads/products'), $banner);
        } else {
            if ($request->banner_delete == '1') {
                $banner = null;
            } else {
                $banner = $product->banner;
            }
        }
        if ($request->video) {
            $video = time() . '-' . $request['video']->getClientOriginalName();
            $request->video->move(public_path('uploads/products'), $video);
        } else {
            if ($request->video_delete == '1') {
                $video = null;
            } else {
                $video = $product->video;
            }
        }
        $images = explode(",", $request->item_guide_images);
        $titles = explode(",", $request->item_guide_titles);
        $descriptions = json_decode($request->item_guide_descriptions, true);
        $bimages = explode(",", $request->item_benefit_images);
        $bbanners = explode(",", $request->item_benefit_banners);
        $btitles = explode(",", $request->item_benefit_titles);
        $bdescriptions = json_decode($request->item_benefit_descriptions, true);

        foreach ($product->guides as $guide) {
            $guide->delete();
        }

        foreach ($product->benefits as $benefit) {
            $benefit->delete();
        }

        if (count($titles) > 0) {
            foreach ($titles as $key => $title) {
                if ($title) {
                    Guide::create([
                        'logo' => $images[$key],
                        'title' => $titles[$key],
                        'description' => $descriptions[$key],
                        'product_id' => $product->id
                    ]);
                }
            }
        }
        if (count($btitles) > 0) {
            foreach ($btitles as $key => $title) {
                if ($title) {
                    Benefit::create([
                        'icon' => $bimages[$key],
                        'banner' => $bbanners[$key],
                        'title' => $btitles[$key],
                        'content' => $bdescriptions[$key],
                        'product_id' => $product->id
                    ]);
                }
            }
        }
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
                'ingredients' => $request->ingredients,
                'img' => $image,
                'banner' => $banner,
                'link_video' => $video,
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
                'ingredients' => $request->ingredients
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

    function add_guides(Request $request)
    {
        if ($request->guide) {
            $image = $request['guide']->getClientOriginalName();
            $request->guide->move(public_path('uploads/guides'), $image);
        }
        $images = explode(",", $request->guide_image);
        $titles = explode(",", $request->guide_title);
        $descriptions = json_decode($request->guide_description, true);
        return view('admin.product.inc.guide', compact('images', 'titles', 'descriptions'));
    }

    function add_benefits(Request $request)
    {
        if ($request->benefit) {
            $image = $request['benefit']->getClientOriginalName();
            $request->benefit->move(public_path('uploads/benefits'), $image);
        }
        if ($request->benefitbanner) {
            $image = $request['benefitbanner']->getClientOriginalName();
            $request->benefitbanner->move(public_path('uploads/benefits'), $image);
        }
        $images = explode(",", $request->benefit_image);
        $banners = explode(",", $request->benefit_banner);
        $titles = explode(",", $request->benefit_title);
        $descriptions = json_decode($request->benefit_description, true);
        return view('admin.product.inc.benefit', compact('banners', 'images', 'titles', 'descriptions'));
    }
}
