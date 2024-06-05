<figure class="main-banner type3">
    <div class="img">
        <img src="{{ $news->url }}" class="img-responsive attachment-full size-full wp-post-image" alt="{{ $news->slug }}" title="Cocineras de Barrio Abajo preparan su camino como empresarias del sector gastronómico" srcset="{{ $news->url }} 2560w, {{ $news->url }} 768w, {{ $news->url }} 1920w, {{ $news->url }} 1536w, {{ $news->url }} 2048w" sizes="(max-width: 2560px) 100vw, 2560px" />
    </div><!-- end img -->
</figure><!-- end main-banner -->
<div class="main-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="article-section type2">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}" title="Home">Home</a></li>
                        <li class="separator separator-home"> > </li>
                        <li><a href="{{ route('home.news') }}">Noticias</a></li>
                    </ol>
                    <header class="head-box">
                        <div class="hidden-xs">
                            <ul class="socials-list">
                                <li>
                                    <a class="twitter" href="https://twitter.com/share?url=https://www.barranquilla.gov.co/mi-barranquilla/cocineras-de-barrio-abajo-preparan-su-camino-como-empresarias-del-sector-gastronomico&text=Alcaldía BAQ: &via=alcaldiabquilla" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                        twitter
                                    </a>
                                </li>
                                <li>
                                    <a class="facebook" href="http://www.facebook.com/share.php?u=https://www.barranquilla.gov.co/mi-barranquilla/cocineras-de-barrio-abajo-preparan-su-camino-como-empresarias-del-sector-gastronomico" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                        facebook
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <h2>{{ $news->title }}</h2>
                        <p>{{ $news->description }}</p>
                        <div class="visible-xs">
                            <ul class="socials-list">
                                <li><a class="twitter"
                                        href="https://twitter.com/share?url=https://www.barranquilla.gov.co/mi-barranquilla/cocineras-de-barrio-abajo-preparan-su-camino-como-empresarias-del-sector-gastronomico&text=Alcaldía BAQ: &via=alcaldiabquilla"
                                        onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">twitter</a>
                                </li>
                                <li><a class="facebook"
                                        href="http://www.facebook.com/share.php?u=https://www.barranquilla.gov.co/mi-barranquilla/cocineras-de-barrio-abajo-preparan-su-camino-como-empresarias-del-sector-gastronomico"
                                        onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">facebook</a>
                                </li>
                            </ul>
                        </div>

                    </header>

                    <div class="date-bar">
                        <div class="row">
                            <div class="col-sm-8">
                                <time><span class="month">&nbsp;{{ \Carbon\Carbon::parse($news->date_of_the_new_story)->translatedFormat('l, j \d\e F \d\e Y H:i') }}</span>
                            </div>

                            <div class="col-sm-4 hidden-xs">
                                <ul>
                                    <li><a href="#" class="print-btn">print</a></li>
                                    <li><a class="tool-increase" href="#">A<sup>+</sup></a></li>
                                    <li><a class="tool-decrease" href="#">A<sup>-</sup></a></li>
                                    <!-- <li><a class="tool-reset" href="#">A</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <p>{!! nl2br(e($news->content)) !!}</p>
                    <p>&nbsp;</p>
                    <button id="listenButton1" class="responsivevoice-button" type="button" value="Play"
                        title="ResponsiveVoice Tap to Start/Stop Speech"><span>&#128266; Escucha</span></button>
                        
                        <script>
                            var content = "{!! str_replace(["\r", "\n"], '', $news->content) !!}";
                            listenButton1.onclick = function() {
                                if (responsiveVoice.isPlaying()) {
                                    responsiveVoice.cancel();
                                } else {
                                    responsiveVoice.speak(
                                        content,
                                        "Spanish Latin American Female"
                                    );
                                }
                            };
                        </script>
                </div><!-- end article-section -->
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end main-area -->
