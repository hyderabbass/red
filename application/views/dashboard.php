 <?php $this->load->view("includes/header.php"); ?>
      <!-- BEGIN PAGE -->
      <div class="page-content">
         <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->               
         <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                     <h4 class="modal-title">Modal title</h4>
                  </div>
                  <div class="modal-body">
                     Widget settings form goes here
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn blue">Save changes</button>
                     <button type="button" class="btn default" data-dismiss="modal">Close</button>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->
         <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <!-- BEGIN STYLE CUSTOMIZER -->
         <div class="theme-panel hidden-xs hidden-sm">
            <div class="toggler"></div>
            <div class="toggler-close"></div>
            <div class="theme-options">
               <div class="theme-option theme-colors clearfix">
                  <span>THEME COLOR</span>
                  <ul>
                     <li class="color-black current color-default" data-style="default"></li>
                     <li class="color-blue" data-style="blue"></li>
                     <li class="color-brown" data-style="brown"></li>
                     <li class="color-purple" data-style="purple"></li>
                     <li class="color-grey" data-style="grey"></li>
                     <li class="color-white color-light" data-style="light"></li>
                  </ul>
               </div>
               <div class="theme-option">
                  <span>Layout</span>
                  <select class="layout-option form-control input-small">
                     <option value="fluid" selected="selected">Fluid</option>
                     <option value="boxed">Boxed</option>
                  </select>
               </div>
               <div class="theme-option">
                  <span>Header</span>
                  <select class="header-option form-control input-small">
                     <option value="fixed" selected="selected">Fixed</option>
                     <option value="default">Default</option>
                  </select>
               </div>
               <div class="theme-option">
                  <span>Sidebar</span>
                  <select class="sidebar-option form-control input-small">
                     <option value="fixed">Fixed</option>
                     <option value="default" selected="selected">Default</option>
                  </select>
               </div>
               <div class="theme-option">
                  <span>Footer</span>
                  <select class="footer-option form-control input-small">
                     <option value="fixed">Fixed</option>
                     <option value="default" selected="selected">Default</option>
                  </select>
               </div>
            </div>
         </div>
         <!-- END BEGIN STYLE CUSTOMIZER -->  
         <!-- BEGIN PAGE HEADER-->
         <div class="row">
            <div class="col-md-12">
               <!-- BEGIN PAGE TITLE & BREADCRUMB-->
               <h3 class="page-title">
                  Dashboard <small>statistics and more</small>
               </h3>
               <ul class="page-breadcrumb breadcrumb">
                  <li>
                     <i class="icon-home"></i>
                     <a href="index.html">Home</a> 
                     <i class="icon-angle-right"></i>
                  </li>
                  <li><a href="#">Dashboard</a></li>
                  <li class="pull-right">
                     <div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
                        <i class="icon-calendar"></i>
                        <span></span>
                        <i class="icon-angle-down"></i>
                     </div>
                  </li>
               </ul>
               <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
         </div>
         <!-- END PAGE HEADER-->
         <!-- BEGIN DASHBOARD STATS -->
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="dashboard-stat blue">
                  <div class="visual">
                     <i class="icon-comments"></i>
                  </div>
                  <div class="details">
                     <div class="number">
                        1349
                     </div>
                     <div class="desc">                           
                        Total Feedback
                     </div>
                  </div>
                               
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="dashboard-stat green">
                  <div class="visual">
                     <i class="icon-home"></i>
                  </div>
                  <div class="details">
                     <div class="number">549</div>
                     <div class="desc">Total Outlets</div>
                  </div>
                                
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="dashboard-stat purple">
                  <div class="visual">
                     <i class="icon-beer"></i>
                  </div>
                  <div class="details">
                     <div class="number">113</div>
                     <div class="desc">Total Products</div>
                  </div>
                             
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="dashboard-stat yellow">
                  <div class="visual">
                     <i class="icon-bar-chart"></i>
                  </div>
                  <div class="details">
                     <div class="number">12,5M$</div>
                     <div class="desc">Total Products</div>
                  </div>
                          
               </div>
            </div>
         </div>
         <!-- END DASHBOARD STATS -->

        
     
         <div class="clearfix"></div>
         <div class="row ">
             <div class="col-md-6 col-sm-6">
                 <div class="portlet box purple">
                     <div class="portlet-title">
                         <div class="caption"><i class="icon-calendar"></i>General Stats</div>
                         <div class="actions">
                             <a class="btn btn-sm yellow easy-pie-chart-reload" href="javascript:;"><i class="icon-repeat"></i> Reload</a>
                         </div>
                     </div>
                     <div class="portlet-body">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="easy-pie-chart">
                                     <div data-percent="55" class="number transactions easyPieChart" style="width: 75px; height: 75px; line-height: 75px;"><span>87</span>%<canvas height="75" width="75"></canvas></div>
                                     <a href="#" class="title">Transactions <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                             <div class="margin-bottom-10 visible-sm"></div>
                             <div class="col-md-4">
                                 <div class="easy-pie-chart">
                                     <div data-percent="85" class="number visits easyPieChart" style="width: 75px; height: 75px; line-height: 75px;"><span>95</span>%<canvas height="75" width="75"></canvas></div>
                                     <a href="#" class="title">New Visits <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                             <div class="margin-bottom-10 visible-sm"></div>
                             <div class="col-md-4">
                                 <div class="easy-pie-chart">
                                     <div data-percent="46" class="number bounce easyPieChart" style="width: 75px; height: 75px; line-height: 75px;"><span>24</span>%<canvas height="75" width="75"></canvas></div>
                                     <a href="#" class="title">Bounce <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-sm-6">
                 <div class="portlet box blue">
                     <div class="portlet-title">
                         <div class="caption"><i class="icon-calendar"></i>Server Stats</div>
                         <div class="tools">
                             <a class="collapse" href=""></a>
                             <a class="config" data-toggle="modal" href="#portlet-config"></a>
                             <a class="reload" href=""></a>
                             <a class="remove" href=""></a>
                         </div>
                     </div>
                     <div class="portlet-body">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="sparkline-chart">
                                     <div id="sparkline_bar" class="number"><canvas style="display: inline-block; width: 113px; height: 55px; vertical-align: top;" width="113" height="55"></canvas></div>
                                     <a href="#" class="title">Network <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                             <div class="margin-bottom-10 visible-sm"></div>
                             <div class="col-md-4">
                                 <div class="sparkline-chart">
                                     <div id="sparkline_bar2" class="number"><canvas style="display: inline-block; width: 107px; height: 55px; vertical-align: top;" width="107" height="55"></canvas></div>
                                     <a href="#" class="title">CPU Load <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                             <div class="margin-bottom-10 visible-sm"></div>
                             <div class="col-md-4">
                                 <div class="sparkline-chart">
                                     <div id="sparkline_line" class="number"><canvas style="display: inline-block; width: 100px; height: 55px; vertical-align: top;" width="100" height="55"></canvas></div>
                                     <a href="#" class="title">Load Rate <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>



         <div class="clearfix"></div>
         <div class="row ">
             <div class="col-md-6 col-sm-6">
                 <div class="portlet box purple">
                     <div class="portlet-title">
                         <div class="caption"><i class="icon-calendar"></i>General Stats</div>
                         <div class="actions">
                             <a class="btn btn-sm yellow easy-pie-chart-reload" href="javascript:;"><i class="icon-repeat"></i> Reload</a>
                         </div>
                     </div>
                     <div class="portlet-body">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="easy-pie-chart">
                                     <div data-percent="55" class="number transactions easyPieChart" style="width: 75px; height: 75px; line-height: 75px;"><span>87</span>%<canvas height="75" width="75"></canvas></div>
                                     <a href="#" class="title">Transactions <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                             <div class="margin-bottom-10 visible-sm"></div>
                             <div class="col-md-4">
                                 <div class="easy-pie-chart">
                                     <div data-percent="85" class="number visits easyPieChart" style="width: 75px; height: 75px; line-height: 75px;"><span>95</span>%<canvas height="75" width="75"></canvas></div>
                                     <a href="#" class="title">New Visits <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                             <div class="margin-bottom-10 visible-sm"></div>
                             <div class="col-md-4">
                                 <div class="easy-pie-chart">
                                     <div data-percent="46" class="number bounce easyPieChart" style="width: 75px; height: 75px; line-height: 75px;"><span>24</span>%<canvas height="75" width="75"></canvas></div>
                                     <a href="#" class="title">Bounce <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-sm-6">
                 <div class="portlet box blue">
                     <div class="portlet-title">
                         <div class="caption"><i class="icon-calendar"></i>Server Stats</div>
                         <div class="tools">
                             <a class="collapse" href=""></a>
                             <a class="config" data-toggle="modal" href="#portlet-config"></a>
                             <a class="reload" href=""></a>
                             <a class="remove" href=""></a>
                         </div>
                     </div>
                     <div class="portlet-body">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="sparkline-chart">
                                     <div id="sparkline_bar" class="number"><canvas style="display: inline-block; width: 113px; height: 55px; vertical-align: top;" width="113" height="55"></canvas></div>
                                     <a href="#" class="title">Network <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                             <div class="margin-bottom-10 visible-sm"></div>
                             <div class="col-md-4">
                                 <div class="sparkline-chart">
                                     <div id="sparkline_bar2" class="number"><canvas style="display: inline-block; width: 107px; height: 55px; vertical-align: top;" width="107" height="55"></canvas></div>
                                     <a href="#" class="title">CPU Load <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                             <div class="margin-bottom-10 visible-sm"></div>
                             <div class="col-md-4">
                                 <div class="sparkline-chart">
                                     <div id="sparkline_line" class="number"><canvas style="display: inline-block; width: 100px; height: 55px; vertical-align: top;" width="100" height="55"></canvas></div>
                                     <a href="#" class="title">Load Rate <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="clearfix"></div>
         <div class="row ">
             <div class="col-md-6 col-sm-6">
                 <div class="portlet box purple">
                     <div class="portlet-title">
                         <div class="caption"><i class="icon-calendar"></i>General Stats</div>
                         <div class="actions">
                             <a class="btn btn-sm yellow easy-pie-chart-reload" href="javascript:;"><i class="icon-repeat"></i> Reload</a>
                         </div>
                     </div>
                     <div class="portlet-body">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="easy-pie-chart">
                                     <div data-percent="55" class="number transactions easyPieChart" style="width: 75px; height: 75px; line-height: 75px;"><span>87</span>%<canvas height="75" width="75"></canvas></div>
                                     <a href="#" class="title">Transactions <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                             <div class="margin-bottom-10 visible-sm"></div>
                             <div class="col-md-4">
                                 <div class="easy-pie-chart">
                                     <div data-percent="85" class="number visits easyPieChart" style="width: 75px; height: 75px; line-height: 75px;"><span>95</span>%<canvas height="75" width="75"></canvas></div>
                                     <a href="#" class="title">New Visits <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                             <div class="margin-bottom-10 visible-sm"></div>
                             <div class="col-md-4">
                                 <div class="easy-pie-chart">
                                     <div data-percent="46" class="number bounce easyPieChart" style="width: 75px; height: 75px; line-height: 75px;"><span>24</span>%<canvas height="75" width="75"></canvas></div>
                                     <a href="#" class="title">Bounce <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-sm-6">
                 <div class="portlet box blue">
                     <div class="portlet-title">
                         <div class="caption"><i class="icon-calendar"></i>Server Stats</div>
                         <div class="tools">
                             <a class="collapse" href=""></a>
                             <a class="config" data-toggle="modal" href="#portlet-config"></a>
                             <a class="reload" href=""></a>
                             <a class="remove" href=""></a>
                         </div>
                     </div>
                     <div class="portlet-body">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="sparkline-chart">
                                     <div id="sparkline_bar" class="number"><canvas style="display: inline-block; width: 113px; height: 55px; vertical-align: top;" width="113" height="55"></canvas></div>
                                     <a href="#" class="title">Network <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                             <div class="margin-bottom-10 visible-sm"></div>
                             <div class="col-md-4">
                                 <div class="sparkline-chart">
                                     <div id="sparkline_bar2" class="number"><canvas style="display: inline-block; width: 107px; height: 55px; vertical-align: top;" width="107" height="55"></canvas></div>
                                     <a href="#" class="title">CPU Load <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                             <div class="margin-bottom-10 visible-sm"></div>
                             <div class="col-md-4">
                                 <div class="sparkline-chart">
                                     <div id="sparkline_line" class="number"><canvas style="display: inline-block; width: 100px; height: 55px; vertical-align: top;" width="100" height="55"></canvas></div>
                                     <a href="#" class="title">Load Rate <i class="m-icon-swapright"></i></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="clearfix"></div>
       <div class="row ">
            <div class="col-md-12 col-sm-12">
               <div class="portlet box purple">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-calendar"></i>General Stats</div>
                     <div class="actions">
                        <a class="btn btn-sm yellow easy-pie-chart-reload" href="javascript:;"><i class="icon-repeat"></i> Reload</a>
                     </div>
                  </div>
                  <div class="portlet-body">
                     <div class="row">
                   
                       
                     </div>
                  </div>
               </div>
            </div>
     
         </div>
</div>
      <!-- END PAGE -->

 <?php $this->load->view("includes/footer.php"); ?>