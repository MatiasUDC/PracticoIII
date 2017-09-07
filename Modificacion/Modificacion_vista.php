<!DOCTYPE html>
<html>
    <?php require_once __DIR__ . '/../bibliotecas/Cabecera.php'; ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="../Index.php">Trabajo Practico</a>
        </div>
    </nav>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div align="text-center" class="container">
            <div class="row ">
                <div>
                    <div class="container">
                        <div class="form-group">
                            <legend>Modificar Cliente</legend> 
                            <form method="post" action="Modificacion.php">
                                <?php if ($cliente->tieneErrores()): ?>
                                    <div class="alert alert-danger">
                                        Se encontraron errores al procesar el formulario.
                                    </div>
                                <?php endif; ?>
                                <div class="contact_form">
                                    <input type="hidden" name="id" value="<?php echo $datos["id"] ?>">    
                                </div>

                                <?php $tiene_error = $cliente->tieneError('nombre') ? "has-error" : ""; ?>
                                <div class="form-group <?php echo $tiene_error; ?>">
                                    <label for="nombre">Ingrese su Nombre</label>
                                    <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $datos["apellido"]; ?>" placeholder="Ingrese su Nombre">
                                    <span class="alert-danger"><?php echo $cliente->getError('nombre'); ?></span>
                                </div>
                                <br>
                                <?php $tiene_error = $cliente->tieneError('apellido') ? "has-error" : ""; ?>
                                <div class="form-group <?php echo $tiene_error; ?>">
                                    <label for="apellido">Ingrese su Apellido</label>
                                    <input name="apellido" type="text" class="form-control" id="apellido" value="<?php echo $datos["nombre"]; ?>" placeholder="Ingrese su Apellido">
                                    <span class="alert-danger"><?php echo $cliente->getError('apellido'); ?></span>
                                </div>
                                <br>
                                <?php $tiene_error = $cliente->tieneError('activo') ? "has-error" : ""; ?>
                                <div class="form-group <?php echo $tiene_error; ?>" >
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="activo" id="activo" value="1" <?php echo $cliente->getChecked('activo'); ?>>
                                            Vigente
                                        </label>
                                    </div>
                                    <br>
                                    <!--<?php $tiene_error = $cliente->tieneError('fecha') ? "has-error" : ""; ?>-->
                                    <div class="form-group <?php echo $tiene_error; ?>">
                                        <label for="Formulario">Ingrese Fecha de Nacimiento</label>
                                        <div class='input-group date' id='fecha'>
                                            <input id="fecha" name="fecha" type="date" value="<?php echo $datos["fecha"]; ?>">
                                        </div>
                                        <span class="alert-danger"><?php echo $cliente->getError('fecha'); ?></span>
                                    </div>
                                    <br>
                                    <?php $tiene_error = $cliente->tieneError('localidad') ? "has-error" : ""; ?>
                                    <div class="form-group <?php echo $tiene_error; ?>">
                                        <label class="control-label" for="localidad">Nacionalidad</label>
                                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control" name="localidad" id="localidad">
                                            <optgroup>
                                                <option value="<?php echo $datos["nacionalidad_id"]; ?>"><?php echo $datos["nacionalidad"]; ?></option>>
                                            </optgroup> 
                                            <optgroup label="-------------------------------------">
                                                <?php foreach ($cliente->localidad as $item): ?>
                                                    <option value="<?php echo $item['id']; ?>" <?php echo $cliente->getSelected('localidad', $item["id"]); ?>><?php echo $item["nacionalidad"]; ?></option> 
                                                <?php endforeach; ?>
                                            </optgroup>

                                        </select>
                                        <span class="alert-danger"><?php echo $cliente->getError('localidad'); ?></span>
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
    <?php require_once __DIR__ . '/../bibliotecas/Footer.php'; ?>






</body>

</html>