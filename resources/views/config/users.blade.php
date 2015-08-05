

    @if($errors->count() > 0)
        @foreach($errors->all()  as $error)
           <li>{{$error}}</li>
        @endforeach
    @endif

{!! Form::open(['route'=>'postUser']) !!}
<label>nombre</label>
{!! Form::text('name')!!}
<label>email</label>
{!! Form::text('email')!!}
<label>password</label>
{!! Form::text('password')!!}

<label>perfil</label>
{!! Form::select('profiles_id',App\Entities\Profile::lists('profile','id'))!!}

{!! Form::submit('guardar')!!}
{!! Form::close()!!}

<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
            <th>Email</th>
            <th>Perfil</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

		@foreach(App\Entities\User::all() as $user)
            <tr>
			<td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
                <td>{{$user->Perfil}}</td>
                <td><a href="{{route('delUser',$user->id) }}" >borrar</a></td>
            </tr>
		@endforeach

	</tbody>
</table>