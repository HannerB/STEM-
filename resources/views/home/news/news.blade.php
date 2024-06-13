@extends('app', ['activePage' => 'noticias', 'titlePage' => __('EMPRENDE')])

@section('body')
    @include('layouts.navbars.menu')
    <figure class="main-banner type4">
        <figcaption>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h1 class="heading cat">Emprende</h1>
                    </div>
                </div>
            </div>
        </figcaption>
    </figure><!-- end main-banner -->
    <div class="main-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="article-section type2">
                        <!-- cat loop -->
                        <div class="search-results">
                            <ul>
                                @foreach ($news->items() as $item)
                                <li>
                                    <figure class="img">
                                        <a class="" href="{{ route('home.show', ['slug' => Str::slug($item->slug)]) }}">
                                            <img src="{{ asset($item->images->url) }}" class="img-responsive attachment-medium size-medium wp-post-image" alt="{{ $item->slug }}" srcset="{{ asset($item->images->url) }} 768w, {{ asset($item->images->url) }} 1920w, {{ asset($item->images->url) }} 1536w, {{ asset($item->images->url) }} 2048w" sizes="(max-width: 768px) 100vw, 768px" />
                                        </a>
                                    </figure>
                                    <time datetime="{{ $item->date_of_the_new_story }}">
                                        {{ \Carbon\Carbon::parse($item->date_of_the_new_story)->translatedFormat('j, M Y') }}
                                    </time>
                                    <div class="right-block">
                                        <strong class="cat-name">Emprende</strong>
                                        <h3>
                                            <a href="{{ route('home.show', ['slug' => Str::slug($item->slug)]) }}">
                                                {{ $item->title }}
                                            </a>
                                        </h3>
                                        <p>{{ $item->description }}&#8230;</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>@if ($news->lastPage() > 1)
                        @php
                            $visiblePages = 10; // Define el número deseado de páginas visibles en el rango medio
                            $halfVisible = floor($visiblePages / 2); // Calcula la mitad del número de páginas visibles
                            $startPage = max(1, $news->currentPage() - $halfVisible); // Calcula la página inicial del rango medio
                            $endPage = min($news->lastPage(), $startPage + $visiblePages - 1); // Calcula la página final del rango medio
                            
                            // Ajusta el rango si el número total de páginas es menor que el número deseado
                            if ($news->lastPage() < $visiblePages) {
                                $startPage = 1;
                                $endPage = $news->lastPage();
                            } else {
                                // Si la página actual está cerca del principio, ajusta el inicio del rango
                                if ($news->currentPage() <= $halfVisible + 1) {
                                    $startPage = 1;
                                    $endPage = min($visiblePages, $news->lastPage());
                                }
                                // Si la página actual está cerca del final, ajusta el final del rango
                                elseif ($news->currentPage() >= $news->lastPage() - $halfVisible) {
                                    $startPage = max(1, $news->lastPage() - $visiblePages + 1);
                                    $endPage = $news->lastPage();
                                }
                            }
                            
                            $ellipsisStart = $startPage > 1;
                            $ellipsisEnd = $endPage < $news->lastPage();
                        @endphp
                    
                        <nav class="pagination-wrap">
                            <ul class="pagination">
                                {{-- Flecha hacia atrás --}}
                                @if ($news->currentPage() > 1)
                                    <li class="prev"><a href="{{ $news->previousPageUrl() }}"><span>&laquo;</span></a></li>
                                @endif
                                
                                {{-- Muestra las primeras páginas --}}
                                @if ($ellipsisStart)
                                    <li><a href="{{ route('home.paginate', ['page' => 1]) }}">1</a></li>
                                    @if ($startPage > 2)
                                        <li class="points">...</li>
                                    @endif
                                @endif
                                
                                {{-- Muestra las páginas dentro del rango --}}
                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="{{ $i == $news->currentPage() ? 'active' : '' }}"><a href="{{ route('home.paginate', ['page' => $i]) }}">{{ $i }}</a></li>
                                @endfor
                                
                                {{-- Muestra las últimas páginas --}}
                                @if ($ellipsisEnd)
                                    @if ($endPage < $news->lastPage() - 1)
                                        <li class="points">...</li>
                                    @endif
                                    <li><a href="{{ route('home.paginate', ['page' => $news->lastPage()]) }}">{{ $news->lastPage() }}</a></li>
                                @endif
                                
                                {{-- Flecha hacia adelante --}}
                                @if ($news->currentPage() < $news->lastPage())
                                    <li class="next"><a href="{{ $news->nextPageUrl() }}"><span>&raquo;</span></a></li>
                                @endif
                            </ul>
                        </nav> 
                    @endif                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                    </div><!-- end article-section -->
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end main-area -->
    @include('layouts.footer')
    <div class="menu-fader"></div>
    <a id="scroll-top-btn" href="#" title="Volver arriba">&#8593;</a>
@endsection