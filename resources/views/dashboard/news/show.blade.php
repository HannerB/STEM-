@extends('dashboard', ['activePage' => 'news', 'titlePage' => 'Detalles de la noticia'])

@section('content')
<div class="content">
    <div class="row">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <span class="border border-info">

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
                                        <span class="border border-info">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-12 mt-n5">
                                                    <div class="p-3 pe-md-0">
                                                        <span class="border border-info">
                                                            <img src="{{ $news->url }}" alt="{{ $item->slug }}" class="w-100 border-radius-md shadow-lg rounded img-fluid ">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12 my-auto">
                                                   
                                                    <div class="card-body ps-lg-0">
                                                        <div class="p-1 mb-1 bg-info text-light">ID</div>
                                                        <p class="text-dark">{{ $news->id }}</p>
                                                        <div class="p-1 mb-1 bg-info text-light">Descripción</div>
                                                        <p class="text-dark">{{ $news->description }}</p>
                                                        <div class="p-1 mb-1 bg-info text-light">Fecha de la noticia</div>
                                                        <p class="text-dark ">{{ $news->date_of_the_new_story }}</p>
                                                        <div class="p-1 mb-1 bg-info text-light">Fecha de Creación</div>
                                                        <p class="text-dark">{{ $news->created_at }}</p>
                                                        <div class="p-1 mb-1 bg-info text-light">Fecha de Actualización</div>
                                                        <p class="text-dark">{{ $news->updated_at }}</p>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="card-footer ml-auto mr-auto">
                                    <a href="{{ route('news.index') }}" class="btn btn-sm btn-danger">Volver</a>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <a href="{{ route('news.edit', $news->id) }}"
                                        class="btn btn-sm btn-info">Editar</a>
                                </div>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection