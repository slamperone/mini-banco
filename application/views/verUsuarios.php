<?php
   $this->load->view('top');
   #variable con los datos del usuario
   #$datosUsuario['nombre'];

   $this->load->view('sidebar');
   ?>
   <!-- page content -->
<div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Directorio de usuarios</h3>
                        </div>


                    </div>
                    <div class="clearfix"></div>

                               <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_content">

                                    <div class="row">

                                        <!-- cuando haya paginaciondiv class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                                            <ul class="pagination pagination-split">
                                                <li><a href="#">A</a>
                                                </li>
                                                <li><a href="#">B</a>
                                                </li>
                                                <li><a href="#">C</a>
                                                </li>
                                                <li><a href="#">D</a>
                                                </li>
                                                <li><a href="#">E</a>
                                                </li>
                                                <li>...</li>
                                                <li><a href="#">W</a>
                                                </li>
                                                <li><a href="#">X</a>
                                                </li>
                                                <li><a href="#">Y</a>
                                                </li>
                                                <li><a href="#">Z</a>
                                                </li>
                                            </ul>
                                        </div-->

                                        <div class="clearfix"></div>

                                        <!--Las tarjetas aqui-->

<?php
$quienes = $this->data['users'];
if ($quienes == FALSE){
    echo '<h1>Aún no hay usuarios registrados</h1>';
}else{


//print_r($quienes);
foreach ($quienes as $quien){

        echo '<div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                                            <div class="well profile_view">
                                                <div class="col-sm-12">
                                                 <h4 class="brief"><i>'.$quien->nick.'</i></h4>
                                                    <div class="left col-xs-7">
                                                        <h2 class="cap">'.$quien->nombres.' '.$quien->apellidos.'</h2>
                                                        <p><strong>Cargo: </strong> '.$quien->rol.' </p>
                                                        <ul class="list-unstyled">
                                                            <li><strong><i class="fa fa-envelope"></i> Email:</strong> <br />'.$quien->correo.'</li>
                                                            <li><strong><i class="fa fa-laptop"></i> Fecha de registro:</strong><br /> '.date("d-M-Y",strtotime(substr($quien->registro,0,10))).'</li>
                                                            <li><strong><i class="fa fa-bell-o"></i> Hora de registro:</strong><br /> '.substr($quien->registro,10,6).'</li>

                                                        </ul>
                                                    </div>
                                                    <div class="right col-xs-5 text-center">
                                                        <img src="'.base_url('assets/img/'.$quien->genero.'.png').'" alt="" class="img-circle img-responsive">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
}

}
?>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
</div>


    <?php
    $this->load->view('bottom');
    ?>
