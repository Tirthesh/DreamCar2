@extends('layouts.search')

@section('content')
    <div class="row">
        <div class="col-md-10">
    	    <form method="POST" action="search" accept-charset="UTF-8">
    	    	{{ csrf_field() }}

	            <div class="panel panel-default">
                	<div class="panel-heading">Search</div>

                	<div class="panel-body">
			            <div id="custom-search-input">
			                <div class="input-group col-md-12">
			                	<div class="row">
            		                <div class="col-xs-12 form-group">
										{!! Form::Label('category', 'Category:') !!}
										<select class="form-control" name="category" required>
											@foreach($categories as $category)
												<option value="{{$category->id}}">{{$category->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
			            <div id="custom-search-keywords">
			                <div class="input-group col-md-12">
			                	<div class="row">
            		                <div class="col-xs-12 form-group">
					                    <input  type="text" class="form-control input-lg" name="keywords" placeholder="Please enter keyword to search" value="{{ old('keywords') }}" />
				                    </div>
				                </div>
			                </div>
			            </div>
			            <div id="custom-search-priceRange">
			                <div class="input-group col-md-12">
			                	<div class="row">
            		                <div class="col-xs-6 form-group">
										Min <input class="form-control" type="number" min="0" max="10000000" step="10000" name="min_price" >
									</div>
            		                <div class="col-xs-6 form-group">
          								Max <input class="form-control" type="number" min="0" max="10000000" step="10000" name="max_price" >
									</div>
								</div>
							</div>
						</div>
			            <div id="custom-search-submit">
			                <div class="input-group col-md-12">
			                	<div class="row">
            		                <div class="col-xs-12 form-group">
				                        <button  class="btn btn-info btn-lg" name="submit" type="submit">
				                            Search
				                        </button>
					                </div>
				                </div>
			                </div>
			            </div>
                	</div>
        	    </div>
			</form>
        </div>
    </div>

@if (isset($products))
	@include('searchResult', ['products' => $products])
@endif
@endsection
