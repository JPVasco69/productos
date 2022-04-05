<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipio;
use App\Models\Image;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Declaración de foraneas uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    //Declaración de foraneas
    public function municipios(){
        return $this->belongsToMany(Municipio::class);
    }
}
