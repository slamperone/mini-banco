   <?php
   $this->load->view('top');
   #variable con los datos del usuario
   #$datosUsuario['nombre'];

   #link para salir
    #echo site_url('dashboard/logout');

   $this->load->view('sidebar');
   ?>
   <!-- page content -->
<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                        </div>


                    </div>
                    <div class="clearfix"></div>

                               <div class="row">
                       <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">


                                        <div class="clearfix"></div>
                                        <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?= $titulo ?></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                <!-- contenido aqui-->
                                <pre>
                                <?php print_r($datos); ?>

                                </pre>

</div>
</div>
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />


    <?php
    $this->load->view('bottom');
    ?>
