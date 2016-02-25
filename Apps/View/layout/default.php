
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo $exe->url->asset('css/style.css');?>" rel="stylesheet">
    </head>
   
    <body class="navbar-fixed sidebar-nav fixed-nav">
        <header class="navbar navbar-light brand-dark">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler layout-toggler hidden-md-down" type="button" data-before="sidebar-nav" data-after="sidebar-nav compact-nav">&#9776;</button>
            <ul class="nav navbar-nav pull-right hidden-md-down">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <!--img src="assets/img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com"-->
                        <span class="hidden-md-down"><?php echo $user->user_name;?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-xs-center">
                            <strong>Settings</strong>
                        </div>
                        <a class="dropdown-item" href="<?php echo $exe->url->create('default',['controller' => 'dashboard','action' => 'signout']);?>"><i class="fa fa-lock"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </header>
        <nav id="navigation" class="collapse navbar-toggleable-sm nav-dark">
            <div id="navigation-header">
                <!--img src="assets/img/avatars/8.jpg" class="img-avatar" alt="Avatar"-->
                <div>
                    <strong><?php echo $user->user_name;?></strong>
                </div>
                <div class="text-muted">
                    <!--small>Founder &amp; CEO</small-->
                </div>
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    
                </div>
            </div>
            <div id="navigation-items">
                <ul class="nav">
                    <li class="nav-title">
                        DASHBOARD
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">MY FINANCIAL</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $exe->url->create('default',['controller' => 'dashboard','action'=> 'cash']);?>"><i class="icon-speedometer"></i> My Cash </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $exe->url->create('default',['controller' => 'asset','action' => 'viewasset']);?>"><i class="icon-speedometer"></i> My Assets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-speedometer"></i> My Insurance </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-speedometer"></i> My Debt</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">MY DEEDS</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-speedometer"></i> My Deeds </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-speedometer"></i> My Charity</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $exe->url->create('default',['controller' => 'trusty','action' => 'assigntrusty']);?>"><i class="icon-speedometer"></i> Assign Trusty </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">MY WISH</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'mainwish']);?>"><i class="icon-speedometer"></i> My Wish</a>
                            </li>
                        </ul>
                    </li>
            
                </ul>
            </div>
            <div id="navigation-footer">
            
            </div>
        </nav>
        <!-- Main content -->
        <main id="content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="h2 page-title"><?php echo $title;?></h1>
                    </div>
                    <div class="col-md-5 charts">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="chart-wrapper">
                                    <canvas style='display: none;' id="header-chart-1" height="68" class="chart chart-bar"></canvas>
                                </div>
                                <div class="text-xs-center title">
                                    
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-4 col-md-4">
                                <div class="chart-wrapper">
                                    <canvas style='display: none;' id="header-chart-2" height="68" class="chart chart-bar"></canvas>
                                </div>
                                <div class="text-xs-center title">
                                    <span class="text-muted"></span>
                                    <strong class="text-danger"></strong>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-4 col-md-4">
                                <div class="chart-wrapper">
                                    <canvas style='display: none;' id="header-chart-3" height="68" class="chart chart-bar"></canvas>
                                </div>
                                <div class="text-xs-center title">
                                    <span class="text-muted"></span>
                                    <strong class="text-success"></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="<?php echo $exe->url->create('default',['controller'=>'dashboard','action'=>'maininterface']);?>">Home</a></li>
                <li><a href="#"><?php echo $title;?></a></li>
                <!-- Breadcrumb Menu-->
                <div class="breadcrumb-menu">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        
                    </div>
                </div>
            </ol>
            <div class="container-fluid">
                
                <?php echo $view->render();?>
            </div>
            <!-- /.conainer-fluid -->
        </main>
        <footer id="footer">
            <span class="text-left">
                <!--a href="http://bootstrapmaster.com">Root</a> &copy; 2016 creativeLabs.
            </span>
            <span class="pull-right">
                Powered by <a href="http://genesisui.com">GenesisUI</a-->
            </span>
        </footer>

        <script src="<?php echo $exe->url->asset('js/libs/jquery.min.js');?>"></script>
        <script src="<?php echo $exe->url->asset('js/libs/tether.min.js');?>"></script>
        <script src="<?php echo $exe->url->asset('js/libs/bootstrap.min.js');?>"></script>
        <script src="<?php echo $exe->url->asset('js/libs/pace.min.js');?>"></script>
        <!-- Plugins and scripts required by all views -->
        <script src="<?php echo $exe->url->asset('js/libs/Chart.min.js');?>"></script>
        <script src="<?php echo $exe->url->asset('js/views/shared.js');?>"></script>
        <!-- GenesisUI main scripts -->
        <script src="<?php echo $exe->url->asset('js/app.js');?>"></script>
        <!-- Plugins and scripts required by this views -->
        <script src="<?php echo $exe->url->asset('js/libs/toastr.min.js');?>"></script>
        <script src="<?php echo $exe->url->asset('js/libs/gauge.min.js');?>"></script>
        <script src="<?php echo $exe->url->asset('js/libs/moment.min.js');?>"></script>
        <script src="<?php echo $exe->url->asset('js/libs/daterangepicker.min.js');?>"></script>
        <!-- Custom scripts required by this view -->
        <!--script src="<?php echo $exe->url->asset('js/views/main.js');?>"></script-->
        
        
    </body>
</html>