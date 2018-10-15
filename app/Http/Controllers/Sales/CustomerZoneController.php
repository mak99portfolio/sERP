<?php

namespace App\Http\Controllers\Sales;
use App\Http\Controllers\Controller;
use App\CustomerZone;
use App\City;
use Illuminate\Http\Request;
use Auth;
use Session;

class CustomerZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/sales/setting/customer_zone/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('customer_zone_list', CustomerZone::all());
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('city_list', City::pluck('name', 'id'));
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd( $request->input());
        $request->validate([
            'name' => 'required|unique:customer_zones',
            'short_name' => 'required|unique:customer_zones',
            'city_ids' => 'required'
        ]);
        $customer_zone = new CustomerZone;
        $customer_zone->fill($request->input());
        $customer_zone->creator_user_id = Auth::id();
        $customer_zone->save();

        $customer_zone->zone_cities()->sync($request->city_ids);

        Session::put('alert-success', 'Customer zone created successfully');
        return redirect()->route('customer-zone.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerZone  $customerZone
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerZone $customerZone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerZone  $customerZone
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerZone $customerZone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerZone  $customerZone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerZone $customerZone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerZone  $customerZone
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerZone $customerZone)
    {
        //
    }
}
