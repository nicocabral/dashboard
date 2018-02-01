@extends('layouts.master')
@section('content')
@include('Dashboard.user.create')
 <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('index')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
       
      </ol>
       <hr>
     <div class="row">
       <div class="col-md-6 col-offset-2">
        <button class="btn btn-success" style="cursor:pointer;" data-toggle="modal" data-target="#createModal" id="createNew"><i class="fa fa-user-plus"></i> Create new user</button>
        @include('messages.message')
                     
          <div class="list-group" style="margin-top:10px;">
            @foreach($users->all() as $user)
            <a href="{{ route('view', Crypt::encrypt($user->id)) }}" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> {{ $user->fname.' '. $user->lname }}</a>
            @endforeach
        </div>
        <div class="row" style="margin-top: 10px;">
          <div class="col-md-6">
            <p>Total users: {{ $user::count()}}</p>
          </div>
          <div class="col-md-6">
         
        {{ $users->links('vendor.pagination.bootstrap-4') }}

    </div>
      </div>
      </div>
    </div>
@endsection