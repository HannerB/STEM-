<?php $__env->startSection('body'); ?>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5KN7SX" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <div id="wrapper">
        <?php echo $__env->make('layouts.navbars.mega-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-area">
            <div class="container portada">
            </div>
            <div id="root" class="content-wrapper">
                <section id="XKk8ugHXYNSabaD0"
                    style="z-index:0;overflow:hidden;display:grid;margin-top:-1px;position:relative;align-items:center;">
                    <div id="S6VITf6aoPRcP7WU"
                        style="display:grid;min-height:100%;position:absolute;grid-area:1 / 1 / 2 / 4;min-width:100%;">
                        <div id="rxKyiXCUdn1HeUdH" style="z-index:0;">
                            <div id="jDjCHpLN6j536lsL"
                                style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                                <div id="b5UKojJFkftLN6cn" style="width:100%;opacity:1.0;height:100%;">
                                    <div id="cPKhkpL6h5PfEJG2"
                                        style="background-color:#ffffff;transform:scale(1, 1);overflow:hidden;width:100%;position:relative;opacity:1.0;height:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="LewKUzfmapJKZd1H" style="display:grid;position:relative;grid-area:1 / 2 / 2 / 3;">
                        <div id="gSu7YzbgzdPIbOS7" style="z-index:13;">
                            <div id="G4kYUOWh39OMe5sJ"
                                style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                                <div id="eCbDejasgblpxtJy"
                                    style="flex-direction:column;display:flex;width:100%;justify-content:center;opacity:1.0;height:100%;">
                                    <p id="FeOqiO1qOqdCxgO7"
                                        style="margin-left:0em;text-transform:none;color:#0a1a44;letter-spacing:0em;line-height:1.11em;direction:ltr;text-align:left;">
                                        <span id="FmeNvs6fS92u6Frv" style="color:#0a1a44;">Nuestros Actores</span><br></p>
                                </div>
                            </div>
                        </div>
                        <div id="U8tNqsdCOJv77G0f" style="z-index:14;">
                            <div id="JoJCYoyd28dMCHB1"
                                style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                                <div id="sUc9DcLPA975scqW"
                                    style="flex-direction:column;display:flex;width:100%;justify-content:center;opacity:1.0;height:100%;">
                                    <p id="eLrYyJKFtxSY9I7f"
                                        style="margin-left:0em;text-transform:none;color:#0a1a44;letter-spacing:0em;line-height:1.5em;direction:ltr;text-align:justify;">
                                        <span id="k89LwHKhXdzGl0Ke" style="color:#0a1a44;">Puedes buscar nuestros actores
                                            aquí:</span><br></p>
                                </div>
                            </div>
                        </div>
                        <div id="fxIFF8dv0DOdIwM9" style="z-index:5;">
                            <div id="uwYhqdhZT5f9ca0P" style="padding-top:15.54524362%;transform:rotate(0deg);">
                                <div id="zAino9VGshcss1Tt"
                                    style="top:0px;left:0px;width:100%;position:absolute;height:100%;">
                                    <div id="ZZHJkvNDdhvWNqQN" style="width:100%;opacity:1.0;height:100%;">
                                        <div id="Vjoupr0naNWKP8bl"
                                            style="transform:scale(1, 1);overflow:hidden;width:100%;position:relative;height:100%;">
                                            <div id="C31ShfrVKdAG8YlV"
                                                style="transform:rotate(0deg);top:0%;left:0%;width:100%;position:absolute;height:100%;opacity:1.0;">
                                                <!-- Aquí está la barra de búsqueda -->
                                                <form id="searchForm" method="GET" action="<?php echo e(route('search')); ?>"
                                                    style="width: 100%;">
                                                    <input type="text" name="query" id="searchInput"
                                                        placeholder="Buscar..."
                                                        style="width: 100%; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid #ccc;">
                                                    <button type="submit" style="display: none;">Buscar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



                <style>
                    /* Media query para ajustar el diseño en pantallas más grandes */
                    @media (min-width: 1200px) {
                        #XKk8ugHXYNSabaD0 {
                            grid-template-columns: auto 1200px auto;
                        }
                    }
                </style>


                <!-- Tarjetas de perfil de usuarios -->
                <div class="card-container">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                            <!-- Imagen de perfil del usuario -->
                            <img src="<?php echo e(asset($user->url)); ?>" alt="Imagen de perfil" class="profile-image">

                            <!-- Nombre del usuario -->
                            <div class="user-name"><?php echo e($user->name); ?></div>

                            <!-- Posición del usuario -->
                            <div class="user-position"><?php echo e($user->position); ?></div>

                            <!-- Nota del usuario -->
                            <div class="user-note">"<?php echo e($user->note); ?>"</div>

                            <!-- Enlace al perfil -->
                            <a href="<?php echo e(route('viewProfile', $user->id)); ?>" class="profile-link">Ver Perfil</a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>

            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <style>
        /* Estilos generales para la tarjeta */
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Alinear elementos de la tarjeta */
            align-items: center;
            width: 300px;
            /* Ancho fijo de la tarjeta */
            background-color: #fccf19;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            font-family: Arial, sans-serif;
            margin: 30px;
            /* Ajusta el margen para separar las tarjetas */
        }

        /* Estilos para el contenedor de las tarjetas */
        .card-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            /* Alinea las tarjetas en la parte superior */
            flex-wrap: wrap;
            /* Permitir que las tarjetas se envuelvan a la siguiente línea si no caben en la pantalla */
            margin-top: 20px;
            /* Añadir margen superior para separar las tarjetas del contenido superior */
        }

        /* Estilos para centrar la tarjeta de perfil */
        .content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 80vh;
        }

        /* Estilos para la imagen de perfil */
        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 15px auto;
            object-fit: cover;
        }

        /* Estilo para el nombre del usuario */
        .user-name {
            color: #060940;
            font-weight: 700;
            font-size: 1.2em;
            margin: 10px 0;
        }

        /* Estilo para la posición del usuario */
        .user-position {
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            margin: 5px 0;
            letter-spacing: 0.05em;
        }

        /* Estilo para la nota del usuario */
        .user-note {
            color: #060940;
            margin: 10px 0;
            line-height: 1.5em;
        }

        /* Estilo para el enlace al perfil */
        .profile-link {
            color: #ffffff;
            font-weight: 700;
            text-decoration: none;
            background-color: #060940;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', ['activePage' => 'inicio', 'titlePage' => __('EMPRENDE')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/entreprofes/cardsProfes.blade.php ENDPATH**/ ?>