<figure class="main-banner type2">
    <div class="img">
        <img src="{{ asset('img/emprende-futuro.jpg') }}" class="img-responsive attachment-full size-full wp-post-image" alt loading="lazy" srcset="{{ asset('img/emprende-futuro.jpg') }} 1280w, {{ asset('img/emprende-futuro-768x327.jpg') }} 768w" sizes="(max-width: 1280px) 100vw, 1280px" />
    </div>
    <figcaption>
        <div class="container">

            <h1>Tu futuro está en Barranquilla</h1>

            <ul class="tags-list">
                <li>
                    <a href="">
                        Quienes Somos
                    </a>
                </li>
                <li>
                    <a href="">
                        Herramientas Tic
                    </a>
                </li>
                <li>
                    <a href="">
                        Experiencias Stem
                    </a>
                </li>
                <li>
                    @if (Auth::check())
                        <a href="{{ route('CardsProfes') }}">
                            EntreProfes
                        </a>
                    @else
                        <a href="{{ route('loginProfes') }}">
                            EntreProfes
                        </a>
                    @endif
                </li>
                <li>
                    <a href="">
                        Challenges
                    </a>
                </li>
            </ul>
        </div>
    </figcaption>
</figure>
