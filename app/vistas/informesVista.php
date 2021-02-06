<?php include_once "templates/_partials/header.php" ?>
<?php include_once "templates/_partials/barra_lateral.php" ?>
<main class="w-100">
    <?php include_once "templates/_partials/nav.php" ?>
    <!-- contenido -->
    <section id="content">
        <div class="container-fluid">
            <h3 class="">Genera informes de tus gastos en formato PDF</h3>
            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="pdf" role="tabpanel" aria-labelledby="pdf-tab">
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
                <div class="col-lg-6 ">
                    <div class="card p-3">
                        <p class="text-center" id="textElige">GENERAR PDF ENTRE DOS FECHAS </p>
                        <?php include_once "templates/_partials/form_informes.php" ?>
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="card p-2 card-informe text-center">
                        <h4 id="textoVistaPrevia"></h4>
                        <div id="contenedor-informe">
                            <img src="img/pdf.png" alt="logo pdf" width="500" class="text-center">

                        </div>
                    </div>

                </div>
            </div>
    </section>
    <?php include_once "templates/_partials/footer.php" ?>
</main>