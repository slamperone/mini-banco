<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bancotote</title>

    <!-- Bootstrap core CSS -->

    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <link href="<?= base_url('assets/fonts/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/animate.min.css'); ?>" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/icheck/flat/green.css'); ?>" rel="stylesheet">


    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">
    <div class="">
        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                <img src="<?php echo base_url('assets/img/logo.png'); ?>">
                    <?php echo form_open('logeado'); ?>
                        <h1>Bienvenid@</h1>
                        <?php echo validation_errors(); ?>
                        <div>
                            <input type="text" class="form-control" placeholder="Correo" name="correo" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="PIN" name="pin" />
                        </div>
                        <div>
                        <input type="submit" class="btn btn-default submit" value="Entrar">
                            <!--a class="reset_pass" href="#">Lost your password?</a-->
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <p>© Bancotote <?= date('Y'); ?> </p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
                <?= "CI version: ".CI_VERSION; ?>
            </div>
        </div>
    </div>

</body>

</html>
