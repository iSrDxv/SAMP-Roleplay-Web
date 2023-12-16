@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mis noticias</div>
<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Título</th>
                          <th>Categoría</th>
                          <th>Imagen</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($noticias as $noticia) { ?>
                            <tr>
<td><a href="{{ route('noticias.show', $noticia->id) }}"><?php echo $noticia->id; ?></a></td>
                              <td><?php echo $noticia->titulo; ?></td>
                              <td><?php echo $noticia->categoriadescripcion; ?></td>
                              <td><img src="{{url('/imagenes/'.$noticia->imagen)}}" style="width:200px; heigth:200px;"></td>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
</div>
            </div>
        </div>
    </div>
</div>
@endsection