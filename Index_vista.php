<!DOCTYPE html>
<html>

    <?php require 'bibliotecas/Cabecera.php'; ?>

    <!-- Portfolio Grid Section -->
    <div class="container">
        <div class="row ">

            <div class="col-md-4"><legend>Clientes</legend></div><br>
            <div class="col-md-4"><a class="btn btn-dark" href="Vistas/Alta/alta.php">Nuevo Cliente</a></div>
            <br><br><br>
            <div class="form-control">
                <table class="table">
                    <tr>
                        <td>Nombre</td>
                        <td>Edad</td>
                        <td>Activo</td>
                        <td>Nacionalidades</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <?php foreach ($clientes as $value) : ?>
                        <tr>
                            <td><?php echo $value['nombre']; ?></td>
                            <td><?php echo $value['edad']; ?></td>
                            <?php if ($value['activo']) : ?>
                                <td><input type="checkbox" class="checkbox" name="activo" checked disabled></td>
                            <?php else : ?>
                                <td><input type="checkbox"class="checkbox" name="activo" disabled></td>
                            <?php endif; ?>
                            <td><?php echo $value['nacionalidad']; ?></td>

                            <td><a class="btn btn-primary" href="Vistas/Modificacion/modificacion.php?id=<?php echo $value['id'] ?>">Modificar</a></td>
                            <td><a onclick="javascript:return confirm('¿Seguro que quiere eliminar a <?php echo $value["nombre"]?>?');" href="Vistas/Baja/baja.php?id=<?php echo $value["id"]?>"><button class="btn btn-danger">Borrar</button></a></td>
                        </tr>
                    <?php endforeach; ?>

                </table>    
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>



    <?php require 'bibliotecas/Footer.php'; ?>


</body>

</html>