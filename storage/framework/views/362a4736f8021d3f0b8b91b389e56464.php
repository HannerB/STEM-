<figure class="main-banner type3">
    <div class="img">
        <img src="<?php echo e(asset($news->images->url)); ?>" class="img-responsive attachment-full size-full wp-post-image"
            alt="<?php echo e($news->slug); ?>"
            title="Cocineras de Barrio Abajo preparan su camino como empresarias del sector gastronómico"
            srcset="<?php echo e(asset($news->images->url)); ?> 2560w, <?php echo e(asset($news->images->url)); ?> 768w, <?php echo e(asset($news->images->url)); ?> 1920w, <?php echo e(asset($news->images->url)); ?> 1536w, <?php echo e(asset($news->images->url)); ?> 2048w"
            sizes="(max-width: 2560px) 100vw, 2560px" />
    </div><!-- end img -->
</figure><!-- end main-banner -->
<div class="main-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="article-section type2">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(route('home')); ?>" title="Home">Home</a></li>
                        <li class="separator separator-home"> > </li>
                        <li><a href="<?php echo e(route('home.news', ['page' => 1])); ?>">Noticias</a></li>
                    </ol>
                    <header class="head-box">
                        <div class="hidden-xs">
                            <ul class="socials-list">
                                <li>
                                    <a class="twitter"
                                        href="https://twitter.com/share?url=https://www.barranquilla.gov.co/mi-barranquilla/cocineras-de-barrio-abajo-preparan-su-camino-como-empresarias-del-sector-gastronomico&text=Alcaldía BAQ: &via=alcaldiabquilla"
                                        onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                        twitter
                                    </a>
                                </li>
                                <li>
                                    <a class="facebook"
                                        href="http://www.facebook.com/share.php?u=https://www.barranquilla.gov.co/mi-barranquilla/cocineras-de-barrio-abajo-preparan-su-camino-como-empresarias-del-sector-gastronomico"
                                        onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                        facebook
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <h2><?php echo e($news->title); ?></h2>
                        <p><?php echo e($news->description); ?></p>
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
                                <time><span class="month">&nbsp;<?php echo e(\Carbon\Carbon::parse($news->date_of_the_new_story)->translatedFormat('l, j \d\e
                                        F \d\e Y H:i')); ?></span>
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
                    <p><?php echo nl2br(e($news->content)); ?></p>
                    <p>&nbsp;</p>
                    <button id="listenButton1" class="responsivevoice-button" type="button" value="Play"
                        title="ResponsiveVoice Tap to Start/Stop Speech"><span>&#128266; Escucha</span></button>

                    <script>
                        var content = "<?php echo str_replace(["\r", "\n"], '', $news->content); ?>";
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
                <div class="gallery-layout show" style="position: relative; height: 1430.18px;">
                    <div class="item width1" style="position: absolute; left: 0px; top: 0px;">
                        <div class="cover loaded" data="<?php echo e(asset($news->images->url)); ?>" style="background-image: url(&quot;<?php echo e(asset($news->images->url)); ?>&quot;);">
                        </div>
                    </div>
                    <div class="item width1" style="position: absolute; left: 0px; top: 0px;">
                        <div class="cover loaded" data="<?php echo e(asset($news->images)); ?>" style="background-image: url(&quot;<?php echo e(asset($news->images)); ?>&quot;);">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end main-area -->
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/home/news/show.blade.php ENDPATH**/ ?>