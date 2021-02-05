<?php include_once "templates/_partials/header.php" ?>
<?php include_once "templates/_partials/barra_lateral.php" ?>
<main class="w-100">
    <?php include_once "templates/_partials/nav.php" ?>
    <!-- contenido -->
    <section id="content">
        <div class="container-fluid">
            <h3>Informes</h3>
            <div class="row">
                <div class="col-lg-2">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="csv-tab" data-toggle="tab" href="#csv" role="tab" aria-controls="csv" aria-selected="true">CSV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pdf-tab" data-toggle="tab" href="#pdf" role="tab" aria-controls="profile" aria-selected="false">PDF</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="csv" role="tabpanel" aria-labelledby="csv-tab">
                            <div class="row">
                                <div class="col-8">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="csv-entre-fechas-tab" data-toggle="pill" href="#csv-entre-fechas" role="tab" aria-controls="csv-entre-fechas" aria-selected="true">Entre Fechas</a>
                                        <a class="nav-link" id="csv-gasto-tab" data-toggle="pill" href="#csv-gasto" role="tab" aria-controls="csv-gasto" aria-selected="false">Por gasto</a>
                                        <a class="nav-link" id="csv-anio-tab" data-toggle="pill" href="#csv-anio" role="tab" aria-controls="csv-anio" aria-selected="false">Por año</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pdf" role="tabpanel" aria-labelledby="pdf-tab">
                            <div class="row">
                                <div class="col-8">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="pdf-entre-fechas-tab" data-toggle="pill" href="#pdf-entre-fechas" role="tab" aria-controls="pdf-entre-fechas" aria-selected="true">Entre Fechas</a>
                                        <a class="nav-link" id="pdf-gasto-tab" data-toggle="pill" href="#pdf-gasto" role="tab" aria-controls="pdf-gasto" aria-selected="false">Por gasto</a>
                                        <a class="nav-link" id="pdf-anio-tab" data-toggle="pill" href="#pdf-anio" role="tab" aria-controls="pdf-anio" aria-selected="false">Por año</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-3 ">
                    <div class="card p-2">
                        <p class="text-center" id="textElige"> Elige si quieres generar informes en CSV o en PDF. </p>
                        <?php include_once "templates/_partials/form_informes.php" ?>
                    </div>
                </div>
                <div class="col-lg-7 ">
                    <div class="card p-2 card-informe">
                        <h4 id="textoVistaPrevia">Vista Previa</h4>
                        <div id="contenedor-informe"></div>
                    </div>

                </div>
            </div>
    </section>
    <?php include_once "templates/_partials/footer.php" ?>
</main>