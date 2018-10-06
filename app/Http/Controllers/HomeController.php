<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Session;

class HomeController extends Controller{

    public function __construct(){

        $this->middleware('auth');

    }

    public function index(){

        return redirect()->route('dashboard');

    }

    public function get_toaster_notification(){

        if (Session::has('alert-success')) {
            $data = [
                'title' => 'Success',
                'text' => Session::pull('alert-success'),
                'type' => 'success',
                'styling' => 'bootstrap3',
            ];
            return response()->json($data);
        }else if(Session::has('alert-danger')){
            $data = [
                'title' => 'Error',
                'text' => Session::pull('alert-danger'),
                'type' => 'error',
                'styling' => 'bootstrap3',
            ];
            return response()->json($data);
        }else if(Session::has('alert-info')){
            $data = [
                'title' => 'Info',
                'text' => Session::pull('alert-info'),
                'type' => 'info',
                'styling' => 'bootstrap3',
            ];
            return response()->json($data);
        }else if(Session::has('alert-warning')){
            $data = [
                'title' => 'Warning',
                'text' => Session::pull('alert-warning'),
                'type' => 'notice',
                'styling' => 'bootstrap3',
            ];
            return response()->json($data);
        }

    }

}
