@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Purchases</div> <a href="{{route('purchases.create')}}"><h4 align="center">New Purchase</h4></a>
				@if(session('success'))
				    <h3 align="center" style="color: green">{{session('success')}}</h3>
				@endif
				@if(session('error'))
				    <h3 align="center" style="color: red">{{session('error')}}</h3>
				@endif
                <div class="panel-body">
                      <table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Category Name</th>
					        <th>Quantity</th>
					        <th>Amount</th>
					        <th>Purchase date</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
					    @if($purchases->count()>0)
					      @foreach($purchases as $purchase)
					      <tr>
					        <td>{{$purchase->category->name}}</td>
					        <td>{{$purchase->quantity}}</td>
					        <td>{{$purchase->amount}}</td>
					        <td>{{$purchase->created_at}}</td>
					        <td>
						        <form action="{{route('purchases.destroy', $purchase->id)}}" method="post">
							        {{method_field('DELETE')}}
		   							{{ csrf_field() }}
							        <button>Delete</button>
						        </form>
					        </td>
					      </tr>
					      @endforeach
					    @else
					    	<tr co><td colspan="5" align="center">No data found</td></tr>
					    @endif 
					    </tbody>
					  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
