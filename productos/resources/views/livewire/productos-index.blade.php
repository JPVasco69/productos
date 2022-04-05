<div>
    
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">

        <div class="card-header">
            <a href="{{route('admin.productos.create')}}" class="btn btn-secondary">Crear</a>

            <br/><br/>

            <input wire:model="search" class="form-control" placeholder="Buscar">
        </div>

        @if($productos->count())

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripción</th>
                            <th>Valor</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$producto->nombre}}</td>
                                <td>{{"$".number_format($producto->valor)}}</td>
                                <td width="10px"><a class="btn btn-sm btn-primary" href="{{route('admin.productos.edit', $producto)}}">Editar</a></td>
                                <td width="10px">
                                    <form action="{{route('admin.productos.destroy', $producto)}}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>

                            <?php $i ++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$productos->links()}}
            </div>  
        @else
            
            <div class="card-body">
                <center><strong>No hay registros disponibles.</strong></center>
            </div>

        @endif
    </div>

</div>