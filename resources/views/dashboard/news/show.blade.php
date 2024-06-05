@extends('dashboard', ['activePage' => 'news', 'titlePage' => 'Detalles de la noticia'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <div class="card-title">Noticias</div>
                            <p class="card-category">Vista detallada de la noticia "{{ $news->title }}"</p>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-lg-6 col-12">
                                    <div class="card card-profile mt-4">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12 mt-n5">
                                                <div class="p-3 pe-md-0">
                                                    <img src="{{ $news->url }}" alt="image" class="w-100 border-radius-md shadow-lg rounded img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12 my-auto">
                                                <div class="card-body ps-lg-0">
                                                    <h6 class="text-info">ID</h6>
                                                    <p>{{ $news->id }}</p>
                                                    <h6 class="text-info">Descripción</h6>
                                                    <p>{{ $news->description }}</p>
                                                    <h6 class="text-info">Fecha de la noticia</h6>
                                                    <p>{{ $news->date_of_the_new_story }}</p>
                                                    <h6 class="text-info">Fecha de Creación</h6>
                                                    <p>{{ $news->created_at }}</p>
                                                    <h6 class="text-info">Fecha de Actualización</h6>
                                                    <p>{{ $news->updated_at }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="card-footer ml-auto mr-auto">
                                    <a href="{{ route('news.index') }}" class="btn btn-sm btn-danger">Volver</a>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <a href="{{ route('news.edit', $news->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
