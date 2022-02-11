<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    public $table = "directores";
    protected $fillable=[
        'id',
        'nombre',
        'apellidos'
    ];

    public static function existeDirector($nombre, $apellidos){
        return self::where([
            ['nombre', $nombre],
            ['apellidos',$apellidos]])
            ->get(); // un get normal te devuel un array por eso utilizamoss ... para que nos devuelva directamente el objeto
    }


    public function peliculas(){
        return $this->hasMany(Movie::class, 'director');
    }
}
