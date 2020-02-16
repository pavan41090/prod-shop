<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <!-- END THEME PANEL -->
      <h3 class="page-title">Leads
      </h3>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-home"></i>
               <a href="index.html">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="#">Leads</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <!--<li>
               <span>Page Layouts</span>
               </li>-->
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div ng-controller="MainCtrl">
         <div class="row">
            <div class="col-md-6 col-xs-12 col-sm-6">
               <div class="row">
                  <div class="col-md-1 col-xs-1">&nbsp;</div>
                  
                 <?php  if($userTypeAbbr == 'hdfc_av' || $userTypeAbbr == 'admin') { ?>  
                  <div class="col-md-4 col-xs-4 quotesbtn">
                     <a href="lms-car">
                        <div class="row">
                           <div class="col-md-8 col-xs-8">Create Lead</div>
                           <div class="col-md-4 col-xs-4 plusbtn">+</div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-1 col-xs-1">&nbsp;</div>
                  <?php } ?>

                  <?php  if($userTypeAbbr == 'bagi_av' || $userTypeAbbr == 'admin') { ?>  
                  <div class="col-md-4 col-xs-4 quotesbtn">
                     <a href="#">
                        <div class="row">
                           <div class="col-md-8 col-xs-8">Update Lead </div>
                           <div class="col-md-4 col-xs-4 plusbtn">+</div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-1">&nbsp;</div>
                  <?php  } ?>

               </div>
               <div class="row belowbtn">
                  <?php  if($userTypeAbbr == 'supervisor' || $userTypeAbbr == 'admin') { ?>  
                  <div class="col-md-1 col-xs-1">&nbsp;</div>
                     <div class="col-md-4 col-xs-4 quotesbtn">
                     <a href="<?php echo base_url();?>lead-list">
                        <div class="row">
                           <div class="col-md-8 col-xs-8">Approve Lead</div>
                           <div class="col-md-4 col-xs-4 plusbtn">+</div>
                        </div>
                     </a>
                  </div>
                  <?php } ?>
                   <?php  if($userTypeAbbr == 'hdfc_ops' || $userTypeAbbr == 'bagi_ops' || $userTypeAbbr == 'admin') { ?>  
                  <div class="col-md-1 col-xs-1">&nbsp;</div>
                  <div class="col-md-4 col-xs-4 quotesbtn" >
                     <a href="#">
                        <div class="row">
                           <div class="col-md-8 col-xs-8">Download Report</div>
                           <div class="col-md-4 col-xs-4 plusbtn">+</div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-1">&nbsp;</div>
                   <?php }   ?>
               </div>
              
            </div>

            <div>&nbsp;</div>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <!-- BEGIN PORTLET-->
               <div class="portlet light ">
                  <div class="portlet-title tabbable-line">
                     <div class="caption">
                        <i class="icon-globe font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase">Notifications</span>
                     </div>
                     <span class="label label-sm label-danger circle">3</span>
                  </div>
                  <div class="portlet-body">
                     <!--BEGIN TABS-->
                     <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                           <div class="scroller"  data-always-visible="1" data-rail-visible="0">
                              <ul class="feeds">
                                 <li>
                                    <div class="col1">
                                       <div class="cont">
                                          <div class="cont-col1">
                                             <div class="label label-sm label-success">
                                                <i class="fa fa-bell-o"></i>
                                             </div>
                                          </div>
                                          <div class="cont-col2">
                                             <div class="desc"> Lorem Ipsum is simply dummy text of the printing
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="col1">
                                       <div class="cont">
                                          <div class="cont-col1">
                                             <div class="label label-sm label-danger">
                                                <i class="fa fa-bolt"></i>
                                             </div>
                                          </div>
                                          <div class="cont-col2">
                                             <div class="desc"> Lorem Ipsum is simply dummy text of the printing
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="col1">
                                       <div class="cont">
                                          <div class="cont-col1">
                                             <div class="label label-sm label-info">
                                                <i class="fa fa-bullhorn"></i>
                                             </div>
                                          </div>
                                          <div class="cont-col2">
                                             <div class="desc"> Lorem Ipsum is simply dummy text of the printing
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="col1">
                                       <div class="cont">
                                          <div class="cont-col1">
                                             <div class="label label-sm label-warning">
                                                <i class="fa fa-plus"></i>
                                             </div>
                                          </div>
                                          <div class="cont-col2">
                                             <div class="desc"> Lorem Ipsum is simply dummy text of the printing
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="col1">
                                       <div class="cont">
                                          <div class="cont-col1">
                                             <div class="label label-sm label-success">
                                                <i class="fa fa-bell-o"></i>
                                             </div>
                                          </div>
                                          <div class="cont-col2">
                                             <div class="desc"> Lorem Ipsum is simply dummy text of the printing
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="col1">
                                       <div class="cont">
                                          <div class="cont-col1">
                                             <div class="label label-sm label-default">
                                                <i class="fa fa-bullhorn"></i>
                                             </div>
                                          </div>
                                          <div class="cont-col2">
                                             <div class="desc"> Lorem Ipsum is simply dummy text of the printing
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="col1">
                                       <div class="cont">
                                          <div class="cont-col1">
                                             <div class="label label-sm label-warning">
                                                <i class="fa fa-bullhorn"></i>
                                             </div>
                                          </div>
                                          <div class="cont-col2">
                                             <div class="desc"> Lorem Ipsum is simply dummy text of the printing
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                
                              </ul>
                           </div>
                        </div>
                        <div class="tab-pane" id="tab_1_2">
                           <div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
                              <ul class="feeds">
                                 <li>
                                    <a href="javascript:;">
                                       <div class="col1">
                                          <div class="cont">
                                             <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                   <i class="fa fa-bell-o"></i>
                                                </div>
                                             </div>
                                             <div class="cont-col2">
                                                <div class="desc"> New user registered </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col2">
                                          <div class="date"> Just now </div>
                                       </div>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:;">
                                       <div class="col1">
                                          <div class="cont">
                                             <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                   <i class="fa fa-bell-o"></i>
                                                </div>
                                             </div>
                                             <div class="cont-col2">
                                                <div class="desc"> New order received </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col2">
                                          <div class="date"> 10 mins </div>
                                       </div>
                                    </a>
                                 </li>
                                 <li>
                                    <div class="col1">
                                       <div class="cont">
                                          <div class="cont-col1">
                                             <div class="label label-sm label-danger">
                                                <i class="fa fa-bolt"></i>
                                             </div>
                                          </div>
                                          <div class="cont-col2">
                                             <div class="desc"> Order #24DOP4 has been rejected.
                                                <span class="label label-sm label-danger "> Take action
                                                <i class="fa fa-share"></i>
                                                </span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col2">
                                       <div class="date"> 24 mins </div>
                                    </div>
                                 </li>
                                 <li>
                                    <a href="javascript:;">
                                       <div class="col1">
                                          <div class="cont">
                                             <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                   <i class="fa fa-bell-o"></i>
                                                </div>
                                             </div>
                                             <div class="cont-col2">
                                                <div class="desc"> New user registered </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col2">
                                          <div class="date"> Just now </div>
                                       </div>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:;">
                                       <div class="col1">
                                          <div class="cont">
                                             <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                   <i class="fa fa-bell-o"></i>
                                                </div>
                                             </div>
                                             <div class="cont-col2">
                                                <div class="desc"> New user registered </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col2">
                                          <div class="date"> Just now </div>
                                       </div>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:;">
                                       <div class="col1">
                                          <div class="cont">
                                             <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                   <i class="fa fa-bell-o"></i>
                                                </div>
                                             </div>
                                             <div class="cont-col2">
                                                <div class="desc"> New user registered </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col2">
                                          <div class="date"> Just now </div>
                                       </div>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:;">
                                       <div class="col1">
                                          <div class="cont">
                                             <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                   <i class="fa fa-bell-o"></i>
                                                </div>
                                             </div>
                                             <div class="cont-col2">
                                                <div class="desc"> New user registered </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col2">
                                          <div class="date"> Just now </div>
                                       </div>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:;">
                                       <div class="col1">
                                          <div class="cont">
                                             <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                   <i class="fa fa-bell-o"></i>
                                                </div>
                                             </div>
                                             <div class="cont-col2">
                                                <div class="desc"> New user registered </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col2">
                                          <div class="date"> Just now </div>
                                       </div>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:;">
                                       <div class="col1">
                                          <div class="cont">
                                             <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                   <i class="fa fa-bell-o"></i>
                                                </div>
                                             </div>
                                             <div class="cont-col2">
                                                <div class="desc"> New user registered </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col2">
                                          <div class="date"> Just now </div>
                                       </div>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:;">
                                       <div class="col1">
                                          <div class="cont">
                                             <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                   <i class="fa fa-bell-o"></i>
                                                </div>
                                             </div>
                                             <div class="cont-col2">
                                                <div class="desc"> New user registered </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col2">
                                          <div class="date"> Just now </div>
                                       </div>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <!--END TABS-->
                  </div>
               </div>
               <!-- END PORTLET-->
            </div>
         </div>
      </div>
      <!--<div class="note note-info">
         <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
         </div>-->
   </div>
   <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler">
