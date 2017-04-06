<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('article',function(){
   echo 'Esta es la seccion de articulos';
});
*/
/*
Route::get('articles/{nombre?}', function($nombre="sin nombre"){
   echo "El nombre que has colocado es: $nombre";
});*/


//
/*
Route::get('articles',[
    'as' => 'articles', //a�ade un nombre a una ruta
    'uses'=> 'UserController'//Sirve para llamar un controlador
]);*/

//Grupo de rutas

/*
Route::group(['prefix' => 'articles'], function(){//Grupo con ombre "articles"
    //Dentro de este podemos agregar rutas, y para acceder a esta vamos a tener que
    //anteponer la palabra /articles/+nuevas_rutas
   /* Route::get('view/{article?}', function($article = "Vacio"){
        echo $article;
    });*/
/*
    Route::get('views/{id}',[
        'uses' => 'TestController@view',//El @ se usa para llamar un m�todo de este controlador que se va ejecutar al ser llamado.
        'as' => 'articlesView'//nombre de la ruta
    ]);

});
*/

Route::group(['prefix'=>'admin'],function(){
    Route::resource('users','UsersController');//Primer par�metro es la direccion (...)/admin/users/, el segundo par�metro es a que controlador va llamar

    Route::delete('users/{id}/destroy',[
        'as' => 'users.destroy',//nombre de la ruta(opcional)
       'uses' => 'UsersController@destroy' //que controlador llamará luego va el arroba y sigue el nombre de la función/método que invocará
    ]);

    Route::get('users/exists/{name}',[
        'as' => 'users.exists',//nombre de la ruta(opcional)
        'uses' => 'UsersController@existeUsuario' //que controlador llamará luego va el arroba y sigue el nombre de la función/método que invocará
    ]);

    Route::get('users/mail-exists/{mail}',[
        'as' => 'users.mail-exists',
        'uses' => 'UsersController@existeCorreo'
    ]);
});
