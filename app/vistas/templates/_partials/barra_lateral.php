<!-- barra lateral -->

<aside class="sidebar-container " id="sidebar">
    <article class="menu">
        <div class="text-center" id="info_user">
            <a href="<?php echo RUTA_APP ?>/dashboard" class="sidebar-link">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0" alt="avatar image" height="100">
                <p> <small> Luis Andrés Bolaños Yapo</small> </p>
            </a>
        </div>
        <ul class="sidebar-item">
            <!-- inicio -->
            <li class="sidebar-item-list">
                <a href="<?php echo RUTA_APP ?>/dashboard" class="sidebar-link">
                    <i class="fas fa-home sidebar-icon"></i>Inicio
                </a>
            </li>
            <!-- gastos -->
            <li class="sidebar-item-list accordion md-accordion" role="tab" id="">
                <a class="sidebar-link" data-toggle="collapse" data-parent="#accordionGastos" href="#gastos" aria-expanded="false" aria-controls="gastos">
                    <i class="fas fa-hand-holding-usd sidebar-icon collapsed"></i>Gastos <i class="fas fa-angle-down float-right rotate-icon"></i>
                </a>
                <!--Accordion gastos-->
                <div class="accordion md-accordion" id="accordionGastos" role="tablist" aria-multiselectable="true">
                    <div id="gastos" class="collapse" role="tabpanel" aria-labelledby="headingTwo1" data-parent="#accordionGastos">
                        <ul>
                            <li>
                                <a href="<?php echo RUTA_APP ?>/gastos" class="sidebar-link">Lista de Gastos</a>
                            </li>
                            <li>
                                <a href="<?php echo RUTA_APP ?>/informes" class="sidebar-link ">Informes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <!-- calendario -->
            <li class="sidebar-item-list">
                <a href="<?php echo RUTA_APP ?>/calendario" class="sidebar-link">
                    <i class="far fa-calendar-alt sidebar-icon"></i>Calendario
                </a>
            </li>
            <!-- perfil -->
            <li class="sidebar-item-list">
                <a href="<?php echo RUTA_APP ?>/perfil" class="sidebar-link">
                    <i class="fas fa-user sidebar-icon"></i>Perfil
                </a>
            </li>

            <!-- salir -->
            <li class="sidebar-item-list exit-sidebar mx-2">
                <a href="" class="sidebar-link ">
                    <i class="fas fa-sign-out-alt sidebar-icon"></i>Salir
                </a>
            </li>
        </ul>
    </article>
</aside>