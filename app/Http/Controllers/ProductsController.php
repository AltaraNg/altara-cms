<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api')
            ->except(['index', 'show']);
    }

    public function index()
    {
        $products = Product::orderByRaw('RAND()')
            ->where('popularity', 3)
            ->take(12)
            ->with(['brand' => function ($query) {
                return $query->select('id', 'brand');
            }])
            ->get();
        //$brands = Brand::all();
        return response()
            ->json([
                'products' => $products,
                //'brands' => $brands
            ]);

    }

    public function show($id)
    {
        $products = Product::where('category_id', $id)
            ->with(['brand' => function ($query) {
                return $query->select('id', 'brand');
            }])
            ->get();
        //$brands = Brand::all();

        return response()
            ->json([
                'products' => $products,
                //'brands' => $brands
            ]);
    }

    public function create()
    {
        $form = Product::form();
        return response()
            ->json([
                'form' => $form
            ]);
    }

    public function edit($id, Request $request)
    {
        $form = $request->user()->products()
            ->findOrFail($id, [
                'id', 'name', 'brand_id', 'category_id', 'features', 'fourty_price', 'user_id', 'twenty_price', 'popularity', 'image'
            ]);
        return response()
            ->json([
                'form' => $form
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'category_id' => 'required|max:255',
            'popularity' => 'required|max:255',
            'features' => 'required|max:3000',
            'fourty_price' => 'required|max:255',
            'twenty_price' => 'required|max:255',
            'user_id' => 'required|max:255',
            'image' => 'required|image',
        ]);

        if (!$request->hasFile('image') && !$request->file('image')->isValid()) {
            return abort(404, 'Profile Image not uploaded!');
        }

        $filename = $this->getFileName($request->image);
        $request->image->move(base_path('public/images/catalog'), $filename);
        $product = new Product($request->only('name', 'brand_id', 'category_id', 'features', 'fourty_price', 'user_id', 'twenty_price', 'popularity'));
        $product->image = $filename;
        $request->user()->products()
            ->save($product);


        return response()
            ->json([
                'saved' => true,
                'id' => $product->id,
                'message' => 'Product Succefully Added'
            ]);
    }

    private function getFileName($file)
    {
        return str_random(32) . '.' . $file->extension();
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'category_id' => 'required|max:255',
            'popularity' => 'required|max:255',
            'features' => 'required|max:3000',
            'fourty_price' => 'required|max:255',
            'twenty_price' => 'required|max:255',
            'user_id' => 'required|max:255',
            'image' => 'image'
        ]);
        $product = $request->user()->products()
            ->findOrFail($id);
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->popularity = $request->popularity;
        $product->features = $request->features;
        $product->fourty_price = $request->fourty_price;
        $product->twenty_price = $request->twenty_price;
        $product->user_id = $request->user_id;
        // upload image
        if ($request->hasfile('image') && $request->file('image')->isValid()) {
            $filename = $this->getFileName($request->image);
            $request->image->move(base_path('/public/images/catalog'), $filename);
            // remove old image
            // File::delete(base_path('/public/images/catalog/'.$product->image));
            $product->image = $filename;
        }
        $product->save();

        return response()
            ->json([
                'saved' => true,
                'id' => $product->id,
                'message' => 'You have successfully updated product!'
            ]);
    }

    public function destroy($id, Request $request)
    {
        $product = $request->user()->products()
            ->findOrFail($id);
        File::delete(base_path('/public/images/catalog/' . $product->image));
        $product->delete();
        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
