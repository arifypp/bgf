<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use App\Models\Backend\Notification;
use App\Models\Backend\notificationseen;
use Session;
use Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notification   =   Notification::orderBy('id', 'desc')->get();
        return view('Backend.pages.notification.manage', compact('notification'));
    }

    public function notify()
    {
        //
        $notification   =   Notification::with('notificationseen')->get();
        return view('Backend.pages.notification.notify', compact('notification'));
    }

    public function notifySingle($id)
    {
        $notification = Notification::find($id);
        if (!is_null($notification) ) 
        {
            return view('Backend.pages.notification.notifydetails', compact('notification'));
        }else
        {
            $notification = array(
                'message'       => 'Oho!! Blog data not found!!!',
                'alert-type'    => 'error'
            );

            return redirect()->route('notification.manage');
        }

        return view('Backend.pages.notification.notify', compact('notification'));
    }

    public function seenunseen(Request $request)
    {
        $seen = new notificationseen();
        
        $seen->userid               = $request->user()->id;  
        $seen->notificationID       = $request->postId;  
        $seen->seen                 = '1';  
        $seen->save();
        return response()->json(['success' =>true, 'message'=> 'notification seen']);
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Backend.pages.notification.create');
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

            'name'          =>  ['required'],
            'type'          =>  ['required'],
            'description'   =>  ['required'],
        ],

        $message = [
            'name'          =>  'This field cant be empty',
            'type'          =>  'This field cant be empty',
            'description'   =>  'This field cant be empty',

        ]);
        $notification  =  new Notification();

        $notification->name        =   $request->name;
        $notification->type        =   $request->type;
        $notification->description =   $request->description;

        $notification->save();

        $notification = array(
            'message'       => 'Data Added Successfully!!!',
            'alert-type'    => 'success'
        ); 

        return redirect()->route('notification.manage')->with($notification);
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
        $notification = Notification::find($id);
        if (!is_null($notification) ) 
        {
            return view('Backend.pages.notification.edit', compact('notification'));
        }else
        {
            $notification = array(
                'message'       => 'Oho!! Blog data not found!!!',
                'alert-type'    => 'error'
            );

            return redirect()->route('notification.manage');
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

            'name'          =>  ['required'],
            'type'          =>  ['required'],
            'description'   =>  ['required'],
        ],

        $message = [
            'name'          =>  'This field cant be empty',
            'type'          =>  'This field cant be empty',
            'description'   =>  'This field cant be empty',

        ]);
        $notification  =  Notification::find($id);

        $notification->name        =   $request->name;
        $notification->type        =   $request->type;
        $notification->description =   $request->description;

        $notification->save();

        $notification = array(
            'message'       => 'Data Updated Successfully!!!',
            'alert-type'    => 'success'
        ); 

        return redirect()->route('notification.manage')->with($notification);
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
        $delete = Notification::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Data deleted successfully";
            
        } else {
            $success = true;
            $message = "Data not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
