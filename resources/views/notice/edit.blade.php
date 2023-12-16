@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar noticia</div>
<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<form action="{{ route('noticias.update',['id' => $noticia->id])}}" method="post" enctype="multipart/form-data">
                       <input type="hidden" name="_method" value="PUT">
                      @csrf
                      <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $noticia->titulo }}" required>
                      </div>
                      <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea  class="form-control" id="descripcion" name="descripcion" rows="4" cols="80" required>{{ $noticia->descripcion }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select class="form-control" id="categoria" name="categoria" required>
                          <option value="">Seleccionar</option>
                            <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?php echo $categoria->id; ?>" <?php if($categoria->id==$noticia->categorias_id){ echo "selected";} ?>><?php echo $categoria->descripcion; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="estatus">Estatus</label>
                        <select class="form-control" id="estatus" name="estatus" required>
                          <option value="">Seleccionar</option>
                          <option value="1" <?php if($noticia->estatus==1){ echo "selected";} ?>>Activo</option>
                          <option value="0" <?php if($noticia->estatus==0){ echo "selected";} ?>>Inactivo</option>
                        </select>
                      </div>
<div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                      </div>
<div class="form-group">
                        <label for="estatus"><b>Imagen</b></label>
                        <br>
                        <img src="{{url('/imagenes/'.$noticia->imagen)}}" style="width:200px; heigth:200px;">
                      </div>
<button type="submit" class="btn btn-primary">Aceptar</button>
</form>
<hr>
                    <form action="{{ route('noticias.destroy',['id' => $noticia->id]) }}" method="post">
                      <input name="_method" type="hidden" value="DELETE">
                      @csrf
                      <input type="submit" class="btn btn-danger" name="Eliminar" value="Eliminar">
                    </form>
</div>
            </div>
        </div>
    </div>
</div>
@endsection