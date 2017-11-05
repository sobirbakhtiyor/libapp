@extends('layouts.admin')


@section('content')

	@if(Session::has('deleted_user'))

		<p>{{session('deleted_user')}}</p>
		
	@endif

<h1>Users</h1>

<table class="table">
    <thead>
	    <tr>
	        <th>Id</th>
	        <th>Photo</th>
	        <th>Name</th>
	        <th>Email</th>
	        <th>Role</th>
	        <th>Status</th>
	        <th>Created</th>
	        <th>Updated</th>
	    </tr>
	</thead>
	<tbody>

	@if($users)

		@foreach($users as $user)

		    <tr>
		        <td>{{$user->id}}</td>
		        <td><img height="50" width="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
		        <td>{{$user->name}}</td>
		        <td>{{$user->email}}</td>
		        <td>{{$user->role['name']}}</td>
		        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
		        <td>{{$user->created_at->diffForHumans()}}</td>
		        <td>{{$user->updated_at->diffForHumans()}}</td>
		        <td><a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-secondary btn-sm">Edit user</button></a></td>
		        <td class="delete">
					   {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
					<div>
						{!! Form::submit('Delete user', ['class'=>'btn btn-secondary btn-sm btn-danger ']) !!}
					</div>
				{!! Form::close() !!}</td>
		    </tr>

	    @endforeach

	@endif
	</tbody>
</table>


@endsection