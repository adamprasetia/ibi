<!DOCTYPE html>
<html>
<head>
  <title><?php echo config_item('app_name') ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/jquery-ui-1.11.2/jquery-ui.min.css") ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/AdminLTE-2.3.3/bootstrap/css/bootstrap.min.css") ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css") ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/ionicons-2.0.1/css/ionicons.min.css") ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/AdminLTE-2.3.3/dist/css/AdminLTE.min.css") ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/AdminLTE-2.3.3/dist/css/skins/skin-black.min.css") ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-4.0.3/css/select2.min.css')?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css?v=2')?>"/>
  
  <script type="text/javascript" src="<?php echo base_url("assets/plugins/AdminLTE-2.3.3/plugins/jQuery/jQuery-2.2.0.min.js") ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/plugins/AdminLTE-2.3.3/plugins/slimScroll/jquery.slimscroll.min.js") ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/plugins/select2-4.0.3/js/select2.min.js')?>"/></script>
  <script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery-ui-1.11.2/jquery-ui.min.js") ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/plugins/AdminLTE-2.3.3/bootstrap/js/bootstrap.min.js") ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/plugins/AdminLTE-2.3.3/dist/js/app.min.js") ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/plugins/price_format_plugin.js')?>"/></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/general.js')?>"/></script>  
</head>
<body class="hold-transition <?php echo config_item('theme') ?> fixed sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="<?php echo base_url() ?>" class="logo">
      <span class="logo-mini"><b><?php echo config_item('app_alias') ?></b></span>
      <span class="logo-lg"><b><?php echo config_item('app_name') ?></b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $this->user_login['name'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <p>
                  <?php echo $this->user_login['name'] ?>
                  <small><?php echo $this->user_login['level_name'] ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <?php echo anchor('change_password',$this->lang->line('change_password'),array('class'=>'btn btn-default btn-flat')) ?>
                </div>
                <div class="pull-right">
                  <?php echo anchor('home/logout',$this->lang->line('logout'),array('class'=>'btn btn-default btn-flat')) ?>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <?php echo $this->menu ?>
    </section>
  </aside>

    <div class="content-wrapper">
        <?php echo $content ?>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            Version 1.0
        </div>
        <strong>Copyright &copy; 2017 <a href="#">Damzsoft</a>.</strong> All rights reserved.
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
<script type="text/javascript">
    $('li.active').parent().parent().addClass('active');
    $('li.active').parent().parent().parent().parent().addClass('active');
</script>     
</body>
</html>
