<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\Floor;
use App\Models\Backend\Unit;
use Session;

class OwnerlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Backend.pages.ownerlist.manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Backend.pages.ownerlist.create');
    }

    public function getflatlist($flatno=0)
    {
        // Fetch Unit by Departmentid
        $empData['data'] = Unit::orderby("id", "asc")
        ->select('id','unitname')
        ->where('floorno',$flatno)
        ->get();

        return response()->json($empData);
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
            'floorno' => ['required'],
            'unitname'  => ['required'],
            'owneruser'  => ['required'],
        ],

        $message = [
            'floorno.required' => 'Fill out the field',
            'unitname.required'  =>  'Fill out the field',
            'owneruser.required'  =>  'Fill out the field',

        ]);

        $unit  =  new Unit();

        $unit->floorno          = $request->floorno;
        $unit->unitname         = $request->unitname;
        $unit->slug             = Str::slug($request->unitname);

        $unit->save();

        Session::flash('message', 'Data Added Successfully !');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('unit.manage');
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
