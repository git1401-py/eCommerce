<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $guarded = [];

    public function getStatusAttribute($status)
    {
        switch ($status) {
            case '0':
                $status = 'درانتظار پرداخت';
                break;
            case '1':
                $status = 'پرداخت شده';
                break;

        }
        return $status;
    }
    public function getPaymentStatusAttribute($payment_status)
    {
        switch ($payment_status) {
            case '0':
                $payment_status = 'ناموفق';
                break;
            case '1':
                $payment_status = 'موفق';
                break;

        }
        return $payment_status;
    }
    public function getPaymentTypeAttribute($payment_type)
    {
        switch ($payment_type) {
            case 'pos':
                $payment_type = 'دستگاه پست';
                break;
            case 'cash':
                $payment_type = 'پول نقد';
                break;
            case 'shabaNumber':
                $payment_type = 'شماره شبا';
                break;
            case 'cardToCard':
                $payment_type = 'کارت به کارت';
                break;
            case 'online':
                $payment_type = 'اینترنتی';
                break;
        }
        return $payment_type;
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }
    public function address(){
        return $this->belongsTo(UserAddress::class);
    }
}
