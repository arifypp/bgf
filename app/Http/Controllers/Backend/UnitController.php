<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\Floor;
use App\Models\Backend\Unit;
use Session;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $unit = Unit::orderBy('id', 'desc')->get();
        return view('Backend.pages.unit.manage', compact('unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if( auth()->user()->is_super == 0 ){
            return view('Backend.pages.unit.create');
        }
        else
        {
            return back();
        }
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
        if( auth()->user()->is_super == 0 ){
           
        $request->validate([
            'unitname' => ['required'],
            'floorno'  => ['required'],
        ],

        $message = [
            'unitname.required' => 'Fill out the field',
            'floorno.required'  =>  'Fill out the field',

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
        else
        {
            return back();
        }
        
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
        if( auth()->user()->is_super == 0 ){
            
            $unit = Unit::find($id);
            if (!is_null($unit) ) 
            {
                return view('Backend.pages.unit.edit', compact('unit'));
            }else
            {
                $notification = array(
                    'message'       => 'Oho!! Blog data not found!!!',
                    'alert-type'    => 'error'
                );
    
                return redirect()->route('unit.manage');
            }
            
        }
        else
        {
            return back();
        }

       
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
        if( auth()->user()->is_super == 0 ){
            
            $request->validate([
                'unitname' => ['required'],
                'floorno'  => ['required'],
            ],
    
            $message = [
                'unitname.required' => 'Fill out the field',
                'floorno.required'  =>  'Fill out the field',
    
            ]);
    
            $unit  =  Unit::find($id);
    
            $unit->floorno          = $request->floorno;
            $unit->unitname         = $request->unitname;
            $unit->slug             = Str::slug($request->unitname);
    
            $unit->save();
    
            Session::flash('message', 'Data Saved Successfully !');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('unit.manage');

        }
        else
        {
            return back();
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( auth()->user()->is_super == 0 ){
            
            //
            $unit  =  Unit::find($id);

            if( !is_null($unit) )
            {
                $unit->delete();
                
                //Inside controller's metho
                Session::flash('message', 'Deleted successfully !');
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();
                
            }
            else
            {
                return redirect()->back()->with('message', 'Somethings is wrong!');

            }

            return redirect()->back()->with('message', 'Somethings is wrong!');

        }
        else
        {
            return back();
        }

    }
}
