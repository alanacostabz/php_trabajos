@extends('layouts.admin')

@section('content-admin')
   <h1 class="h2">Marcas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
                 <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-agregar">
            <span data-feather="plus-circle"></span> Añadir Marca
          </button>
          </div>
      </div>



            {{-- <form action="guardar_genero.php" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-sm" name="campo_genero" placeholder="Agregar Categoría">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary botonBuscar btn-sm" name="agregar">Agregar</button>
              </div>
            </div>
          </form> --}}

          {{Form::open(['action' => ['MarcasController@show', 's'], 'method' => 'GET'])}}
        <div class="input-group mb-3">
          {{Form::text('buscar',null,['class' => 'form-control form-control-sm'])}}
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
                    <th>Marca</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>

          @if (count($marcas) > 0)
           @foreach ($marcas as $marca)
                  <tr>
                    <td>{{$marca->nombre_marca}}</td>
                    <td class="float-right">
                    <button type="button" class="btn btn-sm btn-secondary m-0" data-toggle="modal" data-target="#modal-editar{{$marca->id}}">
                        Editar
                      </button>  
                              <!-- Modal -->
                    <div class="modal fade" id="modal-editar{{$marca->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-editar" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Editar Marca</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              {!! Form::open(['action' => ['MarcasController@update',$marca->id], 'method' => 'POST']) !!}
                                  <div class="form-group">
                                    {{Form::label('marca','Edidar Marca')}}
                                    {{Form::text('marca', $marca->nombre_marca, ['class' => 'form-control', 'placeholder' => 'Escribir Marca'])}}
                                  </div>  
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            {{Form::hidden('_method','PUT')}}
                            {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary','onclick'=>"return confirm('¿Está seguro de sobreescribir los datos?')"]) !!} 
                            {!! Form::close() !!} 
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                    
                    <td class="float-right">
                      {{Form::open(['action' => ['MarcasController@destroy', $marca->id], 'method' => 'POST'])}}
                       {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Eliminar',['class' => 'btn btn-sm btn-danger','onclick'=>"return confirm('¿Está seguro de eliminar esta marca?')"])}}
                      {{Form::close()}}
                    </td>
                  </tr>
           @endforeach
            </tbody>
          </table>
           {{$marcas->links()}}
          @else 
            <p>No se encontraron marcas</p>
              </tbody>
            </table>
          @endif
        </div> 
        
        <!-- Modal -->
<div class="modal fade" id="modal-agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          {!! Form::open(['action' => 'MarcasController@store', 'method' => 'POST']) !!}
              <div class="form-group">
                {{Form::label('marca','Nueva Marca')}}
                {{Form::text('marca', '', ['class' => 'form-control', 'placeholder' => 'Escribir marca'])}}
              </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        {!! Form::submit('Agregar marca', ['class' => 'btn btn-primary']) !!} 
        {!! Form::close() !!} 
      </div>
    </div>
  </div>
</div>







<script src="{{ asset('js/app.js') }}" defer ><script>
<script>

    
  $(function () {

      $('modal-agregar').toggle();

    });


</script>
@endsection