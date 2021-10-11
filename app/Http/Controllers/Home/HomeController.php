<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $sliders = Banner::where('type' , 'slider')->where('is_active' , 1)->orderBy('priority')->get();
        $indexTopBanners = Banner::where('type' , 'index-top')->where('is_active' , 1)->orderBy('priority')->get();
        $indexBottomBanners = Banner::where('type' , 'index-bottom')->where('is_active' , 1)->orderBy('priority')->get();

        // $products = Product::where('is_active' , 1)->get()->take(5);
        $products = Product::where('is_active' , 1)->get();

        /*$product = Product::find(2);
        dd($product->quantity_check);*/
        /*$product = Product::find(1);
        dd($product->sale_check);*/

        return view('home.index' , compact('sliders' , 'indexTopBanners' , 'indexBottomBanners' , 'products'));
    }
}
// $parentMenId = Category::where('name', 'مردانه')->first()->id;
//         $productCategoriesMenId = Category::where('parent_id', $parentMenId)->get();
//         dd($productCategoriesMenId);
//         $productsMen = (Product::find())->category()->wherePivot('parent_id', $parentMenId)->get();
//         $parentWomenId = Category::wherePivot('name', 'زنانه')->first()->id;
//         $productsWomen = (Product::all())->category()->wherePivot('parent_id', $parentWomenId)->get();
//         $parentChildrenId = Category::wherePivot('name', 'بچه گانه')->first()->id;
//         $productsChildren = (Product::all())->category()->wherePivot('parent_id', $parentChildrenId)->get();
