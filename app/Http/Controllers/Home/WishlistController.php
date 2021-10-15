<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function add(Product $product)
    {
        if (auth()->check()) {

            if( $product->checkUserWishList(auth()->id())){
                 alert()->warning('دقت کنید', 'محصول مورد نظر قبلا به لیست علاقه مندی ها اضافه شده است')->persistent('حله');
            return redirect()->back();
            }else{
                $wishlist = new Wishlist();
                $wishlist->user_id = auth()->id();
                $wishlist->product_id = $product->id;

                $wishlist->save();
                alert()->success('محصول مورد نظر با موفقیت به لیست علاقه مندی های شما اضافه شد', 'با تشکر');
                return redirect()->back();
            }

        } else {
            alert()->warning('دقت کنید', 'برای افزودن به لیست علاقه مندی ها نیاز هست در ابتدا وارد سایت شوید')->persistent('حله');
            return redirect()->back();
        }
    }

    public function remove(Product $product)
    {
        if (auth()->check()) {
            $wishlist = Wishlist::where('product_id' , $product->id)->where('user_id' , auth()->id())->firstOrFail();
            if($wishlist){
                Wishlist::where('product_id' , $product->id)->where('user_id' , auth()->id())->delete();
            }

            alert()->success('محصول مورد نظر با موفقیت از لیست علاقه مندی های شما حذف شد', 'با تشکر');
            return redirect()->back();
        } else {
            alert()->warning('دقت کنید', 'برای حذف از لیست علاقه مندی ها نیاز هست در ابتدا وارد سایت شوید')->persistent('حله');
            return redirect()->back();
        }
    }

    public function usersProfileIndex()
    {
        $wishlist = Wishlist::where('user_id' , auth()->id())->get();
        return view('home.users_profile.wishlist' , compact('wishlist'));
    }
}
