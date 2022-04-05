<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Municipio extends Model
{
    use HasFactory;

    //Declaración de foraneas
    public function productos(){
        return $this->belongsToMany(Producto::class);
    }
}
