<!DOCTYPE html>
<html>
    <?php require_once '../bibliotecas/Cabecera.php'; ?>
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div align="text-center" class="container">
            <div class="row ">
                <div class="form-group">
                    <div><legend>Iniciar Sesion</legend></div>

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
                        <?php $tiene_error = $usuario->tieneError('contrasenia') ? "has-error" : ""; ?>
                        <div class="form-group <?php echo $tiene_error; ?>">
                            <label for="contrasenia">Ingrese Contrasenia</label>
                            <input name="contrasenia" type="password" class="form-control" id="contrasenia" placeholder="Ingrese la Contraseña">
                            <span class="alert-danger"><?php echo $usuario->getError('contrasenia'); ?></span>
                        </div>
                        <br>
                        <br>
                        <p><button type="submit" class="btn btn-primary">Iniciar Sesion</button></p>


                    </form>

                </div>
            </div>     
        </div>
    </section>
    <?php require_once '../bibliotecas/Footer.php'; ?>






</body>

</html>