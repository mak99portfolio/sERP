<?php

namespace App\Http\Controllers\Core;

use App\Enclosure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class EnclosureController extends Controller
{

    private $view_root = 'modules/core/enclosure/';

    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('enclosure_list', Enclosure::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root.'create');
        return $view;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:enclosures',
            'short_name' => 'required|unique:enclosures',
        ]);
        $enclosure = new Enclosure;
        $enclosure->fill($request->input());
        $enclosure->creator_user_id = Auth::id();
        $enclosure->save();
        Session::put('alert-success', $enclosure->name . ' created successfully');
        return redirect()->route('enclosure.index');
    }

    public function show(Enclosure $enclosure)
    {
        //
    }

    public function edit(Enclosure $enclosure)
    {
        $view = view($this->view_root.'edit');
        $view->with('enclosure',$enclosure);
        return $view;
    }

    public function update(Request $request, Enclosure $enclosure)
    {
        $request->validate([
            'name'=>'required|unique:enclosures,name,'.$enclosure->id,
            'short_name'=>'required|unique:enclosures,short_name,'.$enclosure->id,
        ]);
        
        $enclosure->fill($request->all());
        $enclosure->update();
        Session::put('alert-success',$enclosure->name . ' updated successfully!');
        return redirect()->route('enclosure.index');

    }

    public function destroy(Enclosure $enclosure)
    {
        //
    }
}
