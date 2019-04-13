<?php include_once 'includes/header.php'; ?>

<div class="button-group">
    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#reserva">Reserva un cupo</button>
    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#registro"> ¿Ya pagaste?, regístrate</button>
</div>
<div class="modal fade" id="reserva" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h3 class="modal-title">Crea tu reserva para el DevFest 2016</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?= BASE_URL ?>/participantes/registrar" method="POST">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-group">
                                <label for="nombre" class="col-xs-12 col-sm-4">Escribe tu nombre</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apat" class="col-xs-12 col-sm-4">Escribe tu apellido paterno</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="text" class="form-control" id="apat" name="apat" placeholder="Tu apellido paterno" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amat" class="col-xs-12 col-sm-4">Escribe tu apellido materno</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="text" class="form-control" id="amat" name="amat" placeholder="Tu apellido materno" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ci" class="col-xs-12 col-sm-4">Escribe tu carnet de identidad</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="text" class="form-control" id="ci" name="ci" placeholder="Tu carnet de identidad" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mail" class="col-xs-12 col-sm-4">Escribe tu correo electrónico</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="email" class="form-control" id="mail" name="mail" placeholder="Tu correo electrónico" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cel" class="col-xs-12 col-sm-4">Escribe tu número de celular</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="text" class="form-control" id="cel" name="cel" placeholder="Tu número de celular">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tipo" class="col-xs-12 col-sm-4">Escoje tu tipo</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="radio"  id="tipo" name="tipo" required> Estudiante
                                    <input type="radio"  name="tipo"> Profesional
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-outline" data-dismiss="modal"> Cerrar</button>
                <button type="submit" class="btn btn-primary" > Reservar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h3>Regístrate para el DevFest 2016</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?= BASE_URL ?>/participantes/registrar" method="POST" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-10">
                                <h3>Información personal</h3>
                            </div>
                            <p style="padding:25px;">
                            <div class="form-group">
                                <label for="nombre" class="col-xs-12 col-sm-4">Escribe tu nombre</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apat" class="col-xs-12 col-sm-4">Escribe tu apellido paterno</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="text" class="form-control" id="apat" name="apat" placeholder="Tu apellido paterno" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amat" class="col-xs-12 col-sm-4">Escribe tu apellido materno</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="text" class="form-control" id="amat" name="amat" placeholder="Tu apellido materno" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ci" class="col-xs-12 col-sm-4">Escribe tu carnet de identidad</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="text" class="form-control" id="ci" name="ci" placeholder="Tu carnet de identidad" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mail" class="col-xs-12 col-sm-4">Escribe tu correo electrónico</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="email" class="form-control" id="mail" name="mail" placeholder="Tu correo electrónico" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cel" class="col-xs-12 col-sm-4">Escribe tu número de celular</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="text" class="form-control" id="cel" name="cel" placeholder="Tu número de celular">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tipo" class="col-xs-12 col-sm-4">Escoje tu tipo</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="radio"  id="estudiante" name="tipo" value="estudiante" required> Estudiante
                                    <input type="radio"  id="profesional" name="tipo" value="profesional"> Profesional
                                </div>
                            </div>
                            <hr>
                            <div class="col-xs-12 col-sm-10">
                                <h3 class="modal-title">Información de pago</h3>
                            </div>
                            <p style="padding:20px;">
                            <div class="form-group">
                                <label for="banco" class="col-xs-12 col-sm-4">Selecciona el banco en el que pagaste</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="radio" class="banco" name="banco" required> BNB
                                    <input type="radio" class="banco" name="banco" required> Mercantil Santa Cruz
                                    <input type="radio" class="banco" name="banco" required> BCP
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="souvenir" class="col-xs-12 col-sm-4">¿Deseas algún souvenir?</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="checkbox" id="taza" name="souvenir"> Taza
                                    <input type="checkbox" id="polera" name="souvenir"> Polera
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recibo" class="col-xs-12 col-sm-4">Ingresa una fotografía de su recibo</label>
                                <div class="col-xs-12 col-sm-8">
                                    <input type="file" id="recibo" name="recibo" required>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-4 col-sm-4">
                        <strong>Total a pagar: Bs. <span id="total">0</span></strong>
                    </div>
                    <div class="col-xs-8">
                        <button type="submit" class="btn btn-primary pull-right" > Reservar</button>
                        <button type="button" class="btn btn-secondary btn-sm btn-outline pull-right" data-dismiss="modal"> Cerrar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?>