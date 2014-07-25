   

   </div>

   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->

   <div class="footer" >

      <div class="footer-inner">

         <?php echo date("Y"); ?> &copy; <?php  app_name() ?> - Made with <span class="icon-heart" style="color:#FE0002;font-size:11px;"></span> by <a target="_blank" href="http://storm-edge.com">StormEdge</a>

      </div>

      <div class="footer-tools">

         <span class="go-top">

         <i class="icon-angle-up"></i>

         </span>

      </div>

   </div>

   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

   <!-- BEGIN CORE PLUGINS -->   

   <!--[if lt IE 9]>

   <script src="assets/plugins/respond.min.js"></script>

   <script src="assets/plugins/excanvas.min.js"></script> 

   <![endif]-->   

   <script src="<?php  echo asset_url();?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>   

   <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

   <script src="<?php  echo asset_url();?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>

   <script src="<?php  echo asset_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  

   <script src="<?php  echo asset_url();?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>

   <!-- END CORE PLUGINS -->

   <!-- BEGIN PAGE LEVEL PLUGINS -->

   <script src="<?php  echo asset_url();?>assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>   

   <script src="<?php  echo asset_url();?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>  

   <script src="<?php  echo asset_url();?>assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>     

   <script src="<?php  echo asset_url();?>assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>

   <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->

   <script src="<?php  echo asset_url();?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>  

   <!-- END PAGE LEVEL PLUGINS -->

   <!-- BEGIN PAGE LEVEL SCRIPTS -->

   <script src="<?php  echo asset_url();?>assets/scripts/app.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/scripts/index.js" type="text/javascript"></script>

   <script src="<?php  echo asset_url();?>assets/scripts/tasks.js" type="text/javascript"></script>        

   <!-- END PAGE LEVEL SCRIPTS -->  



 <!-- BEGIN Highcharts SCRIPTS -->

   

<script src="<?php  echo asset_url();?>assets/plugins/highcharts/js/highcharts.js" type="text/javascript"></script>     

<script src="<?php  echo asset_url();?>assets/plugins/highcharts/js/modules/exporting.js" type="text/javascript"></script> 

   <!-- END Highcharts SCRIPTS -->  

   <script>

      jQuery(document).ready(function() {    

         App.init(); // initlayout and core plugins

         Index.init();

         Index.initJQVMAP(); // init index page's custom scripts

         Index.initCalendar(); // init index page's custom scripts

         Index.initCharts(); // init index page's custom scripts

         Index.initChat();

         Index.initMiniCharts();

         Index.initDashboardDaterange();

         Index.initIntro();

         Tasks.initDashboardWidget();

$( "a.easy-pie-chart-reload" ).on( "click", function() {
location.reload();
});



      });

   </script>

   <!-- END JAVASCRIPTS -->







         <script type="text/javascript">

<?php echo $js; ?>



      </script>

</body>

<!-- END BODY -->

</html>