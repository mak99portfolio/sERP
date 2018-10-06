<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InventoryRequisition extends Notification{

    use Queueable;

    protected $inventory_requisition;


    public function __construct(\App\InventoryRequisition $inventory_requisition){

        $this->inventory_requisition=$inventory_requisition;

    }


    public function via($notifiable){

        return ['database'];

    }

    public function toDatabase($notifiable){

        return [
            'subject'=>'Inventory Requisition',
            'sender_id'=>$this->inventory_requisition->final_approver_id,
            'url'=>route('requisition.show', ['requisition'=>$this->inventory_requisition->id]),
            'message'=>'An Inventory Requisition Requested To Your Working Unit'
        ];

    }

}
