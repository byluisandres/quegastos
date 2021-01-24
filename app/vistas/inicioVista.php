<?php include_once "templates/_partials/header_inicio.php" ?>
<main class="container">
    <div class="row" style="margin-top: 5rem;">
        <div class="col col-md-12">
            <!-- Default form login -->
            <form class="text-center border border-light p-5" action="" >

                <p class="h4 mb-4">Inicio de Sesión</p>

                <!-- Email -->
                <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

                <!-- Password -->
                <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="recordar">
                            <label class="custom-control-label" for="recordar">Recordar</label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <a href="">¿Has olvidado tu contraseña?</a>
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

                <!-- Register -->
                <p>¿Aún no tienes cuenta?
                    <a href="<?php echo RUTA_APP; ?>/ap/registro">Registrarse</a>
                </p>

            </form>
            <!-- Default form login -->
        </div>
    </div>

</main>


<?php include_once "templates/_partials/footer_inicio.php" ?>