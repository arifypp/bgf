<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\Floor;
use Illuminate\Support\Facades\Session;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $floor = Floor::orderBy('id', 'desc')->get();
        return view('Backend.pages.floor.manage', compact('floor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Backend.pages.floor.create');
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
            'floorno' => ['required','unique:floors', 'min:3'],
        ],

        $message = [
            'floorno.unique' => 'Please Enter Unique Name',
            'floorno.required' => 'Fill out the field',
        ]);

        $floor  =  new Floor();

        $floor->floorno          = $request->floorno;
        $floor->slug             = Str::slug($request->floorno);

        $floor->save();
        Session::flash('message', 'Added Data Successfully !');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('floor.manage');
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
        $floor = Floor::find($id);
        if (!is_null($floor) ) 
        {
            return view('Backend.pages.floor.edit', compact('floor'));
        }else
        {
            $notification = array(
                'message'       => 'Oho!! Blog data not found!!!',
                'alert-type'    => 'error'
            );

            return redirect()->route('floor.manage');
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
        $request->validate([
            'floorno' => ['required','unique:floors', 'min:3'],
        ],

        $message = [
            'floorno.unique' => 'Please Enter Unique Name',
            'floorno.required' => 'Fill out the field',
        ]);

        $floor  =  Floor::find($id);

        $floor->floorno          = $request->floorno;
        $floor->slug             = Str::slug($request->floorno);

        $floor->save();
        Session::flash('message', 'Edit data successfully !');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('floor.manage');
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
        $floor  =  Floor::find($id);

        if( !is_null($floor) )
        {
            $floor->delete();
            
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
}
