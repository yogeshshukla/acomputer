<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = 2;
        $obj = new Purchase();
        
        if(isset($request['category']) && !empty($request['category'])){
			$obj = $obj->where('category_id', $request['category']);
		}
		
		if( isset($request['from']) && !empty($request['from']) ){
			if(isset($request['to']) && !empty($request['to'])){
				$obj = $obj->whereBetween('created_at', array(date('Y-m-d H:i:s', strtotime( $request['from'] )) , date('Y-m-d', strtotime( $request['to'] )).' 23:59:59'));
			}else {
				$obj = $obj->whereBetween('created_at', array(date('Y-m-d H:i:s', strtotime( $request['from'] )) , date('Y-m-d H:i:s')));
			}
			
		}else {
			if( isset($request['to']) && !empty($request['to']) ){
				$obj = $obj->whereBetween('created_at', array( date('Y-m-d H:i:s') , date('Y-m-d', strtotime( $request['to'] )).' 23:59:59') );
				
			}
		}
		$purchases = $obj->paginate($limit);
        return view('purchases', array('purchases' => $purchases));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_purchase');
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
	   	$obj = new Purchase();
	   	$obj->category_id = $request['category'];
	   	$obj->quantity = $request['quantity'];
	   	$obj->amount = $request['amount'];
	   	
	   	if($obj->save()){
			return redirect('/purchases')->withSuccess('Added successfully!');
		}else {
			return redirect('/purchases')->withError('Something went wrong!');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Purchase::destroy($id)){
			return redirect('/purchases')->withSuccess('Deleted successfully!');
		}else {
			return redirect('/purchases')->withError('Something went wrong!');
		}
    }
}
