@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div> <a href="{{route('categories.create')}}"><h4 align="center">Create New category</h4></a>
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
					        <th>Actions</th>
					      </tr>
					    </thead>
					    <tbody>
					    @if($categories->count()>0)
					      @foreach($categories as $category)
					      <tr>
					        <td>{{$category->name}}</td>
					        
					        <td>
						        <form action="{{route('categories.destroy', $category->id)}}" method="post">
							        {{method_field('DELETE')}}
		   							{{ csrf_field() }}
							        <button>Delete</button>
						        </form>
					        </td>
					      </tr>
					      @endforeach
					    @else
					    	<tr co><td colspan="2" align="center">No data found</td></tr>
					    @endif 
					    </tbody>
					  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
