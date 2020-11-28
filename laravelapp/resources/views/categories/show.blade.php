@extends('layouts.admin')

@section('content-admin')
   <h1 class="h2">Categorias</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
                 <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-agregar">
            <span data-feather="plus-circle"></span> Añadir Categoría
          </button>
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

        
      {{Form::open(['action' => ['CategoriasController@show', 's'], 'method' => 'GET'])}}
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
                    <th>Categoría</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>

          @if (count($categorias) > 0)
           @foreach ($categorias as $categoria)
                  <tr>
                    <td>{{$categoria->nombre_categoria}}</td>
                    <td class="float-right">
                    <button type="button" class="btn btn-sm btn-secondary m-0" data-toggle="modal" data-target="#modal-editar{{$categoria->id}}">
                        Editar
                      </button>  
                              <!-- Modal -->
                    <div class="modal fade" id="modal-editar{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-editar" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Editar Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              {!! Form::open(['action' => ['CategoriasController@update',$categoria->id], 'method' => 'POST']) !!}
                                  <div class="form-group">
                                    {{Form::label('categoria','Editar Categoría')}}
                                    {{Form::text('categoria', $categoria->nombre_categoria, ['class' => 'form-control', 'placeholder' => 'Escribir categoría'])}}
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

                  
                    {{-- <td style='color:#fff'; width=5%><a class='btn btn-sm btn-danger' role='button' href='/categorias/destroy'>Borrar</a></td> --}}
                    <td class="float-right">
                      {{Form::open(['action' => ['CategoriasController@destroy', $categoria->id], 'method' => 'POST'])}}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Eliminar',['class' => 'btn btn-sm btn-danger','onclick'=>"return confirm('¿Está seguro de eliminar la categoría?')"])}}
                      {{Form::close()}}
                    </td>
                  </tr>
           @endforeach
            </tbody>
          </table>
          {{$categorias->links()}}
          @else 
            <p>No se encontraron categorias</p>
              </tbody>
            </table>
          @endif
        </div>    

   

<!-- Modal -->
<div class="modal fade" id="modal-agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          {!! Form::open(['action' => 'CategoriasController@store', 'method' => 'POST']) !!}
              <div class="form-group">
                {{Form::label('categoria','Nueva Categoría')}}
                {{Form::text('categoria', '', ['class' => 'form-control', 'placeholder' => 'Escribir categoría'])}}
              </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        {!! Form::submit('Agregar categoría', ['class' => 'btn btn-primary']) !!} 
        {!! Form::close() !!} 
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/app.js') }}" defer ><script>

        
@endsection

