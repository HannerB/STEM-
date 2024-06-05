<div class="top hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <div class="menu-top-menu-container">
                    <ul id="menu-top-menu" class="top-links">
                        <li id="menu-item-105"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-105">
                            <a href="https://www.barranquilla.gov.co/transparencia/entidad">Entidad</a>
                        </li>
                        <li id="menu-item-284891"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-284891">
                            <a href="https://www.barranquilla.gov.co/transparencia">Transparencia</a>
                        </li>
                        <li id="menu-item-102"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-102">
                            <a href="https://www.barranquilla.gov.co/dependencias">Dependencias</a>
                        </li>
                        <li id="menu-item-23969"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23969">
                            <a href="https://www.barranquilla.gov.co/funcionarios">Funcionarios</a>
                        </li>
                        <li id="menu-item-173994"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-173994">
                            <a href="https://www.barranquilla.gov.co/politicas">Protección de Datos</a>
                        </li>
                        <li id="menu-item-283874"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-283874">
                            <a href="https://www.barranquilla.gov.co/transparencia/participa">Participa</a>
                        </li>
                        <?php if(auth()->guard()->guest()): ?>
                            <li id="menu-item-283874"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-283874">
                                <a href="<?php echo e(route('login')); ?>">Iniciar Sesión</a>
                            </li>
                        <?php endif; ?>

                        <?php if(auth()->guard()->check()): ?>
                            <li id="menu-item-283874"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-283874">

                                <a href="<?php echo e(route('Perfil')); ?>"">Perfil</a>
                            </li>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <li id="menu-item-283874"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-283874">
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                                    Sesión</a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
            <div id="nav-lang" class="col-sm-2">
                <!--<div class="languages-dropdown dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">idiomas</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Option 01</a></li>
                        <li><a href="#">Option 02</a></li>
                        <li><a href="#">Option 03</a></li>
                    </ul>
                </div>-->
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/layouts/navbars/menu_top.blade.php ENDPATH**/ ?>