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
                                            <img src="{{ asset($item->url) }}" class="img-responsive attachment-medium size-medium wp-post-image" alt="{{ $item->slug }}" srcset="{{ asset($item->url) }} 768w, {{ asset($item->url) }} 1920w, {{ asset($item->url) }} 1536w, {{ asset($item->url) }} 2048w" sizes="(max-width: 768px) 100vw, 768px" />
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
                        </div>
                        <nav class="pagination-wrap">
                            <ul class="pagination">
                                {{-- Previous Page Link --}}
                                <li class="page-item {{ $news->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $news->previousPageUrl() }}" aria-label="Previous">
                                        &laquo;
                                    </a>
                                </li>
                        
                                {{-- Pagination Elements --}}
                                @for ($i = 1; $i <= $news->lastPage(); $i++)
                                    <li class="page-item {{ $i == $news->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $news->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                        
                                {{-- Next Page Link --}}
                                <li class="page-item {{ $news->currentPage() == $news->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $news->nextPageUrl() }}" aria-label="Next">
                                        &raquo;
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end article-section -->
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end main-area -->
    @include('layouts.footer')
    <div class="menu-fader"></div>
    <a id="scroll-top-btn" href="#" title="Volver arriba">&#8593;</a>
@endsection