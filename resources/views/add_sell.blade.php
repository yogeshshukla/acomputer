@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sell</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('sells.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                            <select id="category"  class="form-control" name="category" value="{{ old('category') }}" required autofocus>
	                            @foreach( App\Category::all() as $category) 
	                            	<option value="{{$category->id}}">{{$category->name}}</option>
	                            @endforeach	
	                            </select>
	                            @if ($errors->has('category'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('category') }}</strong>
	                                </span>
	                            @endif
                            
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control" name="quantity" value="{{ old('quantity') }}" required autofocus>

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" required autofocus>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
