<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.productos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = [
            0 => '',
            1 => 'Activo',
            2 => 'Inactivo'
        ];
        $municipios = Municipio::pluck('nombre', 'id');
        $checks = null;

        return view('admin.productos.create', compact('estado', 'municipios', 'checks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'valor' => 'required',
            'municipio_id' => 'required',
            'file' => 'image',
        ]);

        $producto = Producto::create($request->all());

        if($request->file('file')){
            $url = Storage::put('public/productos', $request->file('file'));

            $producto->image()->create([
                'url' => $url
            ]);
        }

        $producto->municipios()->sync($request->municipio_id);

        return redirect()->route('admin.productos.edit', $producto)->with('info', 'El registro se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $estado = [
            0 => '',
            1 => 'Activo',
            2 => 'Inactivo'
        ];
        $municipios = Municipio::pluck('nombre', 'id');
        $checks = $producto->municipios()->pluck('municipio_id');

        return view('admin.productos.edit', compact('producto','estado', 'municipios', 'checks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'valor' => 'required',
            'municipio_id' => 'required',
            'file' => 'image',
        ]);

        $producto->update($request->all());

        if($request->file('file')){
            $url = Storage::put('public/productos', $request->file('file'));

            if($producto->image){
                Storage::delete($producto->image->url);

                $producto->image->update([
                    'url' => $url
                ]);
            }
            else{
                $producto->image()->create([
                    'url' => $url
                ]);
            }
        }

        $producto->municipios()->sync($request->municipio_id);

        return redirect()->route('admin.productos.edit', $producto)->with('info', 'El registro se editó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('admin.productos.index')->with('info', 'El registro se eliminó correctamente');
    }
}
