<header>

    <nav class="navbar  navbar-default ">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="row">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand " href="#">LOGO</a> -->

                    <span style="color:#b1b7ba;font-size:30px;position: relative; left:0px; top:10px"><strong>KENDECLISE</strong></span>
                    <img src="{{ asset('images/logoblog.png') }}" alt="LOGO" height="40" width="40">
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">


                            <li id="nav-inicio"><a href="#">Inicio</a></li>
                            <li id="nav-usuarios"><a href="{{ route('users.index') }}">Usuarios</a></li>
                            <li id="nav-categorias"><a href="#">Categorías</a></li>
                            <li id="nav-imagenes"><a href="#">Imagenes</a></li>
                            <li id="nav-tags"><a href="#">Tags</a></li>



                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Cuenta</a></li>
                                <li><a href="#">Cambiar contraseña</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Cerrar sesión</a></li>
                            </ul>
                        </li>

                    </ul>


                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->

        </div>
    </nav>

</header>
