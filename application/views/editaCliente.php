   <?php
   $this->load->view('top');

   $this->load->view('sidebar');

#recibo numero de tarjeta encriptado
$orig = $quien[0]->tarjeta;
#desencripto
$tarjeta = $this->encrypt->decode($orig);

   ?>
   <!-- page content -->

            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    <?= $titulo; ?>
                </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">

                                    <form action="<?php echo base_url('guarda/clienteEditado');  ?>" method="POST" class="form-horizontal form-label-left" novalidate onkeypress="return anular(event)>
                                        <span class="section">Infomacion personal</span>

                                        <?php
                                      if ($que == 3) {
                                           echo '<div class="alert alert-info alert-danger fade in btn-lg" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    ¡Ups! algo ha salido muy mal, por favor espera un momento y vuelve a intentar
                                </div>';
                                        }

                                        ?>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre(s)  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" data-validate-length-range="4" name="nombres" placeholder="Nombres" required="required" type="text" value="<?= $quien[0]->nombres; ?>">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellidos<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellidos" placeholder="Ambos apellidos" required="required" type="text" value="<?= $quien[0]->apellidos; ?>">
                                            </div>
                                        </div>

                                         <div class="form-group item">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="sexo" value="male"
                                                        <?= ($quien[0]->sexo == 'male')?'checked':''; ?> > &nbsp; Masculino &nbsp;
                                                    </label>
                                                     <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                      <input type="radio" name="sexo" value="female"
                                                      <?= ($quien[0]->sexo == 'female')?'checked':''; ?>> Femenino
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo e. <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="email" name="mail" required="required" class="form-control col-md-7 col-xs-12" placeholder="usuario@dominio.com" value="<?= $quien[0]->mail; ?>">
                                            </div>
                                        </div>

                                        <div class="item multi required form-group">
                                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="multi_first">Tarjeta
                                             <span class="required">*</span>
                                           </label>
                                           <div class="col-md-6 col-sm-6 col-xs-12 input">

                                               <input type="text" name="tar1" class="form-control tarjeta-input" maxlength='4' minlength='4' id="multi_first" value="<?= substr($tarjeta, 0, 4); ?>">

                                               <input type="text" name="tar2" class="form-control tarjeta-input" maxlength='4' minlength='4' value="<?= substr($tarjeta, 4, 4); ?>">

                                               <input type="text" name="tar3" class="form-control tarjeta-input" maxlength='4' minlength='4' value="<?= substr($tarjeta, 8, 4); ?>">

                                               <input type="text" name="tar4" class="form-control tarjeta-input" maxlength='4' minlength='4' value="<?= substr($tarjeta, 12, 4); ?>">

                                               <input data-validate-length-range="16" id="serial" name="serial" required="required" type="hidden">

                                           </div>
                                       </div>



                                        <div class="item form-group">
                                            <label for="tel" class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="tel" data-validate-length-range="10" class="form-control col-md-7 col-xs-12" required="required" placeholder="55 5859 5550" value="<?= $quien[0]->telefono; ?>">
                                            </div>
                                        </div>

                                        <input type="hidden" name="id"
                                        value="<?= $quien[0]->idCliente; ?>"/>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                                <button type="reset" class="btn btn-primary">limpiar</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


    <?php
	$this->load->view('bottom');
    ?>
