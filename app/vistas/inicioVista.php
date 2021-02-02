<?php include_once "templates/_partials/header_inicio.php" ?>
<main class="container rounded shadow">

    <div class="row align-items-stretch" style="margin-top: 5rem;">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6">
            <!-- imagen -->
        </div>
        <div class="col bg-white p-5 ">
            <!-- login -->
            <form class="text-center" action="<?php echo RUTA_APP ?>/ap/login" method="POST">

                <p class="h4 mb-4">Inicio de Sesión</p>

                <!-- Email -->
                <input type="email" id="email" name="email" class="form-control mb-4" value="<?php isset($data["datos"]["email"]) ? print $data["datos"]["email"] : "" ?>" placeholder="E-mail">

                <!-- Password -->
                <input type="password" id="password" name="password" class="form-control mb-4" value="<?php isset($data["datos"]["password"]) ? print $data["datos"]["password"] : "" ?>" placeholder="Password">

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="recordar" name="recordar" <?php if (isset($data["datos"]["recordar"]) == "on") print "checked"; ?>>
                            <label class="custom-control-label" for="recordar">Recordar</label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <a href="">¿Has olvidado tu contraseña?</a>
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit">Iniciar Sesión</button>

                <!-- Register -->
                <p>¿Aún no tienes cuenta?
                    <a href="<?php echo RUTA_APP; ?>/ap/registro">Registrarse</a>
                </p>
                <?php include_once "templates/_partials/errores.php" ?>
                [ luisandres33bolanos@gmail.com - 12345 ]
            </form>
        </div>
    </div>
</main>
<?php include_once "templates/_partials/footer_inicio.php" ?>