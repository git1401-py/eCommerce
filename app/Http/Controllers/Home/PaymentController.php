<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\ProductVariation;
use App\PaymentGateway\Pay;
use App\PaymentGateway\Zarinpal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'payment_method' => 'required',
            'address_id' => 'required',

        ]);
        if ($validate->fails()) {
            alert()->error('انتخاب آدرس تحویل الزامی است', 'دقت کنید')->persistent('حله');
            return redirect()->back();
        }

        $checkCart = $this->checkCart();
        if (array_key_exists('error', $checkCart)) {
            alert()->error($checkCart['error'], 'دقت کنید')->persistent('حله');
            return redirect()->route('home.index');
        }
        $amounts = $this->getAmouunts();
        if (array_key_exists('error', $amounts)) {
            alert()->error($amounts['error'], 'دقت کنید')->persistent('حله');
            return redirect()->route('home.index');
        }

        if( $request->payment_method == 'pay')
        {
            $payGateway = new Pay();
            $payGatewayResult = $payGateway->send($amounts, $request->address_id);
            if (array_key_exists('error', $payGatewayResult)) {
                alert()->error($payGatewayResult['error'], 'دقت کنید')->persistent('حله');
                return redirect()->back();
            }else{
                return redirect()->to($payGatewayResult['success']);
            }
        }

        if( $request->payment_method == 'zarinpal')
        {
            $zarinpalGateway = new Zarinpal();
            $zarinpalGatewayResult = $zarinpalGateway->send($amounts , 'خرید تستی' , $request->address_id);
            if (array_key_exists('error', $zarinpalGatewayResult)) {
                alert()->error($zarinpalGatewayResult['error'], 'دقت کنید')->persistent('حله');
                return redirect()->back();
            }else{
                return redirect()->to($zarinpalGatewayResult['success']);
            }
        }

        alert()->error('درگاه پرداخت انتخابی اشتباه می باشد', 'دقت کنید')->persistent('حله');
        return redirect()->back();
    }
    public function paymentVerify(Request $request , $gatewayName)
    {

        if($gatewayName == 'pay')
        {
            $payGateway = new Pay();
            $payGatewayResult = $payGateway->verify($request->token , $request->status);
            if (array_key_exists('error', $payGatewayResult)) {
                alert()->error($payGatewayResult['error'], 'دقت کنید')->persistent('حله');
                return redirect()->back();
            }else{
                alert()->success($payGatewayResult['success'], 'با تشکر')->persistent('حله');
                return redirect()->route('home.index');
            }
        }

        if($gatewayName == 'zarinpal')
        {
            $zarinpalGateway = new Zarinpal();
            $amounts = $this->getAmouunts();
            if (array_key_exists('error', $amounts)) {
                alert()->error($amounts['error'], 'دقت کنید')->persistent('حله');
                return redirect()->route('home.index');
            }
            $zarinpalGatewayResult = $zarinpalGateway->verify($request->Authority , $amounts['paying_amount']);
            if (array_key_exists('error', $zarinpalGatewayResult)) {
                alert()->error($zarinpalGatewayResult['error'], 'دقت کنید')->persistent('حله');
                return redirect()->back();
            }else{
                alert()->success($zarinpalGatewayResult['success'], 'با تشکر')->persistent('حله');
                return redirect()->route('home.index');
            }
        }

        alert()->error('مسیر بازگشت از درگاه پرداخت انتخاب اشتباه می باشد', 'دقت کنید')->persistent('حله');
        return redirect()->route('home.orders.checkout');
    }


    public function checkCart()
    {
        if (\Cart::isEmpty()) {
            return ['error' => 'سبد خرید شما خالی می باشد.'];
        }

        foreach (\Cart::getContent() as $item) {
            $variation = ProductVariation::find($item->attributes->id);

            $price = $variation->is_sale ? $variation->sale_price : $variation->price;

            if ($item->price != $price) {
                \Cart::clear();
                return ['error' => 'قیمت محصول ' . $item->name . ' تغییر پیدا کرد'];
            }

            if ($item->quantity > $variation->quantity) {
                \Cart::clear();
                return ['error' => 'تعداد محصول ' . $item->name . ' تغییر پیدا کرد'];
            }

            return ['success' => 'SuCcEsS'];
        }
    }
    public function getAmouunts()
    {
        if (session()->has('coupon')) {
            $checkCoupon = checkCoupon(session()->get('coupon.code'));
            if (array_key_exists('error', $checkCoupon)) {
                return $checkCoupon;
            }
        }

        return [
            'total_amount' => (\Cart::getTotal() + cartTotalSaleAmount()),
            'delivery_amount' => cartTotalDeliverityAmount(),
            'coupon_amount' => session()->has('coupon') ? session()->get('coupon.amount') : 0,
            'paying_amount' => cartTotalAmount()
        ];
    }
}
