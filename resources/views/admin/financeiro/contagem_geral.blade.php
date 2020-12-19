<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="MultiplyPerson - Administrador">
    <meta name="keywords" content="admin, multiplyperson, multiply">
    <meta name="author" content="MultiplyPerson">
    <title>Movimentação Geral | Administrador</title>
    <link rel="apple-touch-icon" href="/assets_admin/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/core/colors/palette-gradient.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets_admin/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@include('admin.include')

<!-- BEGIN: Header-->
@yield('header')
<!-- END: Header-->

<!-- BEGIN: Main Menu-->
@yield('main-menu')
<!-- END: Main Menu-->
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Contagem Geral</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Admin</a></li>
                            <li class="breadcrumb-item"><a href="#">Contagem Geral</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">

            </div>
        </div>

        <div class="content-body">
            <div class="row">

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">R$ {{ number_format($sqlGanhosTotaisPublisherTotal[0]->somaValor,2,',','.') }}</h3>
                                        <h6>Total Gerado aos Publishers</h6>
                                    </div>
                                    <div>
                                        <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="warning">R$ {{ number_format($sqlGanhosTotaisRedatorTotal[0]->somaValor,2,',','.') }}</h3>
                                        <h6>Total Gerado aos Redatores</h6>
                                    </div>
                                    <div>
                                        <i class="icon-basket-loaded warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">{{ number_format($sqlGanhosTotaisPublisherTotal[0]->somaVisitas,0,',','.') }}</h3>
                                        <h6>Quantidade de Visitas em Matérias dos Publishers</h6>
                                    </div>
                                    <div>
                                        <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="warning">{{ number_format($sqlGanhosTotaisRedatorTotal[0]->somaVisitas,0,',','.') }}</h3>
                                        <h6>Quantidade de Visitas em Matérias dos Redator</h6>
                                    </div>
                                    <div>
                                        <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-6 col-md-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-danger rounded-left">
                          <i class="icon-user font-large-2 text-white"></i>
                        </div>
                        <div class="py-1 px-2 media-body">
                          <h5 class="danger">Total de Usuários Publishers</h5>
                          <h5 class="text-bold-400">{{ number_format($totalCadastradosPublisher[0]->total,0,',','.') }}</h5>
                          <div class="progress mt-1 mb-0" style="height: 7px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-6 col-md-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-info rounded-left">
                          <i class="icon-user font-large-2 text-white"></i>
                        </div>
                        <div class="py-1 px-2 media-body">
                          <h5 class="info">Total de Usuários Redatores</h5>
                          <h5 class="text-bold-400">{{ number_format($totalCadastradosRedator[0]->total,0,',','.') }}</h5>
                          <div class="progress mt-1 mb-0" style="height: 7px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card box-shadow-1 border-info">
                        <div class="card-header card-head-inverse bg-info">
                            <h4 class="card-title text-white" id="basic-layout-form">Melhores Publishers</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th>Usuario</th>
                                        <th>Valor Gerado</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(count($sqlMelhoresPublishers) > 0){
                                                foreach($sqlMelhoresPublishers as $dados){
                                                    echo '
                                                    <tr>
                                                        <td>'.$dados->nickname.'</td>
                                                        <td>R$ '.number_format($dados->somaValor,2,',','.').'</td>
                                                    </tr>
                                                    ';
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card box-shadow-1 border-info">
                        <div class="card-header card-head-inverse bg-danger">
                            <h4 class="card-title text-white" id="basic-layout-form">Melhores Redatores</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th>Usuario</th>
                                        <th>Valor Gerado</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(count($sqlMelhoresRedatores) > 0){
                                                foreach($sqlMelhoresRedatores as $dados){
                                                    echo '
                                                    <tr>
                                                        <td>'.$dados->nome.'</td>
                                                        <td>R$ '.number_format($dados->somaValor,2,',','.').'</td>
                                                    </tr>
                                                    ';
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<script src="/assets_admin/app-assets/vendors/js/vendors.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/charts/chart.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/charts/raphael-min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/charts/morris.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js"></script>
<script src="/assets_admin/app-assets/data/jvector/visitor-data.js"></script>
<script src="/assets_admin/app-assets/js/core/app-menu.min.js"></script>
<script src="/assets_admin/app-assets/js/core/app.min.js"></script>
<script src="/assets_admin/app-assets/js/scripts/customizer.min.js"></script>
<script src="/assets_admin/app-assets/js/scripts/footer.min.js"></script>
<script src="/assets_admin/app-assets/js/scripts/pages/dashboard-sales.min.js"></script>
</body>

</html>
