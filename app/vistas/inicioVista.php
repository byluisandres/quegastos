<?php include_once "templates/_partials/header_inicio.php" ?>
<main class="container rounded shadow">

    <div class="row " style="margin-top: 10rem;">
        <div class="col bg-white p-4 bg">
            <!-- login -->
            <form class="formLogin p-3" action="<?php echo RUTA_APP ?>/ap/login" method="POST">
                <p class="h4 mb-4 text-center  text-white">Inicio de Sesión</p>

                <!-- Email -->
                <input type="email" id="email" name="email" class="form-control mb-4" value="<?php isset($data["datos"]["email"]) ? print $data["datos"]["email"] : "" ?>" placeholder="E-mail">

                <!-- Password -->
                <input type="password" id="password" name="password" class="form-control mb-4" value="<?php isset($data["datos"]["password"]) ? print $data["datos"]["password"] : "" ?>" placeholder="Password">

                <!-- <div class="d-flex justify-content-around">
                    <div>
                        
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="recordar" name="recordar" <?php if (isset($data["datos"]["recordar"]) == "on") print "checked"; ?>>
                            <label class="custom-control-label" for="recordar">Recordar</label>
                        </div>
                    </div>
                    <div>
                        
                        <a href="">¿Has olvidado tu contraseña?</a>
                    </div>
                </div> -->

                <!-- Sign in button -->
                <button class="btn btn-teal btn-block my-4" type="submit">Iniciar Sesión</button>

                <!-- Register -->
                <p class="text-white d-flex justify-content-end">¿Aún no tienes cuenta?
                    <a href="<?php echo RUTA_APP; ?>/ap/registro" class="text-white "> Registrarse</a>
                </p>
                <?php include_once "templates/_partials/errores.php" ?>
                <p class="text-white">
                    [ luisandres33bolanos@gmail.com - 12345 ]
                </p>
            </form>
        </div>
    </div>
</main>
<?php include_once "templates/_partials/footer_inicio.php" ?>