<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\Cnf;
use Illuminate\Http\Request;

class CnfController extends Controller
{
    private $view_root = 'modules/procurement/foreign/cnf/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        // $view->with('foo', 'bar');
        // your code here
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        // $view->with('foo', 'bar');
        // your code here
        return $view;
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Cnf $cnf)
    {
        //
    }

    public function edit(Cnf $cnf)
    {
        //
    }

    public function update(Request $request, Cnf $cnf)
    {
        //
    }

    public function destroy(Cnf $cnf)
    {
        //
    }
}
