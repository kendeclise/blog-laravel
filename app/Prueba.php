<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    //Modelo de pruebas
    protected $table = 'pruebas';
    protected $fillable = ['nombre'];


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //Para obligar a la tabla a que no presente los campos obligatorios de created_at y updated_at
    public $timestamps = false;


}
