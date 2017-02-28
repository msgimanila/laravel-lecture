{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('password', 'Password:') !!}
			{!! Form::text('password') !!}
		</li>
		<li>
			{!! Form::label('permissions', 'Permissions:') !!}
			{!! Form::textarea('permissions') !!}
		</li>
		<li>
			{!! Form::label('activated', 'Activated:') !!}
			{!! Form::text('activated') !!}
		</li>
		<li>
			{!! Form::label('activation_code', 'Activation_code:') !!}
			{!! Form::text('activation_code') !!}
		</li>
		<li>
			{!! Form::label('activated_at', 'Activated_at:') !!}
			{!! Form::text('activated_at') !!}
		</li>
		<li>
			{!! Form::label('last_login', 'Last_login:') !!}
			{!! Form::text('last_login') !!}
		</li>
		<li>
			{!! Form::label('persist_code', 'Persist_code:') !!}
			{!! Form::text('persist_code') !!}
		</li>
		<li>
			{!! Form::label('reset_password_code', 'Reset_password_code:') !!}
			{!! Form::text('reset_password_code') !!}
		</li>
		<li>
			{!! Form::label('first_name', 'First_name:') !!}
			{!! Form::text('first_name') !!}
		</li>
		<li>
			{!! Form::label('last_name', 'Last_name:') !!}
			{!! Form::text('last_name') !!}
		</li>
		<li>
			{!! Form::label('full_name', 'Full_name:') !!}
			{!! Form::text('full_name') !!}
		</li>
		<li>
			{!! Form::label('nick_name', 'Nick_name:') !!}
			{!! Form::text('nick_name') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}