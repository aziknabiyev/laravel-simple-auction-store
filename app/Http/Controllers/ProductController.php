<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Traits\GetProducts;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    use GetProducts;

    public function index()
    {
        $products=$this->getProductData();
        $categories=Category::all();
        $controller=$this;
        return view('pages.products',compact(['products','categories','controller']));
    }

}
