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
                            <div class="view view-cascade p-3 " id="contenedorBarsCharts">
                                <canvas id="myChart" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 mb-4">
                    <!-- Card -->
                    <div class="card gradient-card">
                        <div class="card-image">
                            <!-- Content -->
                            <div class="text-white d-flex h-100 mask blue-gradient-rgba">
                                <div class="first-content align-self-center p-2">
                                    <h3 class="card-title"><span>2000</span>&euro;</h3>
                                    <p class="lead mb-0">Gastos</p>
                                </div>
                                <div class="second-content align-self-center mx-auto text-center">
                                    <i class="far fa-money-bill-alt fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 d-none d-sm-block">
                    <!-- Card -->
                    <div class="card gradient-card">
                        <div class="card-image">
                            <!-- Content -->
                            <div class="text-white d-flex h-100 mask purple-gradient-rgba">
                                <div class="first-content align-self-center p-2">
                                    <h3 class="card-title">5</h3>
                                    <p class="lead mb-0">Categorías</p>
                                </div>
                                <div class="second-content  align-self-center mx-auto text-center">
                                    <i class="fas fa-chart-pie fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Card -->
                </div>
                <div class="col-md-3 mb-4 d-none d-sm-block">
                    <!-- Card -->
                    <div class="card gradient-card">
                        <div class="card-image">
                            <!-- Content -->
                            <div class="text-white d-flex h-100 mask peach-gradient-rgba">
                                <div class="first-content align-self-center p-2">
                                    <h3 class="card-title">2 </h3>
                                    <p class="lead mb-0">Clientes</p>
                                </div>
                                <div class="second-content  align-self-center mx-auto text-center p-2">
                                    <i class="fas fa-users fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
                <div class="col-md-3 mb-4">
                    <!-- Card -->
                    <div class="card gradient-card">
                        <div class="card-image">
                            <!-- Content -->
                            <a href="#!">
                                <div class="text-white d-flex h-100 mask aqua-gradient-rgba">
                                    <div class="first-content align-self-center p-2">
                                        <h3 class="card-title">5</h3>
                                        <p class="lead mb-0">Documentos</p>
                                    </div>
                                    <div class="second-content  align-self-center mx-auto text-center">
                                        <i class="fas fa-folder-open fa-3x"></i>
                                    </div>
                                </div>
                            </a>
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
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Compras de productos para vender
                                <span class="badge badge-primary badge-pill">30 €</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Dapibus ac facilisis in
                                <span class="badge badge-primary badge-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Morbi leo risus
                                <span class="badge badge-primary badge-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Morbi leo risus
                                <span class="badge badge-primary badge-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Morbi leo risus
                                <span class="badge badge-primary badge-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Morbi leo risus
                                <span class="badge badge-primary badge-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Morbi leo risus
                                <span class="badge badge-primary badge-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Morbi leo risus
                                <span class="badge badge-primary badge-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Morbi leo risus
                                <span class="badge badge-primary badge-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="<?php echo RUTA_APP ?>/gastos">
                                    Ver todos los Gastos <i class="fas fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once "templates/_partials/footer.php" ?>
</main>
<!-- modal de gastos -->
<?php include_once "templates/modal-add-gastos.php" ?>