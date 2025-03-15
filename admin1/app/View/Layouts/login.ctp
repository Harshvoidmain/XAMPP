<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if lt IE 8]> <html> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]> <!DOCTYPE html> <![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Login Form</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <?php echo $this->Html->css(array('/bootstrap/css/bootstrap.min', '/bootstrap/css/bootstrap-responsive.min', '/font-awesome/css/font-awesome.min', 'style-metro', 'style', 'style-responsive', 'themes/default', '/uniform/css/uniform.default', 'pages/login-soft')); ?>
    <!-- END PAGE LEVEL STYLES -->
    <!--[if lte IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php
//    if (isIE() && isIE() < 11) {
//        echo $this->Html->css(array('all-ie'));
//    }
    ?>
        <link rel="icon" type="image/png" href="<?php echo $this->Html->url('/img/favicon1.ico'); ?>" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="login">
        <?php echo $this->Form->input('base', array('type' => 'hidden', 'value' => $this->Html->url('/'))) ?>
        <!-- BEGIN LOGO -->
        <div class="logo">
            <?php echo $this->Html->link($this->Html->image('logo-big.png'), 'http://www.eiosys.com/', array('escape' => FALSE)); ?>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <?php echo $this->Session->flash('auth'); ?>
            <?php echo $content_for_layout ?>
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            powered by <?php echo $this->Html->link($this->Html->image('logo-big.png'), 'http://www.eiosys.com/', array('escape' => FALSE)); ?>
        </div>
        <!-- END COPYRIGHT -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <?php echo $this->Html->script(array('jquery-1.8.3.min', 'jquery-migrate-1.2.1.min', '/jquery-ui/jquery-ui-1.10.1.custom.min', '/bootstrap/js/bootstrap.min',)) ?>
        <!--[if lt IE 9]>
        <?php echo $this->Html->script(array('excanvas.min', 'respond.min')) ?>
        <![endif]-->
        <?php echo $this->Html->script(array('/jquery-slimscroll/jquery.slimscroll.min', '/breakpoints/breakpoints', 'jquery.blockui.min', 'jquery.cookie.min', '/uniform/jquery.uniform.min')) ?>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php echo $this->Html->script(array('/jquery-validation/dist/jquery.validate.min', '/backstretch/jquery.backstretch.min')) ?>
        <!-- END PAGE LEVEL PLUGINS -->
        <!--[if lte IE 9]>
        <?php echo $this->Html->script(array('selectivizr-min')) ?>
        <![endif]-->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <?php echo $this->Html->script(array('app', 'login-soft')) ?>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
            jQuery(document).ready(function() {
                App.init();
                Login.init();
            });
        </script>
        <!-- END BODY -->
</html>