<?php include_once "templates/_partials/header.php" ?>
<?php include_once "templates/_partials/barra_lateral.php" ?>
<main class="w-100">
    <?php include_once "templates/_partials/nav.php" ?>
    <!-- contenido -->
    <section id="content">

        <div class="container-fluid">
            <h3>Lista de gastos</h3>
            <div class="row  p-2 mb-3 d-flex justify-content-between">
                <div class="col-lg-3  d-none d-sm-block">
                    <button type="button" class="btn btn-teal btn-block" data-toggle="modal" data-target="#addGastos">
                        <i class="fas fa-plus"></i> Añadir gasto
                    </button>
                </div>
                <!-- <div class="col-lg-3  d-none d-sm-block">
                    <select name="gastoFiltrar" id="gastoFiltrar" class="browser-default custom-select">
                        <option value="null" disabled selected>Seleciona gasto para filtrar</option>

                        <?php foreach ($data['gastos'] as $gasto) : ?>
                            <option value="<?php echo $gasto['id'] ?>"><?php echo strtoupper($gasto['nombre']) ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div> -->
                <!-- <div class="col-lg-3  d-none d-sm-block">
                    <input type="date" name="fechaFiltrar" id="fechaFiltrar" class="form-control">
                </div> -->
                <div class="col-lg-3  d-none d-sm-block">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalGraficas">
                        Gráficas
                    </button>
                </div>
            </div>
            <!-- table -->
            <div class="row p-1">
                <div class="col col-lg-12 ">
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
                                    <td class="" idGasto="<?php echo $gastoUser['idGasto'] ?>"> <?php echo $gastoUser['nombre'] ?></td>
                                    <td><?php echo $gastoUser['tipo_gasto'] ?></td>
                                    <td><?php echo $gastoUser['cantidad'] ?> <span>&euro;</span> </td>
                                    <td class=""><?php echo ($gastoUser['fecha']) ?> </td>
                                    <td class="d-none d-sm-block">
                                        <div class="btn-group dropright">
                                            <button type="button" class="btn btn-mdb-color">Acciones</button>
                                            <button type="button" class="btn btn-mdb-color  dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <span class="dropdown-item" data-toggle="modal" data-target="#editarGastos" id="btnEditar" idUsuario="<?php echo $gastoUser['id'] ?>">
                                                    <i class="fas fa-pencil-alt mr-2"></i>Editar
                                                </span>
                                                <span class="dropdown-item" id="btnBorrar">
                                                    <i class="fas fa-trash-alt mr-2"></i>Borrar
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php include_once "templates/_partials/footer.php" ?>
</main>
<!-- modal para añadir gastos -->
<?php include_once "templates/modal-add-gastos.php" ?>
<!-- modal para editar gasto -->
<?php include_once "templates/gastos/modal-edit-gasto.php" ?>
<!-- modal graficos-->
<?php include_once "templates/gastos/modal-graficos.php" ?>