@extends('layout')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Sign Up</h1>

			{{ Form::open(['route' => 'register', 'method' => 'POST', 'role' => 'form']) }}
	
			<div class="form-group">
				{{ Form::label('full_name', 'Nombre Completo') }}
				{{ Form::text('full_name', null, ['class' => 'form-control']) }}
				{{ $errors->first('full_name', '<p class="alert alert-danger alert-dismissible">:message</p>') }}
			</div>

			<div class="form-group">
				{{ Form::label('email', 'E-mail') }}
				{{ Form::text('email', null, ['class' => 'form-control']) }}
				{{ $errors->first('email', '<p class="alert alert-danger alert-dismissible">:message</p>') }}
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
				{{ $errors->first('password', '<p class="alert alert-danger alert-dismissible">:message</p>') }}
			</div>

			<div class="form-group">
				{{ Form::label('password_confirmation', 'Repite tu password') }}
				{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
				{{ $errors->first('password_confirmation', '<p class="alert alert-danger alert-dismissible">:message</p>') }}
			</div>
			<p>
				<input type="submit" value="Register" class="btn btn-success">
			</p>

			{{ Form::close() }}
		
		</div>
	</div>
</div>