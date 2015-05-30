<!-- Modal Acceso-->
<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formLogin">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Acceso de usuarios</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" name="emailLogin" id="emailLogin" placeholder="Email" required />
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="password" class="form-control" name="passwordLogin" id="passwordLogin" placeholder="Contraseña" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnRecupera" class="btn btn-default">Recuperar mi contraseña</button>
                    <input type="hidden" name="consulta" id="consulta" value="iniciarSesion" />
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Registro -->
<div class="modal fade" id="myModalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formRegistro">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Registrarse</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="nombreReg" id="nombreReg" placeholder="Nombre" required />
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="apellidoReg" id="apellidoReg" placeholder="Apellido" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" name="emailReg" id="emailReg" placeholder="Email" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="adress" id="adress" placeholder="Domicilio" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="password" class="form-control" name="passwordReg" id="passwordReg" placeholder="Contraseña" required />
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="password" class="form-control" name="confirmarPasswordReg" id="confirmarPasswordReg" placeholder="Confirmar contraseña" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="consulta" id="consulta" value="registro" />
                    <button type="submit" class="btn btn-primary">Registrarme</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Recuperar -->
<div class="modal fade" id="myModalRecupera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formRecupera">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Recuperar contraseña</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" name="emailRecupera" id="emailRecupera" placeholder="Correo electrónico" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="consulta" id="consulta" value="solicitaPassword" />
                    <button type="submit" class="btn btn-primary">Recuperar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModalContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Importante</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p id="myModalResponse"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Donar -->
<div class="modal fade" id="myModalDonar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formRegistro">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Haz una Donación</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="material" id="material" placeholder="Material" required />
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" required />
                        </div>
                    </div>
                    <div class="row">
						<div class="col-md-6 form-group">
							<label>Cuando?</label>
							<input type="text" class="form-control datepicker" name="fechaNacimiento" id="fechaNacimiento" value="" required />
						</div>
						<div class="col-md-6 form-group">
							<label>A que hora?</label>
							<input type="text" class="form-control" name="fechaNacimiento" id="fechaNacimiento" value="" required />
						</div>
					</div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="adress" id="adress" placeholder="Domicilio" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="consulta" id="consulta" value="donar" />
                    <button type="submit" class="btn btn-primary">Donar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Domicilio matera -->
<div class="modal fade" id="myModalMatera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="myModalVacioContenido">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-offset-1 col-md-5">
                        <img class="producto-inner" src="img/productos/2.jpg" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="title">Sillas Ecológicas</h2>
                            </div>
                        </div>
                        <p>
                            Con un poco de creatividad podemos cuidar nuestro planeta y convertir nuestras llantas en una atractiva silla más agradable para nuestra comodidad y la de nuestra familia.
                        </p>
                        <h3>$0000 | 500 Puntos</h3>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal vacio -->
<div class="modal fade" id="myModalVacio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="myModalVacioContenido"></div>
    </div>
</div>