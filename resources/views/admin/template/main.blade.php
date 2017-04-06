<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('titulo','por defecto') | Panel de administración</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <!-- Fonts awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Incluimos nuestro navBar que lo tenemos en otro archivo aparte usando la función de blade  include -->
    @include('admin.template.partials.nav')
    <section class="container">
        <!-- breadscrumb - miga de pan -->
        <ol class="breadcrumb">
            @yield('miga-de-pan')
        </ol>

        <!-- Llamando al mensaje laravelcasts/flash enviado, dentro de un div mensaje-flash, para llamarlo con js y eliminarlo en un tiempo  de 3segundos -->
        <div class="mensaje-flash">
            @include('flash::message')
        </div>
        <!-- Sección Antes del contenido -->
        @yield('antes-contenido')

        <div class="panel panel-default">

            @yield('titulo-contenido')

            <div class="panel-body">
                @yield('contenido')
            </div>
        </div>
    </section>

    @yield('antes-footer')

    <footer>
        <div class="container-fluid nav-footer">
            <div class="container text-center">
                <span class="footer-label">Copyright © Todos los derechos reservados a <a href="#"><em>Jorge Luis Bustamante Jara</em></a></span>
            </div>
        </div>
    </footer>

    <!-- llamado a los scripts js -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/scripts_personales.js')}}"></script>
    <script>$('#@yield('nav-activo')').addClass("active")</script>
</body>
</html>