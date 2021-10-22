<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Channels\PaymentReceiptChannel;

use Reflection;

class PaymentReceipt extends Notification
{
    use Queueable;

    public $orderId;
    public $amount;
    public $refId;

    public function __construct($orderId , $amount , $refId)
    {
        $this->orderId = $orderId;
        $this->amount = $amount;
        $this->refId = $refId;
    }



    public function via($notifiable)
    {
        return [PaymentReceiptChannel::class];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
    public function toSms($notifiable)
    {
        return [
            'orderId' => $this->orderId,
            'amount' => $this->amount,
            'refId' => $this->refId
        ];
    }

}
