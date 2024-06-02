@extends('dashboard', ['activePage' => 'news', 'titlePage' => 'Editar Noticia'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('news.update', $news->id) }}" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Noticia</h4>
                                <p class="card-category">Editar datos</p>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Título</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title', $news->title) }}" autofocus>
                                        @if ($errors->has('title'))
                                            <span class="error text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-7">
                                        <textarea type="text" class="form-control" name="description">{{ old('description', $news->description) }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="error text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="content" class="col-sm-2 col-form-label">Contenido</label>
                                    <div class="col-sm-7">
                                        <textarea type="text" class="form-control" name="content">{{ old('content', $news->content) }}</textarea>
                                        @if ($errors->has('content'))
                                            <span class="error text-danger"
                                                for="input-content">{{ $errors->first('content') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="url" class="col-sm-2 col-form-label">Imagen</label>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-group" id="url" name="url"
                                            accept="image/*">
                                        @if ($errors->has('url'))
                                            <span class="error text-danger">{{ $errors->first('url') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date_of_the_new_story" class="col-sm-2 col-form-label">Fecha de la
                                        noticia</label>
                                    <div class="col-sm-7">
                                        <input type="datetime-local" class="form-control" name="date_of_the_new_story"
                                            value="{{ old('date_of_the_new_story', $news->date_of_the_new_story) }}">
                                        @if ($errors->has('date_of_the_new_story'))
                                            <span
                                                class="error text-danger">{{ $errors->first('date_of_the_new_story') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-info">Actualizar</button>
                                <a href="{{ route('news.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
