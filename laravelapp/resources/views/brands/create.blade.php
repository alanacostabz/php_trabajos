@extends('layouts.admin')

@section('content-admin')
   <h1 class="h2">Marcas</h1>

      <form action="guardar_genero.php" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-sm" name="campo_genero" placeholder="Agregar Género">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary botonBuscar btn-sm" name="agregar">Agregar</button>
              </div>
            </div>
          </form>
  

        

        <h2>Registros</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>Marca</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>

          @if (count($marcas) > 0)
           @foreach ($marcas as $marca)
                  <tr>
                    <td>{{$marca->nombre_marca}}</td>
                    <td style='color:#fff'; width=5%><a class='btn btn-sm btn-secondary' role='button' href='/brands/{{$marca->id}}'>Editar</a></td>
                    <td style='color:#fff'; width=5%><a class='btn btn-sm btn-danger' role='button' href=''>Borrar</a></td>
                  </tr>
           @endforeach
           {{$marcas->links()}}
            </tbody>
          </table>
          @else 
            <p>No se encontraron marcas</p>
              </tbody>
            </table>
          @endif
        </div>    
@endsection