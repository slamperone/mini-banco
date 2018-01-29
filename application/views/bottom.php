    <!-- switchery -->
    <script src="<?php echo base_url('assets/js/switchery/switchery.min.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/switchery/switchery.min.css') ?>" />
<!-- validador -->
    <script src="<?php echo base_url('assets/js/validator/multi.js') ?>"></script>
<script src="<?php echo base_url('assets/js/validator/validator.js') ?>"></script>
    <script>
// initialize the validator function
        validator.message['date'] = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required')
            .on('keyup blur', 'input', function(){
                validator.checkField.apply( $(this).siblings().last()[0] );
            });

        // bind the validation to the form submit event
        //$('#send').click('submit');//.prop('disabled', true);

        $('form').submit(function(e){
            e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing
            if( !validator.checkAll( $(this) ) ){
                submit = false;
            }

            if( submit )
                this.submit();
            return false;
        });

    </script>

      <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

     <!-- bootstrap progress js -->
    <script src="<?php echo base_url('assets/js/progressbar/bootstrap-progressbar.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/nicescroll/jquery.nicescroll.min.js'); ?>"></script>

    <!-- icheck -->
    <script src="<?php echo base_url('assets/js/icheck/icheck.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>


  <!-- footer content -->

                <footer>
                    <div class="">
                        <p class="pull-right">BANCOTOTE <a href="develupme.com">develupme</a> &nbsp;
                            <span class="lead">  &copy; <?php echo date('Y'); ?></span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
            <!-- /page content -->
              <script>
        NProgress.done();
    </script>
    <!-- /datepicker -->
    <!-- /footer content -->
</body>

</html>