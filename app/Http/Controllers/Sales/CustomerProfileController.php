<?php
namespace App\Http\Controllers\Sales;

use App\CustomerBank;
use App\CustomerContactPerson;
use App\CustomerProfile;
use App\CustomerType;
use App\Enclosure;
use App\CustomerEnclosure;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Session;

class CustomerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/sales/setting/customer_profile/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('customer_profile_list', CustomerProfile::all());
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
        $view->with('customer_type_list', CustomerType::pluck('name', 'id'));
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

        $customer_profile = new CustomerProfile;
        $customer_profile->fill($request->input());
        $customer_profile->creator_user_id = Auth::id();
        $customer_profile->establishment_date = date('Y-m-d', strtotime($request->establishment_date));
        $customer_profile->trade_license_issue_date = date('Y-m-d', strtotime($request->trade_license_issue_date));
        $customer_profile->incorporation_date = date('Y-m-d', strtotime($request->incorporation_date));
        $customer_profile->save();

        // Customer Bank
        $customer_banks = array();
        foreach ($request->banks as $bank) {
            array_push($customer_banks, new CustomerBank($bank));
        }
        $customer_profile->customer_banks()->saveMany($customer_banks);
        // Customer Contact Person
        $contact_person = array();
        foreach ($request->persons as $person) {
            array_push($contact_person, new CustomerContactPerson($person));
        }
        $customer_profile->contact_person()->saveMany($contact_person);
        // Customer enclosures
        $enclosures = array();
        if ($request->enclosures) {
            foreach ($request->enclosures as $key => $item) {
                if ($item['enclosure_file']) {
                    $file = $item['enclosure_file'];
                    $file_directory = 'storage/';
                    $file_name = time() . "-" . $file->getClientOriginalName();
                    $file->move($file_directory, $file_directory . $file_name);
                    $enclosure = new CustomerEnclosure;
                    $enclosure->file_directory = $file_directory;
                    $enclosure->file_name = $file_name;
                    $enclosure->enclosure_id = $item['enclosure_id'];
                    array_push($enclosures, $enclosure);
                }
            }
        }
        $customer_profile->customer_enclosure()->saveMany($enclosures);

        Session::put('alert-success', 'Customer created successfully');
        return redirect()->route('customer-profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerProfile  $customerProfile
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerProfile $customerProfile)
    {
        $view = view($this->view_root . 'show');
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerProfile  $customerProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerProfile $customerProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerProfile  $customerProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerProfile $customerProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerProfile  $customerProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerProfile $customerProfile)
    {
        //
    }
}
