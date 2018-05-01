@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sells</div> <a href="{{route('sells.create')}}"><h4 align="center">New Sell</h4></a>
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
					        <th>Sell date</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
					    @if($sells->count()>0)
					      @foreach($sells as $sell)
					      <tr>
					        <td>{{$sell->category->name}}</td>
					        <td>{{$sell->quantity}}</td>
					        <td>{{$sell->amount}}</td>
					        <td>{{$sell->created_at}}</td>
					        <td>
						        <form action="{{route('sells.destroy', $sell->id)}}" method="post">
							        {{method_field('DELETE')}}
		   							{{ csrf_field() }}
							        <button>Delete</button>
						        </form>
					        </td>
					      </tr>
					      @endforeach
					    @else
					    	<tr co><td colspan="4" align="center">No data found</td></tr>
					    @endif 
					    </tbody>
					  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
