<section class="news-section">

    <header class="heading-area">
        <div class="row">
            <div class="col-sm-8">
                <h2>
                    <p>
                        <strong>Noticias.</strong>
                        Entérate de lo más reciente
                    </p>
                </h2>
            </div>
            <div class="col-sm-3">
                <a href="{{ route('home.news', ['page' => 1]) }}" class="link-more">
                    Noticias
                </a>
            </div>
        </div>
    </header>

    <div class="news-area">
        <div class="row">
            <div class="col-lg-8">
                <!--news-block-->
                <div class="news-block hidden-xs">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="items-list">
        <!-- 5/7 NEWS - FIRST COL ONE NEW -->
        @foreach ($news->items() as $item)
        <li>
            <figure class="info-item">
                <div class="img">
                    <a href="{{ route('home.show', ['slug' => Str::slug($item->slug)]) }}">
                        <img src="{{ asset($item->images->url) }}"  class="img-responsive attachment-medium size-medium wp-post-image" alt="{{ $item->slug }}" loading="lazy" srcset="{{ asset($item->images->url) }} 768w, {{ asset($item->images->url) }} 1920w" sizes="(max-width: 768px) 100vw, 768px" />                      
                    </a>
                </div>
                <figcaption>
                    <div class="block">
                        <h3>
                            <a href="{{ route('home.show', ['slug' => Str::slug($item->slug)]) }}">
                                {{ $item->title }} </a>
                        </h3>
                        <p>{{ $item->description }}</p>

                    </div>
                </figcaption>
            </figure>
        </li>
        @endforeach
    </ul>
</section>