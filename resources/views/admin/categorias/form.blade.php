@extends('admin.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

          <div class="card uper">
            <div class="card-header">
              Categorias
            </div>
            <div class="card-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div><br />
              @endif

              @if (session('success'))
                <div class="alert alert-success">
                  <ul>
                    <li>{{ session('success') }}</li>
                  </ul>
                </div><br />
              @endif

                  @if(isset($categoria))
                  <form action="{{ route('categoria.update',1) }}" method="POST" class="mb-3" id="formulario">
                    <input type="hidden" name="_method" value="PATCH"  accept-charset="UTF-8">
                  @else
                  <form action="{{ route('categoria.store') }}" method="POST" class="mb-3" id="formulario">
                  @endif
                    @csrf

                    <div class="form-group">
                      <label for="nombre">Nombre la categoria:</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required="required" value="{{old('categoria') ?? ($categoria->nombre ?? '')}}"/>
                    </div>

                </form>
                  @if(isset($categoria))
                    <button type="submit" form="formulario" class="btn btn-success" form="formulario">Actualizar</button>
                  @else
                    <button type="submit" class="btn btn-success" form="formulario">Registrar categoria</button>
                  @endif                  
                  <a href="{{ route('categoria.index') }}" class="btn btn-danger">Regresar</a>
                  @if(isset($categoria))
                    <form action="{{ route('categoria.destroy', $categoria->id)}}" method="post" class="mt-3">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> Borrar</button>
                    </form>
                  @endif
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection