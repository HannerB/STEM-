@extends('dashboard', ['activePage' => 'news', 'titlePage' => 'Noticias'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Noticias</h4>
                        <p class="card-category">Noticias registradas</p>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('news.create') }}" class="btn btn-sm btn-facebook">Añadir Noticia</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="text-info">
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Imagen</th>
                                    <th>Fecha de la noticia</th>
                                    <th>Estado</th>
                                    <th class="text-right">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($news as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                @if ($item->images)
                                                    <img src="{{ asset($item->images->url) }}" alt="{{ $item->slug }}" style="max-width: 100px;">
                                                @else
                                                    <span>No hay imagen principal</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->date_of_the_new_story }}</td>
                                            <td>
                                                <span class="badge {{ $item->state == 1 ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $item->state == 1 ? 'Activo' : 'Inactivo' }}
                                                </span>
                                            </td>
                                            <td class="td-actions text-right">
                                                <a href="{{ route('news.show', $item->id) }}" class="btn btn-info" title="Ver detalles"><i class="material-icons">person</i></a>
                                                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-warning" title="Editar"><i class="material-icons">edit</i></a>
                                                @if ($item->state == 1)
                                                    <form action="{{ route('news.deactivate', $item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de desactivar esta noticia?')" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" rel="tooltip" class="btn btn-danger" title="Desactivar">
                                                            <i class="material-icons">visibility_off</i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('news.activate', $item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de activar esta noticia?')" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" rel="tooltip" class="btn btn-success" title="Activar">
                                                            <i class="material-icons">visibility</i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-right">
                            <ul class="pagination">
                                {{-- Verifica si hay páginas disponibles --}}
                                @if ($news->hasPages())
                                    {{-- Enlace a la página anterior --}}
                                    @if (!$news->onFirstPage())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $news->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                        </li>
                                    @endif
                        
                                    {{-- Mostrar los números de página --}}
                                    @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                                        @if ($page == 1 || $page == $news->lastPage() || ($page >= max(1, $news->currentPage() - 1) && $page <= min($news->lastPage(), $news->currentPage() + 1)))
                                            <li class="page-item {{ $page == $news->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @elseif ($page == 2 && $news->currentPage() > 3)
                                            <li class="page-item disabled">
                                                <span class="page-link">&hellip;</span>
                                            </li>
                                        @elseif ($page == $news->lastPage() - 1 && $news->currentPage() < $news->lastPage() - 2)
                                            <li class="page-item disabled">
                                                <span class="page-link">&hellip;</span>
                                            </li>
                                        @endif
                                    @endforeach
                        
                                    {{-- Enlace a la página siguiente --}}
                                    @if ($news->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $news->nextPageUrl() }}">&raquo;</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </div>                                                                                                                                                                                                                                                                                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
