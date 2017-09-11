<!DOCTYPE html>
<html>
<?php require_once '../../bibliotecas/Cabecera.php';?>
<!-- Portfolio Grid Section -->
<section id="portfolio">
    <div align="text-center" class="container">
        <div class="row ">
            <div>
                
                <div class="container">
                    <div class="form-group">
                        <legend>Registrar Usuario</legend>
                        <form method="post" action="">
                            <?php if ($usuario->tieneErrores()): ?>
                                <div class="alert alert-danger">
                                    Se encontraron errores al procesar el formulario.
                                </div>
                            <?php endif; ?>
                            <?php $tiene_error = $usuario->tieneError('usuario') ? "has-error" : ""; ?>
                            <div class="form-group <?php echo $tiene_error; ?>">
                                <label for="usuario">Ingrese el Usuario</label>
                                <input name="usuario" type="text" class="form-control" id="usuario" placeholder="Ingrese el Usuario">
                                <span class="alert-danger"><?php echo $usuario->getError('usuario'); ?></span>
                            </div>
                            <br>
                            <br>
                            <?php $tiene_error = $usuario->tieneError('contrasenia') ? "has-error" : ""; ?>
                            <div class="form-group <?php echo $tiene_error; ?>">
                                <label for="contrasenia">Ingrese Contraseña</label>
                                <input name="contrasenia" type="password" class="form-control" id="contrasenia" placeholder="Ingrese la Contraseña">
                                <span class="alert-danger"><?php echo $usuario->getError('contrasenia'); ?></span>
                            </div>
                            <br>
                            <br>
                            <?php $tiene_error = $usuario->tieneError('contraseniaa') ? "has-error" : ""; ?>
                            <div class="form-group <?php echo $tiene_error; ?>">
                                <label for="contraseniaa">Repita la Contraseña</label>
                                <input name="contraseniaa" type="password" class="form-control" id="contraseniaa" placeholder="Repita la Contraseña">
                                <span class="alert-danger"><?php echo $usuario->getError('contraseniaa'); ?></span>
                            </div>
                            <br>
                            <br>
                            <p><button type="submit" class="btn btn-primary">Registrar Usuario</button></p>
                            <p><a class="btn btn-danger" href="../../Login/Login.php">Regresar a Inicio</a></p>
                            

                        </form>
                         <div></div>
                    </div>
                </div>     
            </div>

        </div>
    </div>
</section>
<?php require_once '../../bibliotecas/Footer.php'; ?>






</body>

</html>