<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;
use App\CommercialInvoice;

class DashboardController extends Controller
{

    private $view_root = '/';

    public function index()
    {
        //dd(CommercialInvoice::find(1)->first()->tracking->id);
        $view = view($this->view_root . 'dashboard');
        $view->with('commercial_invoice_list', CommercialInvoice::all());
        return $view;
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Dashboard $dashboard)
    {
        //
    }


    public function edit(Dashboard $dashboard)
    {
        //
    }

    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
