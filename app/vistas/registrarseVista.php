<?php include_once "templates/_partials/header_inicio.php" ?>
<main class="container">
    <div class="row" style="margin-top: 5rem;">
        <div class="col col-md-12">
            <!-- Default form login -->
            <form class="text-center border border-light p-5" id="formRegistro"  method="POST">

                <p class="h4 mb-4">Registrarse</p>

                <!-- nombre -->
                <input type="text" name="nombre" id="nombre" class="form-control mb-4" placeholder="Nombre">

                <!-- Email -->
                <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail">

                <!-- Password -->
                <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password">
                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit">Registrarse</button>
                <!-- Register -->
                <p>Ya tienes cuenta
                    <a href="<?php echo RUTA_APP; ?>">Inicia Sesión</a>
                </p>

            </form>
            <!-- Default form login -->
        </div>
    </div>

</main>


<?php include_once "templates/_partials/footer_inicio.php" ?>