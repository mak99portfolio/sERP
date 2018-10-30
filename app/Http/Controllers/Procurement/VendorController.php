<?php

namespace App\Http\Controllers\Procurement;

use App\Vendor;
use App\VendorCategory;
use App\VendorBank;
use App\VendorPaymentTerm;
use App\VendorContact;
use App\EnclosureVendor;
use App\Model\Core\Country;
use App\Model\Core\Enclosure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/setting/vendor/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('vendor_list', Vendor::all());
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
        $view->with('vendor_id', time());
        $view->with('country_list', Country::pluck('name', 'id')->prepend('--select country--', ''));
        $view->with('vendor_category_list', VendorCategory::pluck('name', 'id')->prepend('--select vendor--', ''));
        $view->with('enclosure_list', Enclosure::all());
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
        $request->validate([
            'vendor_id' => 'required|unique:vendors',
            'name' => 'required',
            'country_id' => 'required',
            'vendor_category_id' => 'required',
        ]);
        $vendor = new Vendor;
        $vendor->fill($request->input());
        $vendor->business_type = serialize($request->business_type);
        $vendor->business_nature = serialize($request->business_nature);
        $vendor->creator_user_id = Auth::id();
        $vendor->save();
        $vendor->payment_term()->save(new VendorPaymentTerm($request->payment_term));
       
        // $vendor->bank()->save(new VendorBank($request->bank));
        
        // Bank
        $banks = Array();
        foreach($request->banks as $bank){
            array_push($banks, new VendorBank($bank));
        }
        $vendor->banks()->saveMany($banks);
        // Bank
        // contacts
        $contacts = Array();
        foreach($request->contacts as $contact){
            array_push($contacts, new VendorContact($contact));
        }
        $vendor->contacts()->saveMany($contacts);
        // contacts
        $enclosures = Array();
        if($request->enclosures){
            foreach($request->enclosures as $key => $item){
                if ($item['enclosure_file']) {
                    $file = $item['enclosure_file'];
                    $file_directory = 'storage/';
                    $file_name = $vendor->vendor_id . "-" . $file->getClientOriginalName();
                    $file->move($file_directory, $file_directory . $file_name);
                    $enclosure = new EnclosureVendor;
                    $enclosure->file_directory = $file_directory;
                    $enclosure->file_name = $file_name;
                    $enclosure->enclosure_id = $item['enclosure_id'];
                    array_push($enclosures, $enclosure);
                }
            }
        }
        $vendor->enclosures()->saveMany($enclosures);
        Session::put('alert-success', 'vendor created successfully');
        return redirect()->route('vendor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        $view = view($this->view_root . 'show');
        $view->with('vendor', $vendor);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
