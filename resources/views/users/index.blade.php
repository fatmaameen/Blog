@extends('layouts.master')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2>All Admins
        <div class="float-end">
            <a class="btn btn-success" href="{{ route('users.create') }}">New Admin</a>
        </div>
            </h2>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success my-2">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered table-hover table-striped">
 <tr>
    <th>#ID</th>
   <th>Name</th>
   <th>PERMISSION</th>
   <th>CREATED_DATE</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{$loop->iteration }}</td>
    <td>{{ $user->name }}</td>

    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-secondary text-dark">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>{{ $user->created_at }}</td>
    <td>

       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

    </td>
  </tr>
 @endforeach
</table>
@endsection
