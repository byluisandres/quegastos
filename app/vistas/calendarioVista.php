<?php include_once "templates/_partials/header.php" ?>
<?php include_once "templates/_partials/barra_lateral.php" ?>
<main class="w-100">
    <?php include_once "templates/_partials/nav.php" ?>
    <!-- contenido -->
    <section id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card ml-3 mb-5 " style="width: 98%;">
                    <div class="card-body ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h2>Administra tu calendario</h2>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-teal btn-lg" data-toggle="modal" data-target="#addEvento">
                                    <i class="fas fa-calendar-plus mr-2"></i>Añadir Eventos
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 " id="calendarioFull">
                    <div class="card p-2">
                        <!-- fullcalendar -->
                        <div id='calendar' class="cardCalendar"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php include_once "templates/_partials/footer.php" ?>
</main>
<!-- modal para añadir el evento -->
<?php include_once "templates/calendario/modal_add_eventos.php" ?>