<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Depositor;
use Session;
use Auth;
use Validator;


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

        return redirect()->route('deposit.confirmed')->with($notification);
    }

    public function confirm()
    {
        return view('Backend.pages.deposit.confirm');
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
