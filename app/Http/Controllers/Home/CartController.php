<?php

namespace App\Http\Controllers\Home;

use Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'qtybutton' => 'required'
        ]);

        $product = Product::findOrFail($request->product_id);
        $productVariation = ProductVariation::findOrFail(json_decode($request->variation)->id);

        if ($request->qtybutton > $productVariation->quantity) {
            alert()->error('تعداد وارد شده از محصول درست نمی باشد!', 'دقت کنید');
            return redirect()->back();
        }

        $rowId = $product->id . '-' . $productVariation->id;

        if(Cart::get($rowId) == null){

            Cart::add(array(
                'id' => $rowId,
                'name' => $product->name,
                'price' => $productVariation->is_sale ? $productVariation->sale_price : $productVariation->price,
                'quantity' => $request->qtybutton,
                'attributes' => $productVariation->toArray(),
                'associatedModel' => $product
            ));
        }else{
            alert()->warning('محصول مورد نظر به سبد خرید شما اضافه شده است!', 'دقت کنید');
            return redirect()->back();
        }
        alert()->success('محصول مورد نظر به سبد خرید شما اضافه شد', 'با تشکر');
        return redirect()->back();
    }

    public function index()
    {
        return view('home.cart.index');
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'qtybutton' => 'required'
        ]);
        // dd("ee");

        foreach ($request->qtybutton as $rowId => $quantity) {
            $item = Cart::get($rowId);
            if ($quantity > $item->attributes->quantity) {
                alert()->error('تعداد وارد شده از محصول درست نمی باشد!', 'دقت کنید');
                return redirect()->back();
            }else{
                Cart::update($rowId , array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $quantity
                    ),
                ));
                // dd("GG");
            }
        }
        alert()->success('سبد خرید شما ویرایش شد', 'با تشکر');
        return redirect()->back();
    }
    public function remove($rowId)
    {
        Cart::remove($rowId);
        alert()->success('محصول مورد نظر از سبد خرید شما حذف شد', 'با تشکر');
        return redirect()->back();
    }
    public function clear()
    {
        Cart::clear();
        alert()->warning('سبد خرید شما پاک شد', 'با تشکر');
        return redirect()->back();
    }
    public function checkCoupon(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        if(!auth()->check()){
            alert()->error('برای استفاده از کد تخفیف در ابتدا باید وارد سایت شوید', 'دقت کنید');
            return redirect()->back();
        }

        $result = checkCoupon($request->code);

        // dd($result);

        if(array_key_exists('error' , $result)){
            alert()->error( $result['error'] , 'دقت کنید');
        }else{
            alert()->success($result['success'] , 'با تشکر ');
        }
        return redirect()->back();
    }
}
