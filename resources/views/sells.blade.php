@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           
            <div class="panel panel-default">
                <div class="panel-heading">
                
	                <form action="" method="get">
	                Category: 
			           <select class="form-data" name="category">
			           <option value="">Select Category</option>
			           	@foreach( App\Category::all() as $category) 
				             <option value="{{$category->id}}" @if(isset($_GET['category']) && $_GET['category'] == $category->id) {{'selected'}} @endif>{{$category->name}}</option>
				        @endforeach	
				       </select> 
		       		From Date: <input type="text" class="form-data" id="datepicker" name="from" @if(isset($_GET['from'])) value="{{$_GET['from']}}" @endif/>
		       		To Date: <input type="text" class="form-data" id="datepicker2" name="to" @if(isset($_GET['to'])) value="{{$_GET['to']}}" @endif/>
		       		<input type="submit" value="Search" class="form-data"/>
		       		</form>
		       		
	       		</div> 
	       		
	       		<a href="{{route('sells.create')}}"><h4 align="center">New Sell</h4></a>
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
					    	<tr co><td colspan="5" align="center">No data found</td></tr>
					    @endif 
					    </tbody>
					    
					  </table>
					  {{ $sells->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
