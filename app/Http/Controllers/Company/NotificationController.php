<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller{

    protected function path(string $suffix){
        return "modules.company.notification.{$suffix}";
    }

    public function index(){

        $data=[
            'notifications'=>\Auth::user()->unreadNotifications
            //'notifications'=>\Auth::user()->notifications
        ];

        //dd($data);

        return view($this->path('index'), $data);
        
    }

    public function create(){
        
    }


    public function store(Request $request){
        
    }


    public function show(\App\Notification $notification){

        $notification->read_at=\Carbon\Carbon::now();
        $notification->save();
        $data=json_decode($notification->data);

        if(empty($data->url)) return back();
        return redirect()->away($data->url);
        
    }

    public function edit($id){
        
    }

    public function update(Request $request, $id){
        
    }


    public function destroy(\App\Notification $notification){

        $notification->read_at=\Carbon\Carbon::now();
        $notification->save();
        return back();
        
    }

}
