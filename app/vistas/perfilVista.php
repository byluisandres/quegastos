<?php include_once "templates/_partials/header.php" ?>
<?php include_once "templates/_partials/barra_lateral.php" ?>
<main class="w-100">
    <?php include_once "templates/_partials/nav.php" ?>
    <!-- contenido -->
    <section id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-cascade narrower">
                        <!-- Card image -->
                        <div class="view view-cascade gradient-card-header mdb-color darken-4 p-3">
                            <!-- Title -->
                            <h2 class="card-header-title text-white font-weight-bold">Editar Foto</h2>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade ">
                            <!-- foto de perfil -->
                            <img class="rounded mx-auto d-block position-relative border" src="<?php echo $data['usuario'][0]['imagen'] ?>" alt="foto perfil" id="imgPerfil" width="190" height="190">
                            <div class="button-wrap">
                                <label for="inputFoto" class="new-button">
                                    <i class="fas fa-camera"></i>
                                </label>
                                <input type="file" name="inputFoto" id="inputFoto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card card-cascade narrower">
                        <!-- Card image -->
                        <div class="view view-cascade gradient-card-header mdb-color darken-4 p-3">
                            <!-- Title -->
                            <h2 class="card-header-title text-white font-weight-bold">Editar Información
                            </h2>
                        </div>
                        <!-- Card content -->
                        <div class="card-body card-body-cascade">
                            <form method="POST" id="formInfoUsuario">
                                <input type="text" name="id" id="id" value="<?php echo $data['usuario'][0]['id'] ?>" hidden>
                                <input type="text" name="nombre" id="nombre" class="form-control mb-4" value="<?php echo $data['usuario'][0]['nombre'] ?>">
                                <input type="email" name="email" id="email" class="form-control mb-4" value="<?php echo $data['usuario'][0]['email'] ?>">
                                <input type="password" name="password" id="password" class="form-control mb-4" placeholder="Nueva Contraseña">
                                <button type="submit" class="btn btn-teal btn-block">Actualizar</button>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
    </section>
    <?php include_once "templates/_partials/footer.php" ?>
</main>