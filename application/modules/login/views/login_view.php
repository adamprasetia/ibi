<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo config_item('app_name') ?> | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/AdminLTE-2.3.3') ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/plugins/ionicons-2.0.1/css/ionicons.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/AdminLTE-2.3.3') ?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/AdminLTE-2.3.3') ?>/plugins/iCheck/square/blue.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <img src="<?php echo base_url('assets/img/logo.png'); ?>" class="img-responsive center-block" width="200">
    <div class="login-logo">
        <h3><b><?php echo config_item('app_name') ?></b></h3>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg"><?php echo $this->lang->line('login_quote') ?></p>
        <?php echo validation_errors() ?>
        <?php echo form_open('login') ?>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('username') ?>" name="username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('password') ?>" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <div class="col-xs-4">
                <button type="submit" class="btn btn-default btn-block btn-flat"><?php echo $this->lang->line('login') ?></button>
                </div>
            </div>
        <?php echo form_close() ?>      
    </div>
</div>
<script src="<?php echo base_url('assets/plugins/AdminLTE-2.3.3') ?>/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="<?php echo base_url('assets/plugins/AdminLTE-2.3.3') ?>/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
