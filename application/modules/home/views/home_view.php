<link href="<?php echo base_url('assets/plugins/AdminLTE-2.3.3/plugins/morris/morris.css'); ?>" type="text/css" rel="stylesheet"/>
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $kta ?></h3>
        <p>Bidan Punya KTA</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
      <a href="<?php echo site_url('bidan?kta=1') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
    <div class="inner">
      <h3><?php echo $str ?></h3>
      <p>Bidan Punya STR</p>
    </div>
    <div class="icon">
      <i class="ion ion-person"></i>
    </div>
    <a href="<?php echo site_url('bidan?str=1') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
    <div class="inner">
      <h3><?php echo $sipb_p ?></h3>
      <p>Bidan Punya SIPB P</p>
    </div>
    <div class="icon">
      <i class="ion ion-person"></i>
    </div>
    <a href="<?php echo site_url('bidan?sipb_p=1') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
    <div class="inner">
      <h3><?php echo $sipb_m ?></h3>
      <p>Bidan Punya SIPB M</p>
    </div>
    <div class="icon">
      <i class="ion ion-person"></i>
    </div>
    <a href="<?php echo site_url('bidan?sipb_m=1') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>  
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Wilayah</h3>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="chart-wilayah" style="height: 300px;"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">KTA</h3>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="chart-kta" style="height: 300px;"></div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">STR</h3>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="chart-str" style="height: 300px;"></div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">SIPB P</h3>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="chart-sipb-p" style="height: 300px;"></div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">SIPB M</h3>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="chart-sipb-m" style="height: 300px;"></div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url('assets/plugins/AdminLTE-2.3.3/plugins/morris/raphael-min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/AdminLTE-2.3.3/plugins/morris/morris.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){   
  $.ajax({
    url: '<?php echo site_url('home/wilayah') ?>',
    dataType: "json",
    success: function(str) {    
      Morris.Bar({  
        element: 'chart-wilayah',
        resize: true,
        data: str,
        xkey: 'name',
        ykeys: ['kta','str','sipb_p','sipb_m'],
        labels: ['KTA','STR','SIPB P','SIPB M'],
        barColors: ["#3c8dbc", "#f56954","#00a65a","#f39c12"],
        hideHover: 'auto'
      });  
    }   
  });   
  $.ajax({
    url: '<?php echo site_url('home/kta') ?>',
    dataType: "json",
    success: function(str) {    
      Morris.Donut({  
        element: 'chart-kta',
        resize: true,
        data: str,
        colors: ["#3c8dbc", "#f56954"],
        hideHover: 'auto'
      });  
    }   
  });   
  $.ajax({
    url: '<?php echo site_url('home/str') ?>',
    dataType: "json",
    success: function(str) {    
      Morris.Donut({  
        element: 'chart-str',
        resize: true,
        data: str,
        colors: ["#3c8dbc", "#f56954"],
        hideHover: 'auto'
      });  
    }   
  });   
  $.ajax({
    url: '<?php echo site_url('home/sipb_p') ?>',
    dataType: "json",
    success: function(str) {    
      Morris.Donut({  
        element: 'chart-sipb-p',
        resize: true,
        data: str,
        colors: ["#3c8dbc", "#f56954"],
        hideHover: 'auto'
      });  
    }   
  });   
  $.ajax({
    url: '<?php echo site_url('home/sipb_m') ?>',
    dataType: "json",
    success: function(str) {
      Morris.Donut({
        element: 'chart-sipb-m',
        resize: true,
        data: str,
        colors: ["#3c8dbc", "#f56954"],
        hideHover: 'auto'
      });
    }
  });
});
</script>
