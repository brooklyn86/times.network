<?php $__env->startSection('header'); ?>
    <style type="text/css">
        .header-navbar .navbar-header .navbar-brand .brand-logo{
            width: auto;
        }
    </style>
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-shadow  bg-lighten-4">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item" >
                        <a class="navbar-brand" href="#">
                            <img class="brand-logo" alt="" src="/logo2.png" style="max-width: 190px">
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">



                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1 user-name text-bold-700"><?php echo e(Session::get('nomeFinanceiro')); ?></span>
                                <span class="avatar avatar-online">
                                <img src="/assets_admin/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i>
                            </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                
                                <a class="dropdown-item" href="/financeiro/logout"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-menu'); ?>
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header">
                    <span data-i18n="Institucional">Menu Principal</span>
                    <i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Clientes e Empresas"></i>
                </li>

                <li class=" nav-item">
                    <a href="/financeiro/dashboard">
                        <i class="la la-home"></i>
                        <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                    </a>
                </li>




                <li class=" nav-item">
                    <a href="/financeiro/saques/listar-solicitacoes">
                        <i class="la la-home"></i>
                        <span class="menu-title" data-i18n="Dashboard">Listar Saques</span>
                    </a>
                </li>



            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/times-news/timesnews.network/resources/views/financeiro/include.blade.php ENDPATH**/ ?>