<i class="icon-login"></i>
</a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
   <div class="page-quick-sidebar">
      <ul class="nav nav-tabs">
         <li class="active">
            <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
            <span class="badge badge-danger">2</span>
            </a>
         </li>
         <li>
            <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
            <span class="badge badge-success">7</span>
            </a>
         </li>
         <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
            <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-right">
               <li>
                  <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                  <i class="icon-bell"></i> Alerts </a>
               </li>
               <li>
                  <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                  <i class="icon-info"></i> Notifications </a>
               </li>
               <li>
                  <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                  <i class="icon-speech"></i> Activities </a>
               </li>
               <li class="divider"></li>
               <li>
                  <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                  <i class="icon-settings"></i> Settings </a>
               </li>
            </ul>
         </li>
      </ul>
      <div class="tab-content">
         <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
            <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
               <h3 class="list-heading">Staff</h3>
               <ul class="media-list list-items">
                  <li class="media">
                     <div class="media-status">
                        <span class="badge badge-success">8</span>
                     </div>
                     <img class="media-object" src="images/avatar3.jpg" alt="...">
                     <div class="media-body">
                        <h4 class="media-heading">Bob Nilson</h4>
                        <div class="media-heading-sub"> Project Manager </div>
                     </div>
                  </li>
                  <li class="media">
                     <img class="media-object" src="images/avatar1.jpg" alt="...">
                     <div class="media-body">
                        <h4 class="media-heading">Nick Larson</h4>
                        <div class="media-heading-sub"> Art Director </div>
                     </div>
                  </li>
                  <li class="media">
                     <div class="media-status">
                        <span class="badge badge-danger">3</span>
                     </div>
                     <img class="media-object" src="images/avatar4.jpg" alt="...">
                     <div class="media-body">
                        <h4 class="media-heading">Deon Hubert</h4>
                        <div class="media-heading-sub"> CTO </div>
                     </div>
                  </li>
                  <li class="media">
                     <img class="media-object" src="images/avatar2.jpg" alt="...">
                     <div class="media-body">
                        <h4 class="media-heading">Ella Wong</h4>
                        <div class="media-heading-sub"> CEO </div>
                     </div>
                  </li>
               </ul>
               <h3 class="list-heading">Customers</h3>
               <ul class="media-list list-items">
                  <li class="media">
                     <div class="media-status">
                        <span class="badge badge-warning">2</span>
                     </div>
                     <img class="media-object" src="images/avatar6.jpg" alt="...">
                     <div class="media-body">
                        <h4 class="media-heading">Lara Kunis</h4>
                        <div class="media-heading-sub"> CEO, Loop Inc </div>
                        <div class="media-heading-small"> Last seen 03:10 AM </div>
                     </div>
                  </li>
                  <li class="media">
                     <div class="media-status">
                        <span class="label label-sm label-success">new</span>
                     </div>
                     <img class="media-object" src="images/avatar7.jpg" alt="...">
                     <div class="media-body">
                        <h4 class="media-heading">Ernie Kyllonen</h4>
                        <div class="media-heading-sub"> Project Manager,
                           <br> SmartBizz PTL 
                        </div>
                     </div>
                  </li>
                  <li class="media">
                     <img class="media-object" src="images/avatar8.jpg" alt="...">
                     <div class="media-body">
                        <h4 class="media-heading">Lisa Stone</h4>
                        <div class="media-heading-sub"> CTO, Keort Inc </div>
                        <div class="media-heading-small"> Last seen 13:10 PM </div>
                     </div>
                  </li>
                  <li class="media">
                     <div class="media-status">
                        <span class="badge badge-success">7</span>
                     </div>
                     <img class="media-object" src="images/avatar9.jpg" alt="...">
                     <div class="media-body">
                        <h4 class="media-heading">Deon Portalatin</h4>
                        <div class="media-heading-sub"> CFO, H&D LTD </div>
                     </div>
                  </li>
                  <li class="media">
                     <img class="media-object" src="images/avatar10.jpg" alt="...">
                     <div class="media-body">
                        <h4 class="media-heading">Irina Savikova</h4>
                        <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                     </div>
                  </li>
                  <li class="media">
                     <div class="media-status">
                        <span class="badge badge-danger">4</span>
                     </div>
                     <img class="media-object" src="images/avatar11.jpg" alt="...">
                     <div class="media-body">
                        <h4 class="media-heading">Maria Gomez</h4>
                        <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                        <div class="media-heading-small"> Last seen 03:10 AM </div>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="page-quick-sidebar-item">
               <div class="page-quick-sidebar-chat-user">
                  <div class="page-quick-sidebar-nav">
                     <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                     <i class="icon-arrow-left"></i>Back</a>
                  </div>
                  <div class="page-quick-sidebar-chat-user-messages">
                     <div class="post out">
                        <img class="avatar" alt="" src="images/avatar3.jpg" />
                        <div class="message">
                           <span class="arrow"></span>
                           <a href="javascript:;" class="name">Bob Nilson</a>
                           <span class="datetime">20:15</span>
                           <span class="body"> When could you send me the report ? </span>
                        </div>
                     </div>
                     <div class="post in">
                        <img class="avatar" alt="" src="images/avatar2.jpg" />
                        <div class="message">
                           <span class="arrow"></span>
                           <a href="javascript:;" class="name">Ella Wong</a>
                           <span class="datetime">20:15</span>
                           <span class="body"> Its almost done. I will be sending it shortly </span>
                        </div>
                     </div>
                     <div class="post out">
                        <img class="avatar" alt="" src="images/avatar3.jpg" />
                        <div class="message">
                           <span class="arrow"></span>
                           <a href="javascript:;" class="name">Bob Nilson</a>
                           <span class="datetime">20:15</span>
                           <span class="body"> Alright. Thanks! :) </span>
                        </div>
                     </div>
                     <div class="post in">
                        <img class="avatar" alt="" src="images/avatar2.jpg" />
                        <div class="message">
                           <span class="arrow"></span>
                           <a href="javascript:;" class="name">Ella Wong</a>
                           <span class="datetime">20:16</span>
                           <span class="body"> You are most welcome. Sorry for the delay. </span>
                        </div>
                     </div>
                     <div class="post out">
                        <img class="avatar" alt="" src="images/avatar3.jpg" />
                        <div class="message">
                           <span class="arrow"></span>
                           <a href="javascript:;" class="name">Bob Nilson</a>
                           <span class="datetime">20:17</span>
                           <span class="body"> No probs. Just take your time :) </span>
                        </div>
                     </div>
                     <div class="post in">
                        <img class="avatar" alt="" src="images/avatar2.jpg" />
                        <div class="message">
                           <span class="arrow"></span>
                           <a href="javascript:;" class="name">Ella Wong</a>
                           <span class="datetime">20:40</span>
                           <span class="body"> Alright. I just emailed it to you. </span>
                        </div>
                     </div>
                     <div class="post out">
                        <img class="avatar" alt="" src="images/avatar3.jpg" />
                        <div class="message">
                           <span class="arrow"></span>
                           <a href="javascript:;" class="name">Bob Nilson</a>
                           <span class="datetime">20:17</span>
                           <span class="body"> Great! Thanks. Will check it right away. </span>
                        </div>
                     </div>
                     <div class="post in">
                        <img class="avatar" alt="" src="images/avatar2.jpg" />
                        <div class="message">
                           <span class="arrow"></span>
                           <a href="javascript:;" class="name">Ella Wong</a>
                           <span class="datetime">20:40</span>
                           <span class="body"> Please let me know if you have any comment. </span>
                        </div>
                     </div>
                     <div class="post out">
                        <img class="avatar" alt="" src="images/avatar3.jpg" />
                        <div class="message">
                           <span class="arrow"></span>
                           <a href="javascript:;" class="name">Bob Nilson</a>
                           <span class="datetime">20:17</span>
                           <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                        </div>
                     </div>
                  </div>
                  <div class="page-quick-sidebar-chat-user-form">
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type a message here...">
                        <div class="input-group-btn">
                           <button type="button" class="btn green">
                           <i class="icon-paper-clip"></i>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
            <div class="page-quick-sidebar-alerts-list">
               <h3 class="list-heading">General</h3>
               <ul class="feeds list-items">
                  <li>
                     <div class="col1">
                        <div class="cont">
                           <div class="cont-col1">
                              <div class="label label-sm label-info">
                                 <i class="fa fa-check"></i>
                              </div>
                           </div>
                           <div class="cont-col2">
                              <div class="desc"> You have 4 pending tasks.
                                 <span class="label label-sm label-warning "> Take action
                                 <i class="fa fa-share"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col2">
                        <div class="date"> Just now </div>
                     </div>
                  </li>
                  <li>
                     <a href="javascript:;">
                        <div class="col1">
                           <div class="cont">
                              <div class="cont-col1">
                                 <div class="label label-sm label-success">
                                    <i class="fa fa-bar-chart-o"></i>
                                 </div>
                              </div>
                              <div class="cont-col2">
                                 <div class="desc"> Finance Report for year 2013 has been released. </div>
                              </div>
                           </div>
                        </div>
                        <div class="col2">
                           <div class="date"> 20 mins </div>
                        </div>
                     </a>
                  </li>
                  <li>
                     <div class="col1">
                        <div class="cont">
                           <div class="cont-col1">
                              <div class="label label-sm label-danger">
                                 <i class="fa fa-user"></i>
                              </div>
                           </div>
                           <div class="cont-col2">
                              <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                           </div>
                        </div>
                     </div>
                     <div class="col2">
                        <div class="date"> 24 mins </div>
                     </div>
                  </li>
                  <li>
                     <div class="col1">
                        <div class="cont">
                           <div class="cont-col1">
                              <div class="label label-sm label-info">
                                 <i class="fa fa-shopping-cart"></i>
                              </div>
                           </div>
                           <div class="cont-col2">
                              <div class="desc"> New order received with
                                 <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col2">
                        <div class="date"> 30 mins </div>
                     </div>
                  </li>
                  <li>
                     <div class="col1">
                        <div class="cont">
                           <div class="cont-col1">
                              <div class="label label-sm label-success">
                                 <i class="fa fa-user"></i>
                              </div>
                           </div>
                           <div class="cont-col2">
                              <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                           </div>
                        </div>
                     </div>
                     <div class="col2">
                        <div class="date"> 24 mins </div>
                     </div>
                  </li>
                  <li>
                     <div class="col1">
                        <div class="cont">
                           <div class="cont-col1">
                              <div class="label label-sm label-info">
                                 <i class="fa fa-bell-o"></i>
                              </div>
                           </div>
                           <div class="cont-col2">
                              <div class="desc"> Web server hardware needs to be upgraded.
                                 <span class="label label-sm label-warning"> Overdue </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col2">
                        <div class="date"> 2 hours </div>
                     </div>
                  </li>
                  <li>
                     <a href="javascript:;">
                        <div class="col1">
                           <div class="cont">
                              <div class="cont-col1">
                                 <div class="label label-sm label-default">
                                    <i class="fa fa-briefcase"></i>
                                 </div>
                              </div>
                              <div class="cont-col2">
                                 <div class="desc"> IPO Report for year 2013 has been released. </div>
                              </div>
                           </div>
                        </div>
                        <div class="col2">
                           <div class="date"> 20 mins </div>
                        </div>
                     </a>
                  </li>
               </ul>
               <h3 class="list-heading">System</h3>
               <ul class="feeds list-items">
                  <li>
                     <div class="col1">
                        <div class="cont">
                           <div class="cont-col1">
                              <div class="label label-sm label-info">
                                 <i class="fa fa-check"></i>
                              </div>
                           </div>
                           <div class="cont-col2">
                              <div class="desc"> You have 4 pending tasks.
                                 <span class="label label-sm label-warning "> Take action
                                 <i class="fa fa-share"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col2">
                        <div class="date"> Just now </div>
                     </div>
                  </li>
                  <li>
                     <a href="javascript:;">
                        <div class="col1">
                           <div class="cont">
                              <div class="cont-col1">
                                 <div class="label label-sm label-danger">
                                    <i class="fa fa-bar-chart-o"></i>
                                 </div>
                              </div>
                              <div class="cont-col2">
                                 <div class="desc"> Finance Report for year 2013 has been released. </div>
                              </div>
                           </div>
                        </div>
                        <div class="col2">
                           <div class="date"> 20 mins </div>
                        </div>
                     </a>
                  </li>
                  <li>
                     <div class="col1">
                        <div class="cont">
                           <div class="cont-col1">
                              <div class="label label-sm label-default">
                                 <i class="fa fa-user"></i>
                              </div>
                           </div>
                           <div class="cont-col2">
                              <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                           </div>
                        </div>
                     </div>
                     <div class="col2">
                        <div class="date"> 24 mins </div>
                     </div>
                  </li>
                  <li>
                     <div class="col1">
                        <div class="cont">
                           <div class="cont-col1">
                              <div class="label label-sm label-info">
                                 <i class="fa fa-shopping-cart"></i>
                              </div>
                           </div>
                           <div class="cont-col2">
                              <div class="desc"> New order received with
                                 <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col2">
                        <div class="date"> 30 mins </div>
                     </div>
                  </li>
                  <li>
                     <div class="col1">
                        <div class="cont">
                           <div class="cont-col1">
                              <div class="label label-sm label-success">
                                 <i class="fa fa-user"></i>
                              </div>
                           </div>
                           <div class="cont-col2">
                              <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                           </div>
                        </div>
                     </div>
                     <div class="col2">
                        <div class="date"> 24 mins </div>
                     </div>
                  </li>
                  <li>
                     <div class="col1">
                        <div class="cont">
                           <div class="cont-col1">
                              <div class="label label-sm label-warning">
                                 <i class="fa fa-bell-o"></i>
                              </div>
                           </div>
                           <div class="cont-col2">
                              <div class="desc"> Web server hardware needs to be upgraded.
                                 <span class="label label-sm label-default "> Overdue </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col2">
                        <div class="date"> 2 hours </div>
                     </div>
                  </li>
                  <li>
                     <a href="javascript:;">
                        <div class="col1">
                           <div class="cont">
                              <div class="cont-col1">
                                 <div class="label label-sm label-info">
                                    <i class="fa fa-briefcase"></i>
                                 </div>
                              </div>
                              <div class="cont-col2">
                                 <div class="desc"> IPO Report for year 2013 has been released. </div>
                              </div>
                           </div>
                        </div>
                        <div class="col2">
                           <div class="date"> 20 mins </div>
                        </div>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
            <div class="page-quick-sidebar-settings-list">
               <h3 class="list-heading">General Settings</h3>
               <ul class="list-items borderless">
                  <li> Enable Notifications
                     <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> 
                  </li>
                  <li> Allow Tracking
                     <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> 
                  </li>
                  <li> Log Errors
                     <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> 
                  </li>
                  <li> Auto Sumbit Issues
                     <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> 
                  </li>
                  <li> Enable SMS Alerts
                     <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> 
                  </li>
               </ul>
               <h3 class="list-heading">System Settings</h3>
               <ul class="list-items borderless">
                  <li>
                     Security Level
                     <select class="form-control input-inline input-sm input-small">
                        <option value="1">Normal</option>
                        <option value="2" selected>Medium</option>
                        <option value="e">High</option>
                     </select>
                  </li>
                  <li> Failed Email Attempts
                     <input class="form-control input-inline input-sm input-small" value="5" /> 
                  </li>
                  <li> Secondary SMTP Port
                     <input class="form-control input-inline input-sm input-small" value="3560" /> 
                  </li>
                  <li> Notify On System Error
                     <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> 
                  </li>
                  <li> Notify On SMTP Error
                     <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> 
                  </li>
               </ul>
               <div class="inner-content">
                  <button class="btn btn-success">
                  <i class="icon-settings"></i> Save Changes</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- END QUICK SIDEBAR -->