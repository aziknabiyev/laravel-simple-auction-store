<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\GetProducts;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    use GetProducts;

    public function index()
    {
        $products=$this->getProductData();
        $categories=Category::all();
        $controller=$this;
        return view('admin.products.index',compact(['products','categories','controller']));
    }

    public function create()
    {
        $categories=Category::all();
        return view('admin.products.create',compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data=(object) $request->validated();
        $product=Product::create(['title'=>$data->title,'description'=>$data->description]);
        $product->categories()->attach($data->categories);
        return redirect()->route('admin.products.index')->with('status', 'Product created!');
    }

    public function show(Product $product)
    {
        return view('admin.products.view',['product'=>$product,'controller'=>$this]);
    }

    public function edit(Product $product)
    {
        $controller=$this;
        $categories=Category::all();
        return view('admin.products.update',compact(['product','categories','controller']));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data=(object) $request->validated();
        $product->update(['title'=>$data->title,'description'=>$data->description]);
        $product->categories()->sync($data->categories);
        return redirect()->route('admin.products.index')->with('status', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        $product->categories()->detach();
        $product->delete();
        return redirect()->route('admin.products.index')->with('status', 'Product deleted!');
    }
}
