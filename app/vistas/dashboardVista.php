<?php include_once "templates/_partials/header.php" ?>
<?php include_once "templates/_partials/barra_lateral.php" ?>
<main class="w-100">
    <?php include_once "templates/_partials/nav.php" ?>
    <!-- contenido -->
    <section id="content">
        <div class="container-fluid">
            <div class="row mb-3  d-none d-sm-block">
                <div class="col-lg-12">
                    <div class="card card-cascade narrower">
                        <div class="view view-cascade  gradient-card-header mdb-color darken-4">
                            <button type="button" class="btn btn-teal float-left" data-toggle="modal" data-target="#addGastos">
                                <i class="fas fa-plus"></i> Añadir gasto
                            </button>
                            <?php $anioAcutual = date('Y'); ?>
                            <select name="selectAnio" id="selectAnio" class="m-2 w-25 browser-default custom-select float-right">
                                <option selected disabled value="">--Selecciona un año--</option>
                                <?php for ($i = $anioAcutual; $i >= 2010; $i--) : ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?> </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center" id="textCharts"></h2>
                            <div class="view view-cascade p-3 " id="contenedorBarsCharts">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <!-- total de gastos -->
                <div class="col-md-4 mb-4">
                    <!-- Card -->
                    <div class="card gradient-card">
                        <div class="card-image">
                            <!-- Content -->
                            <div class="text-white d-flex h-100 mask blue-gradient-rgba">
                                <div class="first-content align-self-center p-2">
                                    <h3 class="card-title"><span id="totalGastos"></span>&euro;</h3>
                                    <p class="lead mb-0">Total</p>
                                </div>
                                <div class="second-content align-self-center mx-auto text-center">
                                    <i class="far fa-money-bill-alt fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- total de categorias -->
                <div class="col-md-4 mb-4 d-none d-sm-block">
                    <!-- Card -->
                    <div class="card gradient-card">
                        <div class="card-image">
                            <!-- Content -->
                            <div class="text-white d-flex h-100 mask purple-gradient-rgba">
                                <div class="first-content align-self-center p-2">
                                    <h3 class="card-title"><span id="totalGastoNombre"></span>&euro;</h3>
                                    <p class="lead mb-0" id="nombreGasto"> </p>
                                </div>
                                <div class="second-content  align-self-center mx-auto text-center">
                                    <i class="fas fa-chart-pie fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Card -->
                </div>
                <!-- número de eventos -->
                <div class="col-md-4 mb-4 d-none d-sm-block">
                    <!-- Card -->
                    <div class="card gradient-card">
                        <div class="card-image">
                            <!-- Content -->
                            <div class="text-white d-flex h-100 mask peach-gradient-rgba">
                                <div class="first-content align-self-center p-2">
                                    <h3 class="card-title">2 </h3>
                                    <p class="lead mb-0">Total de eventos</p>
                                </div>
                                <div class="second-content  align-self-center mx-auto text-center p-2">
                                    <i class="fas fa-calendar-check fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                </div>

            </div>
            <div class="row">
                <div class="col-lg-8 ">
                    <div class=" p-2 calendarioInicio">
                        <!-- fullcalendar -->
                        <div id='calendar' class="cardCalendar"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card p-2">
                        <h3 class="text-center">Gastos Recientes</h3>
                        <ul class="list-group list-group-flush" id="list-gastos">
                            <?php foreach ($data['userGastos'] as $gasto) : ?>
                                <li class="list-group-item ">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <?php echo $gasto['tipo_gasto']; ?>
                                        <span class="badge badge-primary badge-pill">
                                            <?php echo $gasto['cantidad']; ?> &euro;
                                        </span>
                                    </div>
                                    <small class="grey-text"><?php echo $gasto['fecha']; ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <!-- enlace ver todos los gastos -->
                        <a href="<?php echo RUTA_APP ?>/gastos" class="text-dark ml-3 p-2 border-top">
                            Ver todos los Gastos <i class="fas fa-arrow-right"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once "templates/_partials/footer.php" ?>
</main>
<!-- modal de gastos -->
<?php include_once "templates/modal-add-gastos.php" ?>
<!-- modal modificar/borrar evento -->
<?php include_once "templates/modal_modificar_eventos.php" ?>