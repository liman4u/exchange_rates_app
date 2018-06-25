<?php

namespace App\Http\Controllers;

use App\Jobs\GetExchangeRateJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Log;
use Session;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Log::info("Base : ".$request->input('base'));
        //Log::info("Target : ".$request->input('target'));
        //Log::info("Amount : ".$request->input('amount'));

       $rules =  [
            'base' => 'required',
            'amount' => 'required | numeric',
            'target' => 'required'
        ];

       $validator = Validator::make($request->all(),$rules);

       if($validator->fails()){

           return Redirect::back()
               ->withErrors($validator);
       }else{

           $data = $this->dispatch(new GetExchangeRateJob($request));

           //dd($data);

           $base = $request->input('base');

           $target = $request->input('target');

           $amount = $request->input('amount');

           if($data->success){

               $rate = $data->result;

               Session::flash('success', "Rate for ".$amount." ".$base." is ".$rate." ".$target);

               return view('rate');
           }else{

               Log::error("Could not get rate for ".$request->input('target') ." with base ".$request->input('base')." of amount ".$amount);

               return Redirect::back()
                   ->with('failure',"Could not get rate for ".$target ." with base ".$base." of amount ".$amount);
           }



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
    }
}
