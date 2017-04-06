@extends('admin.template.main')
@section('titulo','Editar Usuario')
@section('nav-activo','nav-usuarios')
@section('miga-de-pan')
    <li><a href="#">Inicio</a></li>
    <li><a href="{{ route('users.index') }}">Usuarios</a></li>
    <li>Editar usuario</li>
@endsection


@section('titulo-contenido')
    <div class="panel-heading">
        <span class="labelCabeceraPanel"><strong>Editar Usuario - {{ $user->name }}</strong></span><a href="{{ route('users.index') }}" class="btn btn-default pull-right">Lista de Usuarios</a>
    </div>
    @endsection
    @section('contenido')
            <!-- Formulario usando el paquete Collective/Html , recibe como parámetros la route, method y files =true o false-->
    <!-- El password no tiene un valor por defecto-->
    {!! Form::open(['route'=>['users.update',$user],'method' => 'PUT']) !!}<!-- enviamos los parametros requeridos -->
    <div class="form-group">
        {!! Form::label('nameLabel','Nombre') !!}
        {!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nombre completo','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('emailLabel','Email') !!}
        {!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'ejemplo@mimail.com','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('typeLabel','Tipo de usuario') !!}
        {!! Form::select('type',[''=>'Seleccione un tipo','member'=>'Miembro','admin'=>'Administrador'],$user->type,['class'=>'form-control','required']) !!}<!-- el tercer parametro es para definir si algun campo esta seleccionado -->
    </div>



    <div class="form-group">
        {!! Form::submit('Editar',['class'=>'btn btn-default','id'=>'botonEditar']) !!}
    </div>
    {!! Form::close() !!}

@endsection

