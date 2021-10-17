<?php

use App\Models\Coupon;
use App\Models\Order;
use Carbon\Carbon;

function generateFileName($name)
{

    $year = Carbon::now()->year;
    $month = Carbon::now()->month;
    $day = Carbon::now()->day;
    $hour = Carbon::now()->hour;
    $minute = Carbon::now()->minute;
    $second = Carbon::now()->second;
    $microsecond = Carbon::now()->microsecond;

    return $year .'_'. $month .'_'. $day .'_'. $hour .'_'. $minute .'_'. $second .'_'. $microsecond .'_'. $name;
}

function convertShamsiToGregoriantDate($date){
            if($date == null){
                return null;
            }
            $shamsiDateSplit =explode('/' , $date);
            // $pattern = '/[-\s]/';
            // $shamsiDateSplit = preg_split($pattern , $date);
            $arrayGergorianDate = verta()->getGregorian($shamsiDateSplit[0] , $shamsiDateSplit[1] , $shamsiDateSplit[2] );
            // $miladiDate = implode('-' , $arrayGergorianDate ). " " . $shamsiDateSplit[3] ;
            $miladiDate = implode('-' , $arrayGergorianDate ) ;
            // dd($miladiDate);

            return $miladiDate;
}

function cartTotalSaleAmount()
{
    $cartTotalSaleAmount = 0;
    foreach (\Cart::getContent() as $item) {
        if ($item->attributes->is_sale) {
            $cartTotalSaleAmount += $item->quantity * ($item->attributes->price - $item->attributes->sale_price);
        }
    }

    return $cartTotalSaleAmount;

}
function cartTotalDeliverityAmount()
{
    $cartTotalDeliverityAmount = 0;
    foreach (\Cart::getContent() as $item) {
        $cartTotalDeliverityAmount += $item->associatedModel->delivery_amount + $item->associatedModel->delivery_amount_per_product;
    }
    return $cartTotalDeliverityAmount;

}


function checkCoupon($code)
{
    // dd($code);
    $coupon = Coupon::where('code' , $code)->where('expired_at' , '>' , Carbon::now())->first();

    if($coupon == null){
        return ['error' => 'کد تخفیف وارد شده وجود ندارد'];
    }

    if(Order::where('user_id' , auth()->id())->where('coupon_id' , $coupon->id)->where('payment_status' , 1)->exists()){
        return ['error' => 'شما قبلا از این کد تخفیف استفاده کرده اید'];
    }

    if($coupon->getRawOriginal('type') == 'amount'){
        session()->put('coupon' , ['code' => $coupon->code , 'amount' => $coupon->amount]);
    }else{
        $total = \Cart::getTotal();

        $amount = (($total * $coupon->percentage) / 100) > $coupon->max_percentage_amount ? $coupon->max_percentage_amount : ($total * $coupon->percentage) / 100;
        session()->put('coupon' , ['code' => $coupon->code , 'amount' => $amount]);
    }

    return ['success' => 'کد تخفیف برای شما ثبت شد'];

}

function cartTotalAmount()
{
    if(session()->has('coupon')){
        if(session()->get('coupon.amount') > (\Cart::getTotal() + cartTotalDeliverityAmount())){
            return 0;
        }else{
            return (\Cart::getTotal() + cartTotalDeliverityAmount())-session()->get('coupon.amount');
        }

    }else{
        return \Cart::getTotal() + cartTotalDeliverityAmount();
    }
}
