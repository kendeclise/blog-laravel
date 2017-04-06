<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';//Lleva un atributo(variable con el nombre table) con el nombre de la tabla

    protected $fillable = ['name'];//Esta variable fillable, se pone todos los datos(atributos de la tabla) que deseamos mostrar

    public function articles()//Muchos
    {
        return $this->hasMany(Article::class);// O $this->hasMany('App\Article');
    }
}
