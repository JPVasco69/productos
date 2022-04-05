<?php

namespace App\Observers;

use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class ProductoObserver
{
  
    /**
     * Handle the Producto "deleted" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function deleting(Producto $producto)
    {
        if($producto->image){
            Storage::delete($producto->image->url);
        }
    }

}
