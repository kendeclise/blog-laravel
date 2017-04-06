@extends('admin.template.main')
@section('titulo','Crear Usuario')
@section('miga-de-pan')
    <li><a href="#">Inicio</a></li>
    <li><a href="{{ route('users.index') }}">Usuarios</a></li>
    <li>Crear usuario</li>
@endsection
@section('titulo-contenido')
    <div class="panel-heading">
        <span class="labelCabeceraPanel"><strong>Registrar nuevo Usuario</strong></span><a href="{{ route('users.index') }}" class="btn btn-default pull-right">Lista de Usuarios</a>
    </div>
@endsection
@section('contenido')
    <!-- Formulario usando el paquete Collective/Html , recibe como parámetros la route, method y files =true o false-->
    <!-- El password no tiene un valor por defecto-->
    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('nameLabel','Nombre') !!} <div class="label label-success pull-right hidden" id="texto-usuario-ya-registrado" style="font-size:13px;">Esta persona ya está registrada</div>
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre completo','required', 'id'=> 'nombre-registrar-usuario']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('emailLabel','Email') !!} <div class="label label-primary pull-right hidden" id="texto-email-ya-registrado" style="font-size:13px;">El correo ingresado ya está registrado</div>
            {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'ejemplo@mimail.com','required','id'=>'email-registrar-usuario']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('passwordLabel','Password') !!} <div class="label label-warning pull-right hidden" id="texto-password-igual" style="font-size:13px;">Los password ingresados no coinciden</div>
            {!! Form::password('password',['class'=>'form-control','placeholder'=>'***************************','required','id'=>'password']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('passwordLabel','Re-Password') !!}
            {!! Form::password('password2',['class'=>'form-control','placeholder'=>'***************************','required','id'=>'re-password']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('typeLabel','Tipo de usuario') !!}
            {!! Form::select('type',[''=>'Seleccione un tipo','member'=>'Miembro','admin'=>'Administrador'],null,['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Registrar',['class'=>'btn btn-default','id'=>'botonRegistrar']) !!}
        </div>
    {!! Form::close() !!}

    <!-- formulario para hacer validaciones de existencia -->
    {!! Form::open(['route' => ['users.exists',':USER_NAME'], 'method' => 'GET' , 'id' => 'form-existe-usuario']) !!}
    {!! Form::close() !!}
    {!! Form::open(['route' => ['users.mail-exists',':USER_EMAIL'], 'method' => 'GET' , 'id' => 'form-existe-email']) !!}
    {!! Form::close() !!}
@endsection

@section('nav-activo','nav-usuarios')