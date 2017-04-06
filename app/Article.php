<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{

    //Usamos el trait que trae el Sluggable
    use Sluggable;


    protected $table = 'articles';

    protected $fillable = ['title','content','category_id','user_id'];


    public function category()//de 1
    {
        return $this->belongsTo('App\Category');
    }

    public function user()//de 1
    {
        return $this->belongsTo('App\User');
    }

    public function images()//muchos (nosotros tendremos varias imagenes en nuestro blog
    {
        return $this->hasMany('App\Image');
    }

    public function tags()//Muchos
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }


    //Llamamos a la funcion que slugg

    public function sluggable()
    {
        return [
            'slug' => [//Slug es el campo de la tabla donde se almacená la cadena ya transformada
                'source' => 'title'//Campo de la tabla artículo que vamos a transformar
            ]
        ];
    }

}
