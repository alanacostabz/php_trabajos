@extends('layouts.admin')

@section('content-admin')
   <h1 class="h2">Agregar Productos</h1>
   <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" class="btn btn-secondary botonBuscar btn-sm" href="/productos">
              <span data-feather="arrow-left"></span> Regresar</a>
    </div>
@endsection

@section('content-admin-2')

      {!! Form::open(['action' => 'ProductosController@store', 'method' => 'POST']) !!}
       <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            {{Form::label('nombre','Nombre')}}
            {{Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Escribir Nombre'])}}

          </div>
      </div>
      <div class="col-sm-6">
        {{Form::label('marca','Marca')}}

        @if (count($marca) > 0)
           <?php $marcas = array(); ?>
           @foreach ($marca as $m)
            <?php 
              $marcas[$m->id] = $m->nombre_marca;
            ?>     
           @endforeach
           <?php $marcas = array_unique($marcas); ?>
        @endif

        {{Form::select('marca',$marcas,null, ['class' => 'form-control'])}}
      </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-6">
           {{Form::label('categoria','Categoria')}}

           @if (count($categoria) > 0)
           <?php $cat= array(); ?>
           @foreach ($categoria as $c)
            <?php 
              $categorias[$c->id] = $c->nombre_categoria;
            ?>     
           @endforeach
           <?php $categorias = array_unique($categorias); ?>
           @endif

          {{Form::select('categoria',$categorias,null, ['class' => 'form-control'])}}
        </div>
        <div class="col-sm-6">
          {{Form::label('precio','Precio')}}
          {{Form::number('precio', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'Precio'])}}
        </div>
      </div>
      {!! Form::submit('Agregar producto', ['class' => 'btn btn-primary']) !!} 
      {!! Form::close() !!}   
      </div>
    

      <script src="{{ asset('js/app.js') }}" defer ><script>
@endsection