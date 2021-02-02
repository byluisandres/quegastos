<?php include_once "templates/_partials/header.php" ?>
<?php include_once "templates/_partials/barra_lateral.php" ?>
<main class="w-100">
    <?php include_once "templates/_partials/nav.php" ?>
    <!-- contenido -->
    <section id="content">

        <div class="container-fluid">
            <h3>Lista de gastos</h3>
            <div class="row">
                <div class="col-lg-2 d-none d-sm-block">
                    <button type="button" class="btn btn-teal btn-block" data-toggle="modal" data-target="#addGastos">
                        <i class="fas fa-plus"></i> Añadir gasto
                    </button>
                </div>
                <div class="col-lg-7">
                    <form action="" method="POST">
                        <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar por gasto, tipo de gasto o cantidad" style="padding: 1.4rem;">
                    </form>
                </div>
                <div class="col-lg-3 d-none d-sm-block">
                    <button class="btn btn-outline-red btn-block dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-file-pdf"></i>
                        Filtrar</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#entreFechas">Gastos</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#todosGastos">Entre Fechas</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#anio">Por año</a>
                    </div>
                </div>
            </div>
            <!-- table -->
            <div class="row">
                <div class="col col-lg-12 ">
                    <div class="table-responsive text-nowrap mt-3" id="contenedorTabla">
                        <table class="table table-striped tableApp" id="tableGastos">
                            <thead class="mdb-color darken-4 white-text">
                                <tr>
                                    <th hidden>#</th>
                                    <th class="">Gasto</th>
                                    <th>Tipo de gasto</th>
                                    <th>Cantidad</th>
                                    <th colspan="2" class="">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['userGastos'] as $gastoUser) : ?>
                                    <tr>
                                        <td hidden><?php echo $gastoUser['id'] ?> </td>
                                        <td class=""> <?php echo $gastoUser['nombre'] ?></td>
                                        <td><?php echo $gastoUser['tipo_gasto'] ?></td>
                                        <td><?php echo $gastoUser['cantidad'] ?>&euro;</td>
                                        <td class=""><?php echo ($gastoUser['fecha']) ?> </td>
                                        <td>
                                            <div class="btn-group dropright">
                                                <button type="button" class="btn btn-primary">Acciones</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <span class="dropdown-item">
                                                        <i class="fas fa-pencil-alt mr-2" id="btnEditar"></i>Editar
                                                    </span>
                                                    <span class="dropdown-item" id="btnBorrar">
                                                        <i class="fas fa-trash-alt mr-2" ></i>Borrar
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- paginación -->
                        <nav id="contenedorPagination">
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once "templates/_partials/footer.php" ?>
</main>
<!-- modal de gastos -->
<?php include_once "templates/modal-add-gastos.php" ?>