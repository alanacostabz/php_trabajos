@extends('layouts.admin')

@section('content-admin')
   <h1 class="h2">Editar Productos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mb-3">
            <a role="button" class="btn btn-secondary botonBuscar btn-sm" href="/productos">
              <span data-feather="arrow-left"></span> Regresar</a>
            </div>
          </div>
@endsection


@section('content-admin-2')
      {!! Form::open(['action' => ['ProductosController@update', $producto[0]->id], 'method' => 'POST']) !!}
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            {{Form::label('nombre','Nombre')}}
            {{Form::text('nombre', $producto[0]->producto, ['class' => 'form-control', 'placeholder' => 'Escribir Nombre'])}}
          </div>
      </div>
      <div class="col-sm-6">
        {{Form::label('marca','Marca')}}

        @if (count($marca) > 0)
           @foreach ($marca as $m)
            <?php 
              $marcas[$m->id] = $m->nombre_marca;
            ?>     
           @endforeach
        @endif

        {{Form::select('marca',$marcas,null, ['class' => 'form-control'])}}
      </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-6">
           {{Form::label('categoria','Categoria')}}

           @if (count($categoria) > 0)
           @foreach ($categoria as $c)
            <?php 
              $categorias[$c->id] = $c->nombre_categoria;
            ?>     
           @endforeach
           @endif

          {{Form::select('categoria',$categorias,null, ['class' => 'form-control', 'required'])}}
        </div>
        <div class="col-sm-6">
          {{Form::label('precio','Precio')}}
          {{Form::number('precio', $producto[0]->precio, ['class' => 'form-control', 'step' => '0.10', 'placeholder' => 'Precio'])}}
        </div>
      </div>
      {{Form::hidden('_method','PUT')}}
      {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary','onclick'=>"return confirm('¿Está seguro de sobreescribir los datos?')"]) !!} 
      {!! Form::close() !!}
    
      
    <script src="{{ asset('js/app.js') }}" defer ><script>
      
@endsection