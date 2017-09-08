<!DOCTYPE html>
<html>
    <?php require_once __DIR__ . '/../../bibliotecas/Cabecera.php'; ?>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div align="text-center" class="container">
            <div class="row ">
                <div>
                    <div class="container">
                        <div class="form-group">
                            <legend>Formulario</legend> 
                            <form method="post" action="">
                                <?php if ($form->tieneErrores()): ?>
                                    <div class="alert alert-danger">
                                        Se encontraron errores al procesar el formulario.
                                    </div>
                                <?php endif; ?>
                                <?php $tiene_error = $form->tieneError('nombre') ? "has-error" : ""; ?>
                                <div class="form-group <?php echo $tiene_error; ?>">
                                    <label for="nombre">Ingrese su Nombre</label>
                                    <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $form->getValor("nombre"); ?>" placeholder="Ingrese su Nombre">
                                    <span class="alert-danger"><?php echo $form->getError('nombre'); ?></span>
                                </div>
                                <br>
                                <?php $tiene_error = $form->tieneError('apellido') ? "has-error" : ""; ?>
                                <div class="form-group <?php echo $tiene_error; ?>">
                                    <label for="apellido">Ingrese su Apellido</label>
                                    <input name="apellido" type="text" class="form-control" id="apellido" value="<?php echo $form->getValor("apellido"); ?>" placeholder="Ingrese su Apellido">
                                    <span class="alert-danger"><?php echo $form->getError('apellido'); ?></span>
                                </div>
                                <br>
                                <?php $tiene_error = $form->tieneError('activo') ? "has-error" : ""; ?>
                                <div class="form-group <?php echo $tiene_error; ?>" >
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="activo" id="activo" value="1" <?php echo $form->getChecked('activo'); ?>>
                                            Vigente
                                        </label>
                                    </div>
                                    <br>
                                    <!--<?php $tiene_error = $form->tieneError('fecha') ? "has-error" : ""; ?>-->
                                    <div class="form-group <?php echo $tiene_error; ?>">
                                        <label for="Formulario">Ingrese Fecha de Nacimiento</label>
                                        <div class='input-group date' id='fecha'>
                                            <input id="fecha" name="fecha" type="date" value="<?php echo $form->getValor("fecha"); ?>">
                                        </div>
                                        <span class="alert-danger"><?php echo $form->getError('fecha'); ?></span>
                                    </div>
                                    <br>
                                    <?php $tiene_error = $form->tieneError('localidad') ? "has-error" : ""; ?>
                                    <div class="form-group <?php echo $tiene_error; ?>">
                                        <label class="control-label" for="localidad">Nacionalidad</label>
                                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control" name="localidad" id="localidad">
                                            <option value=""></option> 
                                            <?php foreach ($form->localidad as $item): ?>
                                                <option value="<?php echo $item['id']; ?>" <?php echo $form->getSelected('localidad', $item["id"]); ?>><?php echo $item["nacionalidad"]; ?></option> 
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="alert-danger"><?php echo $form->getError('localidad'); ?></span>
                                    </div>
                                    <br>
                                    <br>
                                    <p><button type="submit" class="btn btn-primary">Procesar formulario</button></p>


                            </form>

                        </div>
                    </div>     
                </div>

            </div>
        </div>
    </section>
<?php require_once __DIR__ . '/../../bibliotecas/Footer.php'; ?>






</body>

</html>