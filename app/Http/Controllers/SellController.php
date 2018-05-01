<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sell;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$sells = Sell::all();
        return view('sells', array('sells' => $sells));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_sell');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
	        'category' => 'required',
	        'quantity' => 'required',
	        'amount' => 'required',
	   	]);
	   	$obj = new Sell();
	   	$obj->category_id = $request['category'];
	   	$obj->quantity = $request['quantity'];
	   	$obj->amount = $request['amount'];
	   	
	   	if($obj->save()){
			return redirect('/sells')->withSuccess('Added successfully!');
		}else {
			return redirect('/sells')->withError('Something went wrong!');
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
        if(Sell::destroy($id)){
			return redirect('/sells')->withSuccess('Deleted successfully!');
		}else {
			return redirect('/sells')->withError('Something went wrong!');
		}
    }
}
