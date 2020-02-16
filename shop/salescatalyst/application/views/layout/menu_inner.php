<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            
            <li class="nav-item start " id="nav_dashboard">
			
				<?php
				$dashboard = 'lms-lead-list';
				if($this->uri->segment(1) == ''){
					$dashboard = 'lms-lead-list';
				}
				if($this->uri->segment(1) == 'lms-lead-download'){
					$dashboard = 'lms-lead-download';
				}
				?>
                <a href="<?php echo base_url();?><?php echo $dashboard; ?>" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="arrow"></span>
                </a>
                
            </li>

             <li class="nav-item" id="nav_leads">
                <?php if($this->session->userdata('user_type_abbr') == 'hdfc_av') { ?>
                    <a href="<?php echo base_url();?>lms-car" class="nav-link nav-toggle">
                  <?php } else { ?> 
                    <a href="<?php echo base_url();?><?php echo $dashboard; ?>" class="nav-link nav-toggle">
                  <?php } ?>
              
                    <i class="icon-diamond"></i>
                    <span class="title">LMS</span>
                    <span class="arrow"></span>
                </a>
                
            </li>

           <!--  <li class="nav-item" id="nav_leads">
                <a href="<?php // echo base_url();?>leads" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Leads</span>
                    <span class="arrow"></span>
                </a>
                
            </li>
            <li class="nav-item" id="nav_Quote">
            <a href="<?php // echo base_url();?>create-quote-car" class="nav-link nav-toggle">  
            
                    <i class="icon-puzzle"></i>
                    <span class="title">Quotes</span>
                    <span class="arrow"></span>
                </a>
                
            </li> -->
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Calendar</span>
                    <span class="arrow"></span>
                </a>
                
            </li>
            <!--<li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-bulb"></i>
                    <span class="title">Notifications</span>
                    <span class="arrow"></span>
                </a>
                
            </li>
          -->
            <li class="nav-item" id="nav_account">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">Account</span>
                    <span class="arrow"></span>
                </a>
                
            </li>

            <li class="nav-item" id="nav_account">
                <a href="<?php echo base_url('motor-dashboard')?>" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">Motor Dashboard</span>
                    <span class="arrow"></span>
                </a>
                
            </li>
            
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>



<script type="text/javascript">
   
   $(document).ready(function() {
     var module = "<?php echo $module; ?>";
     
     switch(module){

      case 'leads' : 
         $('#nav_leads').addClass("open");
         break;
      
      case 'Dashboard' : 
         $('#nav_dashboard').addClass("open");
         break;
       
      case 'account' : 
         $('#nav_account').addClass("open");
         break;


         case 'qms' : 
         $('#nav_Quote').addClass("open");
         break;

      }

   })   

</script>                  