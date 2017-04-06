@extends('admin.template.main')
@section('titulo','Lista de usuarios')
@section('nav-activo','nav-usuarios')
@section('miga-de-pan')
    <li><a href="#">Inicio</a></li>
    <li>Usuarios</li>
@endsection

<!-- Sección de alertas (para el eliminar) antes del contenido -->
@section('antes-contenido')

    <div class="alert alert-danger alert-dismissible mensaje-eliminar hidden" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span></span>
    </div>

@endsection

@section('titulo-contenido')
    <div class="panel-heading">
        <span class="labelCabeceraPanel"><strong>Lista de Usuarios</strong></span><a href="{{ route('users.create') }}" class="btn btn-default pull-right">Nuevo Usuario</a>
    </div>
@endsection

@section('contenido')
    <table class="table table-striped table-bordered text-center">
        <!-- Cabecera de la tabla -->
        <thead>
            <th class="text-center">ID</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Correo</th>
            <th class="text-center">Tipo</th>
            <th class="text-center">Acción</th><!-- botones que quiero que hallan en mi tabla (Editar, eliminar)-->
        </thead>
        <!-- Cuerpo de la tabla(datos) -->
        <tbody>
            @foreach($users as $user)
                <!-- fila -->
                <tr data-id="{{ $user->id }}" data-nombre = "{{ $user->name }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->type == "admin")
                            <span class="label label-danger">Admin</span>
                        @else
                            <span class="label label-primary">Miembro</span>
                        @endif

                    </td>
                    <td>
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning"><i class="fa fa-wrench" aria-hidden="true"></i></a><!--podemos observar que route también nos deja mandar parámetros)-->
                        <a href="" class="btn btn-danger eliminar-usuario"><i class="fa fa-times" aria-hidden="true"></i></a><!-- para bloquear un href usamos href = "#! o href = "javascript: void(0)" -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Creamos un formulario oculto para poder hacer los deletes, al cual le asignaremos un id e invocará al método destroy enviando como id un placeholder(:placeholder), que reemplazaremos en nuestro script de js -->
   @section('antes-footer')
       {!! Form::open( ['route' => ['users.destroy',':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete'] ) !!}
       {!! Form::close() !!}
   @endsection

    <!-- Renderizando la paginacion(usando el método render $users->render()) -->
    <!-- invocando nuestra propia paginación, primer parámetro la ruta, segundo le enviamos nuestra variable con la función pagination-->
    @include('admin.template.partials.paginacionTemplate',['paginator'=>$users])

@endsection


