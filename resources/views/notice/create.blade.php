@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear noticia</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('noticias.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                      </div>
                      <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea  class="form-control" id="descripcion" name="descripcion" rows="4" cols="80" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select class="form-control" id="categoria" name="categoria" required>
                          <option value="">Seleccionar</option>
                            <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->descripcion; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="estatus">Estatus</label>
                        <select class="form-control" id="estatus" name="estatus" required>
                          <option value="">Seleccionar</option>
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                      </div>
                      <button type="submit" class="btn btn-primary">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection