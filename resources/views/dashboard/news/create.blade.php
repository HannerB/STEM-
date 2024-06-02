@extends('dashboard', ['activePage' => 'news', 'titlePage' => 'Nueva Noticia'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('news.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Noticia</h4>
                                <p class="card-category">Ingresar datos</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="title" placeholder="Ingrese el Título" value="{{ old('title') }}" autofocus>
                                        @if ($errors->has('title'))
                                            <span class="error text-danger"
                                                for="input-title">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" name="description" placeholder="Ingrese la Descripción">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="error text-danger"
                                                for="input-description">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="content" class="col-sm-2 col-form-label">Contenido</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" name="content" placeholder="Ingrese el Contenido">{{ old('content') }}</textarea>
                                        @if ($errors->has('content'))
                                            <span class="error text-danger"
                                                for="input-content">{{ $errors->first('content') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="url" name="url" class="col-sm-2 col-form-label">Imagen</label>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-control" id="url" name="url" accept="image/*">
                                        @if ($errors->has('url'))
                                            <span class="error text-danger" for="input-url">{{ $errors->first('url') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="date_of_the_new_story" class="col-sm-2 col-form-label">Fecha de la noticia</label>
                                    <div class="col-sm-7">
                                        <input type="datetime-local" class="form-control" name="date_of_the_new_story"
                                            placeholder="Ingrese la Fecha de la Noticia" value="{{ old('date_of_the_new_story') }}">
                                        @if ($errors->has('date_of_the_new_story'))
                                            <span class="error text-danger"
                                                for="input-date_of_the_new_story">{{ $errors->first('date_of_the_new_story') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <a href="{{ route('news.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
