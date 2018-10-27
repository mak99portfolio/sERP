<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestController extends Controller{

	public function __construct(){
		//$this->middleware('hasPermission:can_test');
	}

    protected function path(string $suffix){
        return "test.{$suffix}";
    }

    public function index(){
    	//Role::create(['name' => 'super_admin']);
        //Permission::create(['name' => 'can_test']);
        //$permission=Permission::where(['name'=>'can_test'])->first();
        //$role=Role::where(['name'=>'super_admin'])->first();
        //$role->givePermissionTo($permission);
        //\Auth::user()->assignRole($role);
        //echo 'passed permission middleware';
        //dd(uCode('working_units.working_unit_no', 'WU'));
        //return view($this->path('index'));

        $units=\App\WorkingUnit::all()->toArray();
        /*
        foreach($units as $index=>$row){
            $units[$index]['items']=\App\Stock::with('product')->where(['working_unit_id', $row['id'])->selectRaw("(CAST(SUM(receive_quantity) AS FLOAT)-CAST(SUM(issue_quantity) AS FLOAT)) AS physical_quantity, product_id")->groupBy('product_id')->get()->toArray();
        }
        */

        foreach($units as $index=>$row){
            $units[$index]['physical_quantity']=\App\Stock::where([
                'working_unit_id'=>$row['id'],
                'product_id'=>1,
                'product_status_id'=>1,
                'product_type_id'=>1
            ])->sum('receive_quantity')-\App\Stock::where([
                'working_unit_id'=>$row['id'],
                'product_id'=>1,
                'product_status_id'=>1,
                'product_type_id'=>1
            ])->sum('issue_quantity');

            $units[$index]['product']=\App\Product::find(1)->toArray();
        }

        dd($units);
    }

    public function design(){
        return view($this->path('design'));
    }

}
