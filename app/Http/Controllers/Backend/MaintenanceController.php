<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\Maintenance;
use Session;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $maintenance = Maintenance::orderBy('id', 'desc')->get();
        return view('Backend.pages.maintenance.manage', compact('maintenance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Backend.pages.maintenance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'     =>  ['required'],
            'date'      =>  ['required'],
            'amount'    =>  ['required'],
            'details'   =>  ['required'],
        ],

        $message = [           
            'title.required'    =>  'This field empty!',
            'date.required'     =>  'This field empty!',
            'amount.required'   =>  'This field empty!',
            'details.required'  =>  'This field empty!',
        ]);

        $maintenance  =  new Maintenance();

        $maintenance->title     =   $request->title;
        $maintenance->date      =   $request->date;
        $maintenance->amount    =   $request->amount;
        $maintenance->purpose   =   $request->purpose;
        $maintenance->details   =   $request->details;

        $maintenance->save();

        $notification = array(
            'message'       => 'Data Added Successfully!!!',
            'alert-type'    => 'success'
        ); 

        return redirect()->route('maintenance.manage')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
