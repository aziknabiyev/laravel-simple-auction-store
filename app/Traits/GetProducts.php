<?php namespace App\Traits;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

trait GetProducts {

    public function toStringCategories(Collection $items)
    {
        $arr=[];
        foreach ($items as $item) $arr[]=$item->name;
        return implode(',',$arr);
    }

    public function checkProductCategory(int $id,Collection $items):string
    {
        $arr=[];
        foreach ($items as $item) $arr[]=$item->id;
        return in_array($id,$arr) ? 'checked' : '';
    }

    public function getProductData()
    {
        $request = Request::createFromGlobals();
        $cat=$request->query->get('cat',null);
        $products=[];
        if($cat){
            $products=Product::whereHas('categories',function($query) use($cat) {
                $query->where('id', $cat);
            })->get();
        } else {
            $products=Product::with('categories')->get()->all();
        }

        return $products;
    }

}
