<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Formas de mostrar todos los Usuarios, con el metodo estático All() o con orderBy(el cual recibe como parámetros primero el campo por el cual se ordenará, y el segundo parametro
        //la forma de ordenar ASC|DESC, ademas orderBy permite invocar a una funcion llamada paginate
        //Metodo Paginate tiene como parámetro el numero de objetos que se tendrá en cada pagina antes de generar otra
        $users = User::orderBy('id','DESC')->paginate(10);


        //with es un metodo que nos ayuda a enviar variables a nuestra vista(forma alternativa) ya que tambien podemos enviar como parametros de view ,["var1"=>'datosvar']
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Método tipo POST, revisar con route:list en cmd
        /**
         * Se puede enviar todo el request al Usuario( $request->all() ) o enviar uno por uno sus datos, $request['name'], $request['email'],etc
         */
        //Insertamos los campos capturados en el form a nuestra variable user
        $user = new User($request->all());
        //Necesitamos encriptar la contraseña antes de enviarla a la bd
        $user->password = bcrypt($request['password']);
        //Grabamos la variable en la BD
        $user->save();

        //Mensaje de  usando el paquete laracasts/flash(easy messages), el metodo adicional llamado important() nos añade la opción de cerrar X a nuestro mensaje
        Flash::success('Se ha registrado "'.$user->name.'" de forma exitosa.')->important();

        //Redirigiendo a la página
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Método tipoGET
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Buscamos al usuario y lo mandamos a la vista (formulario de edicion)
        $user = User::find($id); //Lo busco

        return view('admin.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Buscamos al usuario
        $user = User::find($id);

        //Editamos los datos con la información traida del formulario mediante el Request de tipo PUT
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;

        //Guardamos cambios
        $user->save();

        //Mostramos un mensaje flash
        Flash::warning('Se actualizó al usuario "'.$user->name.'" de forma exitosa.')->important();

        //Redireccionamos a la ruta lista de usuario
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //abort(500);//Forzando un error de servidor

        //Eliminando un usuario por $id
        $user = User::find($id); //Lo busco
        $user->delete(); //Lo elimino

        $respuesta =  'Se eliminó al usuario "'.$user->name.'" de forma exitosa.';


        //Preguntamos, si el request fue enviado mediante ajax, envia esta respuesta
        if($request->ajax()){
            //Armamos la respuesta en json (podemos enviar parámetros adicionales que podríamos necesitar)
            return response()->json([
                'id' => $user->id,
                'mensaje' => $respuesta
            ]);
        }

        //SI NO HAY PETICIÓN AJAX PASARÍA AQUI
        //preparamos el mensaje para enviar a la ruta (vista)
        Flash::error($respuesta)->important();

        //redirigimos la ruta
        return redirect()->route('users.index');
    }


    //Método de consulta, si encuentro al usuario devuelvo true, de otra manera devolveré false
    public function existeUsuario(Request $request,$name){


        $user = User::where('name',$name)->first(); //Lo busco por elnombre y lo asigno a user(uso first, porque si uso get siempre me da un valor aunque sea vacio, en cambio first me da null si no encuentra).


       if($request->ajax()){
            if($user){
                return "El nombre ingresado ya está registrado";
            }else{
                return null;
            }
        }

       return dd($user);


    }
}
