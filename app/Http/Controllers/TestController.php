<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //Controlador de prueba
    public function view($id){
       // dd($id);
        $article = Article::find($id);
        $article->category;
        $article->user;
        $article->tags;

        //dd($article);
        return view('test.index',['prueba'=>$article]);//envio mi variable article a la vista(cambia de nombre a prueba
    }
}
