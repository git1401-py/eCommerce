<?php

namespace App\PaymentGateway;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariation;
use App\Models\Transaction;
use App\Notifications\PaymentReceipt;
use Illuminate\Support\Facades\DB;

class Payment
{
    public function createOrder($addressId, $amounts, $token, $gateway_name)
    {

        try {
            DB::beginTransaction();
            $order = new Order();
            $order->user_id = auth()->id();
            $order->address_id = $addressId;
            $order->coupon_id = session()->has('coupon') ? session()->get('coupon.id') : null;
            $order->total_amount = $amounts['total_amount'];
            $order->delivery_amount = $amounts['delivery_amount'];
            $order->coupon_amount = $amounts['coupon_amount'];
            $order->paying_amount = $amounts['paying_amount'];
            $order->payment_type = 'online';

            $order->save();

            foreach (\Cart::getContent() as $item) {
                $order_item = new OrderItem();
                $order_item->order_id = $order->id;
                $order_item->product_id = $item->associatedModel->id;
                $order_item->product_variation_id = $item->attributes->id;
                $order_item->price = $item->price;
                $order_item->quantity = $item->quantity;
                $order_item->subtotal = $item->price * $item->quantity;

                $order_item->save();
            }

            $transaction = new Transaction();
            $transaction->user_id = auth()->id();
            $transaction->order_id = $order->id;
            $transaction->amount = $amounts['paying_amount'];
            $transaction->token = $token;
            $transaction->gateway_name = $gateway_name;

            $transaction->save();


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return ['error' => $ex->getMessage()];
        }

        return ['success' => 'SuCcEsS'];
    }

    public function updateOrder($token, $refId)
    {
        try {
            DB::beginTransaction();

            $transaction = Transaction::where('token', $token)->firstOrFail();
            $transaction->update([
                'status' => 1,
                'ref_id' => $refId
            ]);

            $order = Order::findOrFail($transaction->order_id);
            $order->update([
                'payment_status' => 1,
                'status' => 1,
            ]);

            auth()->user()->notify(new PaymentReceipt($order->id , $order->paying_amount , $refId ));

            foreach (\Cart::getContent() as $item) {
                $variation = ProductVariation::find($item->attributes->id);
                $variation->update([
                    'quantity' => $variation->quantity - $item->quantity
                ]);
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return ['error' => $ex->getMessage()];
        }

        return ['success' => 'SuCcEsS'];
    }
}
