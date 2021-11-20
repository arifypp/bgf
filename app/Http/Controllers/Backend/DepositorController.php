<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Depositor;
use App\Models\Backend\TotalCash;
use Session;
use Auth;
use Validator;
use DB;

class DepositorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Depositor = Depositor::orderBy('id', 'desc')->get();
        return view('Backend.pages.deposit.manage', compact('Depositor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Backend.pages.deposit.create');
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
            'amount'          =>  ['required'],
            'traxId'        => ['required','unique:depositors'],
        ],

        $message = [
            'amount'          =>  'Name cant be empty!',
            'traxId'        =>  'Already Deposits',

        ]);
        
        $deposit = new Depositor();

        $deposit->name          =   $request->name;
        $deposit->traxId        =   $request->traxId;
        $deposit->paymentType   =   $request->paymentType;
        $deposit->amount        =   $request->amount;
        $deposit->bankname      =   $request->bankname;
        $deposit->bankAcc       =   $request->bankAcc;
        $deposit->checkNo       =   $request->checkNo;
        $deposit->mobileNo      =   $request->mobileNo;
        $deposit->mobileTrx     =   $request->mobileTrx;
        $deposit->userID        =   $request->user()->id;   
        
        $deposit->save();

        $notification = array(
            'message'       => 'Deposit Successfully!!!',
            'alert-type'    => 'success'
        ); 

        return redirect()->route('deposit.confirmed', $deposit)->with($notification);
    }

    public function invoice($id)
    {
        //
        $deposit = Depositor::find($id);
        if (!is_null($deposit) ) 
        {
            return view('Backend.pages.deposit.invoice', compact('deposit'));
        }else
        {
            $notification = array(
                'message'       => 'Oho!! Data not found!!!',
                'alert-type'    => 'error'
            );

            return redirect()->route('deposit.manage');
        }
    }

    public function status($id)
    {
        $status = Depositor::find($id);
        $status->status =   1;
        $status->save();



        if( $status->status ==  1 )
        {
            $TotalCash = TotalCash::find(1);
            $totalamount = $TotalCash->totalamount + $status->amount;
            $CurrentAmount = $TotalCash->currentbalance + $status->amount;
            $TotalCash->totalamount = $totalamount;
            $TotalCash->currentbalance = $CurrentAmount;
            $TotalCash->save();
        }
        

        return response()->json(['success' =>true, 'message'=> 'Payment Accepted']);

    }

    public function confirm($traxId)
    {
        
        $traxId = Depositor::find($traxId);
        if (!is_null($traxId) ) 
        {
            return view('Backend.pages.deposit.confirm', compact('traxId'));
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
        //
        $delete = Depositor::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Data deleted successfully";
        
            
        } else {
            $success = true;
            $message = "Data not found";
        }

        DB::table('total_cashes')
        ->where('id', 1)
        ->update(['totalamount' => $delete->sum('amount')]);
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
