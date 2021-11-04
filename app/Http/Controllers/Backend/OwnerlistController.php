<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\Floor;
use App\Models\Backend\Unit;
use App\Models\Backend\Flatowner;
use Session;
use DB;

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
        $ownerlist = Flatowner::orderBy('id', 'desc')->get();
        return view('Backend.pages.ownerlist.manage', compact('ownerlist'));
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

    public function getflatlist($id)
    {
        // Fetch Unit by Departmentid
        $unit = DB::table("units")->where("floorno",$id)->pluck("unitname","id");
        return json_encode($unit);
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
            'floorno.required' => 'Please Select Option',
            'unitname.required'  =>  'Please Select Option',
            'owneruser.required'  =>  'Please Select Option',

        ]);
        $ownerlist  =  new Flatowner();

        $ownerlist->floorID     = $request->floorno;
        $ownerlist->unitID      = $request->unitname;
        $ownerlist->userID      = $request->owneruser;

        $ownerlist->save();

        $notification = array(
            'message'       => 'Data Added Successfully!!!',
            'alert-type'    => 'success'
        ); 

        return redirect()->route('ownerlist.manage')->with($notification);

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
        $ownerlist = Flatowner::find($id);
        if (!is_null($ownerlist) ) 
        {
            return view('Backend.pages.ownerlist.edit', compact('ownerlist'));
        }else
        {
            $notification = array(
                'message'       => 'Oho!! Blog data not found!!!',
                'alert-type'    => 'error'
            );

            return redirect()->route('ownerlist.manage');
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
            'floorno' => ['required'],
            'unitname'  => ['required'],
            'owneruser'  => ['required'],
        ],

        $message = [
            'floorno.required' => 'Please Select Option',
            'unitname.required'  =>  'Please Select Option',
            'owneruser.required'  =>  'Please Select Option',

        ]);
        $ownerlist  =  Flatowner::find($id);

        $ownerlist->floorID     = $request->floorno;
        $ownerlist->unitID      = $request->unitname;
        $ownerlist->userID      = $request->owneruser;

        $ownerlist->save();

        $notification = array(
            'message'       => 'Data Updated Successfully!!!',
            'alert-type'    => 'success'
        ); 

        return redirect()->route('ownerlist.manage')->with($notification);
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
        $delete = Flatowner::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Owner deleted successfully";
            
        } else {
            $success = true;
            $message = "Owner not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
