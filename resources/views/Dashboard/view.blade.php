@extends('layouts.master')
@section('content')
<!-- delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa  fa-question-circle"></i> Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5><i class="fa fa-trash"></i> Are you sure you want to delete this data?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="cursor:pointer;">Close</button>
        <a href="{{ route('delete',  Crypt::encrypt($users->id))}}" type="button" class="btn btn-danger" style="cursor:pointer;">Delete</a>
      </div>
    </div>
  </div>
</div>


 <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('index')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
       
      </ol>
       <hr>
     <div class="row">
       <div class="col-md-12">
        <h3><i class="fa fa-user-circle-o"></i> User information</h3>
<!-- user info -->
<div class="card mb-3">
        <div class="card-header">
        	<div class="card-body">
        		<div class="col-md-8">
  <form method="post" action="{{ route('postSaveUpdate', Crypt::encrypt($users->id))}}">
  	{{ csrf_field() }}
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Firstname</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="firstname"  value="{{ $users->fname }}">
      <span style="color:red;"> {{ $errors->first('firstname', ' :message')}}</span>
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Lastname</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="lastname"  value="{{ $users->lname }}">
      <span style="color:red;"> {{ $errors->first('lastname', ' :message')}}</span>
    </div>
  </div>
   <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  value="{{ $users->email }}" readonly="readonly">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  placeholder="Password" readonly value="*********">
    </div>
  </div>
  <center>
  <div class="btn-group" role="group" aria-label="Basic example">
  <button type="submit" class="btn btn-success" style="cursor:pointer;"><i class="fa fa-pencil-square-o"></i> Update</button>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"style="cursor:pointer;"><i class="fa fa-trash"></i> Delete</button>
  <a  href="{{ route('index')}}" type="button" class="btn btn-secondary"><i class="fa fa-chevron-circle-left"></i> Back</a>
</center>
</div>
</form>
        		</div>
        	</div>
</div>
</div>

          
      </div>
    </div>

@endsection