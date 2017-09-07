<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Programacion Web II</h3>
                    <p>Año 2017</p>
                </div>
                <div class="footer-col col-md-4">
                    <img class="img-fluid" align="right" src="/PracticoIII/img/logo.jpg"/>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <h2>Mensaje</h2>
                            <p>¿Estas Seguro de Querer Borrar Este Cliente?</p>
                            <a class="btn btn-danger" href="Baja/baja.php?id=<?php echo $value['id'] ?>">Dar Baja</a>
                            <button class="btn btn-success" type="button" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
