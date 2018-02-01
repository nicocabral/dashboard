@extends('../layouts.master')
@section('content')
@include('Dashboard.products.create')
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('index')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
          <i class="fa fa-cubes"></i> Products
        </li>
      </ol>
       <hr>
       <div class="row" style="margin-bottom:5px;">
       	<div class="col-md-6">
       		<button class="btn btn-success" style="cursor:pointer;" data-toggle="modal" data-target="#createModal" id="createNew"><i class="fa fa-cube"></i> Create new product</button>
       		<a href="{{ route('products')}}" class="btn btn-primary" style="cursor:pointer;"><i class="fa fa-refresh"></i> Refresh</a>
       	</div>
       	<div class="col-md-6">
       		<form method="post" action="{{ route('searchProduct')}}">
       		 {{ csrf_field() }}
       		  <div class="input-group">
			      <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for..." name="search" required value="{{Request::old('search')}}">
			      <span class="input-group-btn">
			        <button class="btn btn-dark" type="submit"><i class="fa fa-search"></i></button>
			      </span>
			    </div>
       		</form>
       	</div>
       </div>
       <div class="row">
       	<div class="col-md-6">
       		@include('../messages.message')
       	</div>
       </div>
       <div class="row">
       	<div class="col-md-12">
       		<table class="table table-bordered table-hover table-condensed table-striped table-reponsive">
       			<thead>
       				<tr>
       					<th>Product name</th>
       					<th>Status</th>
       					<th>Action</th>
       				</tr>
       			</thead>
       			<tbody>
       				@foreach($products as $product)
       				<tr>
       					<td>{{ $product->product_name }}</td>
       					<td>
       						@if($product->prod_stat == 'Available')
       						<p style="color:green;"><strong>{{ $product->prod_stat}}</strong></p>
       						@else
       						<p style="color:red;"><strong>{{ $product->prod_stat}}</strong></p>
       						@endif
       						</td>
       					<td>
       						<a href="{{route('viewRecipe')}}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="View recipes"><i class="fa fa-eye"></i></a> |
       						<button data-toggle="modal" data-target="#editModal{{ $product->id}}" class="btn btn-primary btn-sm" id="createNew"><i class="fa fa-edit"></i></button> | <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $product->id}}" id="createNew"><i class="fa fa-trash"></i></button></td>
       				</tr>
       				<!-- delete Modal -->
<div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa  fa-question-circle"></i> Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5><i class="fa fa-trash"></i> Are you sure you want to delete this product {{ $product->product_name}}?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="cursor:pointer;">Close</button>
        <a href="{{ route('deleteProduct',  Crypt::encrypt($product->id))}}" type="button" class="btn btn-danger" style="cursor:pointer;">Delete</a>
      </div>
    </div>
  </div>
</div>
<!-- edit Modal -->
<div class="modal fade" id="editModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa  fa-edit"></i> Edit {{ $product->product_name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('updateProduct', Crypt::encrypt($product->id)) }}" method="post">
      <div class="modal-body">
        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="firstname">Product name</label>
                <input class="form-control {{ $product->prod_stat=='Available' ? 'is-valid':'is-invalid' }}"  name="prodname" type="text" aria-describedby="nameHelp" placeholder="Enter Product name" value="{{ $product->product_name}}" required>
               <span style="color:red;"> {{ $errors->first('prodname', ':message')}}</span>
              </div>
            </div>
            <div class="row" style="margin-top: 10px;">
              <div class="col-md-8">
                <label for="prodstat">Product Status</label>
                <select class="form-control {{ $product->prod_stat=='Available' ? 'is-valid':'is-invalid' }}" name="prodstat">
               	@if($product->prod_stat == 'Available')
                  <option value="Available">Available</option>
                  <option value="Not-Available">Not-Available</option>
                 @else
                 <option value="Not-Available">Not-Available</option>
                 <option value="Available">Available</option>
                 @endif
                </select>
                <span style="color:red;"> {{ $errors->first('prodstat', ' :message')}}</span>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="cursor:pointer;">Close</button>
        <button type="submit" class="btn btn-success" style="cursor:pointer;">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
       				@endforeach
       			</tbody>
       		</table>

       	</div>
       </div>
       <div class="row">
       	<div class="col-md-9"></div>
       	<div class="col-md-3">
       		      {{ $products->links('vendor.pagination.bootstrap-4') }} 
       	</div>
       </div>

<script>
	
</script>
@endsection