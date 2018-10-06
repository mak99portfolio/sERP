<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SimpleNotification extends Notification{

    use Queueable;

    protected $data;


    public function __construct(array $data){

        $default=[
            'subject'=>'Simple Notification.',
            'sender_id'=>NULL,
            'url'=>'#',
            'message'=>'Not Specified'
        ];

        $this->data=array_merge($default, $data);

    }


    public function via($notifiable){

        return ['database'];

    }

    public function toDatabase($notifiable){

        return $this->data;

    }

}
