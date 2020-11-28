@extends('layouts.admin')

@section('content-admin')
   <h1 class="h2">Productos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mb-3">
            <a role="button" class="btn btn-primary botonBuscar btn-sm" href="/productos/create">
              <span data-feather="plus-circle"></span> Añadir Producto</a>
            </div>
          </div>
        </div>




        {{-- <form action="/products/{{$productos[0]->id}}" method="GET">
          <div class="input-group mb-3">
            <input type="text" class="form-control form-control-sm" name="buscar" placeholder="Buscar Producto">
            <div class="input-group-append">
              <button type="submit" class="btn btn-success btn-sm">Buscar</button>
            </div>
          </div>
        </form> --}}

        
      {{Form::open(['action' => ['ProductosController@show', 's'], 'method' => 'GET'])}}
        <div class="input-group mb-3">
          {{Form::text('buscar',$busqueda,['class' => 'form-control form-control-sm'])}}
          <div class="input-group-append">
            {{Form::submit('Buscar',['class' => 'btn btn-success btn-sm'])}}
          </div>
          {{Form::close()}}
        </div>




        <h2>Registros</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>

          @if (count($productos) > 0)
           @foreach ($productos as $producto)
                  <tr>
                    <td>{{$producto->producto}}</td>
                    <td>{{$producto->marca}}</td>
                    <td>{{$producto->categoria}}</td>
                    <td>{{$producto->precio}}</td>
                    <td style='color:#fff'; width=5%><a class='btn btn-sm btn-secondary' role='button' href='/productos/{{$producto->id}}/edit'>Editar</a></td>
                    {{-- <td style='color:#fff'; width=5%><a class='btn btn-sm btn-danger' role='button' href='/productos/destroy'>Borrar</a></td> --}}
                    <td>
                      {{Form::open(['action' => ['ProductosController@destroy', $producto->id], 'method' => 'POST'])}}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Eliminar',['class' => 'btn btn-sm btn-danger','onclick'=>"return confirm('¿Está seguro de eliminar este producto?')"])}}
                      {{Form::close()}}
                    </td>
                  </tr>
           @endforeach
            </tbody>
          </table>
           {{$productos->links()}}
          @else 
            <p>No se encontraron productos</p>
              </tbody>
            </table>
          @endif
        </div>    
        
        <script src="{{ asset('js/app.js') }}" defer ><script>
@endsection