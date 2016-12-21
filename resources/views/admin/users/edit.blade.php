@extends('layouts.admin')

@section('content')

<h1>Edit user</h1>



{!!Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true])!!}

	<div class="form-group">
		{!!Form::label('name', 'Name')!!}
		{!!Form::Text('name', null, ['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('email', 'Email')!!}
		{!!Form::email('email', null, ['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('role_id', 'Role')!!}
		{!!Form::select('role_id',$roles, null, ['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('status', 'Status')!!}
		{!!Form::select('is_active', array(1 =>'active', 0 =>'Inactive'), 0, ['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('password', 'Password')!!}
		{!!Form::password('password', ['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('photo_id', 'Photo')!!}
		{!!Form::file('photo_id', null, ['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
		{!!Form::submit('Create user', ['class'=>'btn btn-primary'])!!}
	</div>

{!!Form::close()!!}



@endsection