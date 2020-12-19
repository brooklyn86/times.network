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
    <title>Dashboard | Publisher</title>
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
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/pages/news-feed.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets_admin/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@include('publisher.include')

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
                <h3 class="content-header-title mb-0 d-inline-block">Bem Vindo</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/publisher/dashboard">Publisher</a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">

            </div>
        </div>

        <div class="content-body">
            <div class="row same-height"></div>

            <?php
                if($sql->status_meio_pagamento == 0){
                    echo '
                    <div class="alert alert-danger bg-danger alert-dismissible mb-2" role="alert" style="background-color: #ff4961!important; color: #FFFFFF !important;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="alert-heading mb-2">Configurar Meio de Pagamento</h4>
                        <p>Para receber pagamentos você precisa atualizar suas informações bancárias. Clique no botão abaixo para cadastrar os seus dados bancários</p>
                        <a class="btn bg-danger bg-darken-3 text-white" href="/publisher/meus-dados">Configurar Meio de Pagamento</a>
                    </div>
                    ';
                }
            ?>

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="alert round bg-info alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                        <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Quer indicar alguem? Utilize o link abaixo<br><b>https://timesnews.network/publisher/cadastro?indicador={{ $sql->codigoUnico }}</b>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                <?php
                    $sqltop = DB::table('contagem_promocao')->where('status', 1)->get();

                    if(count($sqltop) > 0){

                        $sql55 = DB::table('contagem_promocao')->select('*', DB::raw("date_format(data_inicio, '%Y-%m-%d') as data_inicio_format"), DB::raw("date_format(data_final, '%Y-%m-%d') as data_final_format"))->where('id', $sqltop[0]->id)->get();

                        if($sql55[0]->status == 2){
                            $datafinal = $sql55[0]->data_final;
                        }else{
                            $datafinal = date('Y-m-d');
                        }

                        $sql56 = DB::table('usuarios')->leftJoin('contador_visitas_custo', 'contador_visitas_custo.idUsuario', '=','usuarios.id')
                            ->select('usuarios.*', DB::raw("SUM(qtdVisitas) as somaVisitas"))->where('tipoUsuario', 1)
                            ->whereBetween('contador_visitas_custo.dataLancamento', [$sql55[0]->data_inicio_format.'', $datafinal.''])
                            ->groupBy('usuarios.id')->orderBy('somaVisitas', 'desc')->where('usuarios.id', Session::get('idPublisher'))
                            ->get();

                            if(count($sql56) > 0){
                                foreach($sql56 as $dados){
                                    echo '
                                    <div class="alert round bg-warning alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                                        <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        Minha Pontuação: <b>'.intdiv($dados->somaVisitas, 1000).' pontos</b>
                                    </div>
                                    ';

                                }
                            }else{
                                echo '
                                <div class="alert round bg-warning alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                                    <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Minha Pontuação: <br><b>0 pontos</b>
                                </div>
                                ';
                            }
                    }
                ?>
            </div>
            </div>

            <?php
            if(Session::has('sucesso')){
                echo '
                        <div class="alert round bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                            <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            '.Session::get('sucesso').'
                        </div>
                        ';
            }

            if(Session::has('erro')){
                echo '
                        <div class="alert round bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                            <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            '.Session::get('erro').'
                        </div>
                        ';
            }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-gradient-x-info">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                                    <div class="card-body text-center">
                                        <h1 class="display-4 text-white"><i class="icon-user font-large-2"></i> {{ $visitasHoje }}</h1>
                                        <span class="text-white">Vistas Hoje</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                                    <div class="card-body text-center">
                                        <h1 class="display-4 text-white"><i class="icon-user font-large-2"></i> {{ $visitasMes }}</h1>
                                        <span class="text-white">Visitas Esse Mês</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 card-gradient-md-border border-right-lighten-3">
                                    <div class="card-body text-center">
                                        <h1 class="display-4 text-white"><i class="icon-money font-large-2"></i> R$ {{ number_format($sql->valorCreditoAtual,2,',','.') }}</h1>
                                        <span class="text-white">Saldo atual</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Segunda Linha da Estatistica -->
            <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-content">
          <div class="row">
            <div class="col-xl-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
              <div class="p-1 text-center">
                <div>
                  <h3 class="display-4 blue-grey darken-1">{{ $visitasHoje }}</h3>
                  <span class="blue-grey darken-1">Hoje</span>
                </div>
                <div class="card-content">
                  <div id="morris-likes" style="height: 75px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="75" version="1.1" width="479.984" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; top: -0.140625px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="#54d6a7" stroke="none" d="M25,32.5C32.67378729923514,33.125,48.02136189770541,33.4375,55.69514919694055,35C63.368936496175685,36.5625,78.71651109464597,44.53125,86.3902983938811,45C94.06408569311624,45.46875,109.41166029158651,38.593963748290015,117.08544759082166,38.75C124.78025896484922,38.906463748290015,140.16988171290436,45.78060875512996,147.8646930869319,46.25C155.53848038616704,46.71810875512996,170.88605498463733,43.75,178.55984228387246,42.5C186.2336295831076,41.25,201.58120418157787,36.875,209.254991480813,36.25C216.92877878004813,35.625,232.27635337851842,37.81207250341997,239.95014067775355,37.5C247.6449520517811,37.18707250341997,263.03457479983626,33.593536251709985,270.7293861738638,33.75C278.40317347309895,33.906036251709985,293.7507480715692,38.90625,301.42453537080434,38.75C309.09832267003947,38.59375,324.4458972685098,32.8125,332.1196845677449,32.5C339.79347186698004,32.1875,355.14104646545036,36.56207250341998,362.8148337646855,36.25C370.50964513871304,35.93707250341998,385.89926788676814,31.40817373461012,393.5940792607957,30C401.2678665600308,28.59567373461012,416.61544115850114,24.843749038791017,424.2892284577363,25C431.9629213433022,25.156249038791017,447.31030711443407,29.6875,454.984,31.25L454.984,50L25,50Z" fill-opacity="0.1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.1;"></path><path fill="none" stroke="#28d094" d="M25,32.5C32.67378729923514,33.125,48.02136189770541,33.4375,55.69514919694055,35C63.368936496175685,36.5625,78.71651109464597,44.53125,86.3902983938811,45C94.06408569311624,45.46875,109.41166029158651,38.593963748290015,117.08544759082166,38.75C124.78025896484922,38.906463748290015,140.16988171290436,45.78060875512996,147.8646930869319,46.25C155.53848038616704,46.71810875512996,170.88605498463733,43.75,178.55984228387246,42.5C186.2336295831076,41.25,201.58120418157787,36.875,209.254991480813,36.25C216.92877878004813,35.625,232.27635337851842,37.81207250341997,239.95014067775355,37.5C247.6449520517811,37.18707250341997,263.03457479983626,33.593536251709985,270.7293861738638,33.75C278.40317347309895,33.906036251709985,293.7507480715692,38.90625,301.42453537080434,38.75C309.09832267003947,38.59375,324.4458972685098,32.8125,332.1196845677449,32.5C339.79347186698004,32.1875,355.14104646545036,36.56207250341998,362.8148337646855,36.25C370.50964513871304,35.93707250341998,385.89926788676814,31.40817373461012,393.5940792607957,30C401.2678665600308,28.59567373461012,416.61544115850114,24.843749038791017,424.2892284577363,25C431.9629213433022,25.156249038791017,447.31030711443407,29.6875,454.984,31.25" stroke-width="2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="25" cy="32.5" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="55.69514919694055" cy="35" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="86.3902983938811" cy="45" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="117.08544759082166" cy="38.75" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="147.8646930869319" cy="46.25" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="178.55984228387246" cy="42.5" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="209.254991480813" cy="36.25" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="239.95014067775355" cy="37.5" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="270.7293861738638" cy="33.75" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="301.42453537080434" cy="38.75" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="332.1196845677449" cy="32.5" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="362.8148337646855" cy="36.25" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="393.5940792607957" cy="30" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="424.2892284577363" cy="25" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="454.984" cy="31.25" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
                  <ul class="list-inline clearfix">
                    <li class="border-right-blue-grey border-right-lighten-2 pr-1">
                      <h1 class="success text-bold-400">{{ $visitasHoje }}</h1>
                      <span class="blue-grey darken-1"><i class="la la-caret-up"></i> Visitas</span>
                    </li>
                    <li class="pl-1">
                      <h1 class="success text-bold-400">{{ $valorHoje }}</h1>
                      <span class="blue-grey darken-1"><i class="la la-caret-down"></i> Ganhos</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
              <div class="p-1 text-center">
                <div>
                  <h3 class="display-4 blue-grey darken-1">{{ $visitasOntem }}</h3>
                  <span class="blue-grey darken-1">Ontem</span>
                </div>
                <div class="card-content">
                  <div id="morris-comments" style="height: 75px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="75" version="1.1" width="479.984" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.984375px; top: -0.140625px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="#f9b095" stroke="none" d="M25,31.25C32.67378729923514,29.6875,48.02136189770541,25.15625,55.69514919694055,25C63.368936496175685,24.84375,78.71651109464597,28.59375,86.3902983938811,30C94.06408569311624,31.40625,109.41166029158651,35.93792749658003,117.08544759082166,36.25C124.78025896484922,36.56292749658003,140.16988171290436,32.18707250341997,147.8646930869319,32.5C155.53848038616704,32.81207250341997,170.88605498463733,38.59375,178.55984228387246,38.75C186.2336295831076,38.90625,201.58120418157787,33.90625,209.254991480813,33.75C216.92877878004813,33.59375,232.27635337851842,37.18792749658003,239.95014067775355,37.5C247.6449520517811,37.81292749658003,263.03457479983626,35.624145006839946,270.7293861738638,36.25C278.40317347309895,36.874145006839946,293.7507480715692,41.25,301.42453537080434,42.5C309.09832267003947,43.75,324.4458972685098,46.71875,332.1196845677449,46.25C339.79347186698004,45.78125,355.14104646545036,38.906036251709985,362.8148337646855,38.75C370.50964513871304,38.593536251709985,385.89926788676814,45.46939124487004,393.5940792607957,45C401.2678665600308,44.53189124487004,416.61544115850114,36.562509612089826,424.2892284577363,35C431.9629213433022,33.437509612089826,447.31030711443407,33.125,454.984,32.5L454.984,50L25,50Z" fill-opacity="0.1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.1;"></path><path fill="none" stroke="#ff7d4d" d="M25,31.25C32.67378729923514,29.6875,48.02136189770541,25.15625,55.69514919694055,25C63.368936496175685,24.84375,78.71651109464597,28.59375,86.3902983938811,30C94.06408569311624,31.40625,109.41166029158651,35.93792749658003,117.08544759082166,36.25C124.78025896484922,36.56292749658003,140.16988171290436,32.18707250341997,147.8646930869319,32.5C155.53848038616704,32.81207250341997,170.88605498463733,38.59375,178.55984228387246,38.75C186.2336295831076,38.90625,201.58120418157787,33.90625,209.254991480813,33.75C216.92877878004813,33.59375,232.27635337851842,37.18792749658003,239.95014067775355,37.5C247.6449520517811,37.81292749658003,263.03457479983626,35.624145006839946,270.7293861738638,36.25C278.40317347309895,36.874145006839946,293.7507480715692,41.25,301.42453537080434,42.5C309.09832267003947,43.75,324.4458972685098,46.71875,332.1196845677449,46.25C339.79347186698004,45.78125,355.14104646545036,38.906036251709985,362.8148337646855,38.75C370.50964513871304,38.593536251709985,385.89926788676814,45.46939124487004,393.5940792607957,45C401.2678665600308,44.53189124487004,416.61544115850114,36.562509612089826,424.2892284577363,35C431.9629213433022,33.437509612089826,447.31030711443407,33.125,454.984,32.5" stroke-width="2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="25" cy="31.25" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="55.69514919694055" cy="25" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="86.3902983938811" cy="30" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="117.08544759082166" cy="36.25" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="147.8646930869319" cy="32.5" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="178.55984228387246" cy="38.75" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="209.254991480813" cy="33.75" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="239.95014067775355" cy="37.5" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="270.7293861738638" cy="36.25" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="301.42453537080434" cy="42.5" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="332.1196845677449" cy="46.25" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="362.8148337646855" cy="38.75" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="393.5940792607957" cy="45" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="424.2892284577363" cy="35" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="454.984" cy="32.5" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
                  <ul class="list-inline clearfix">
                    <li class="border-right-blue-grey border-right-lighten-2 pr-1">
                      <h1 class="warning text-bold-400">{{ $visitasOntem }}</h1>
                      <span class="blue-grey darken-1"><i class="la la-caret-up"></i> Visitas</span>
                    </li>
                    <li class="pl-1">
                      <h1 class="warning text-bold-400">{{ $valorOntem }}</h1>
                      <span class="blue-grey darken-1"><i class="la la-caret-down"></i> Ganhos</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
              <div class="p-1 text-center">
                <div>
                  <h3 class="display-4 blue-grey darken-1">{{ $visitasMes }}</h3>
                  <span class="blue-grey darken-1">Esse Mês</span>
                </div>
                <div class="card-content">
                  <div id="morris-views" style="height: 75px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="75" version="1.1" width="479.984" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.96875px; top: -0.140625px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="#f98c97" stroke="none" d="M25,32.5C32.67378729923514,33.125,48.02136189770541,33.4375,55.69514919694055,35C63.368936496175685,36.5625,78.71651109464597,44.53125,86.3902983938811,45C94.06408569311624,45.46875,109.41166029158651,38.593963748290015,117.08544759082166,38.75C124.78025896484922,38.906463748290015,140.16988171290436,45.78060875512996,147.8646930869319,46.25C155.53848038616704,46.71810875512996,170.88605498463733,43.75,178.55984228387246,42.5C186.2336295831076,41.25,201.58120418157787,36.875,209.254991480813,36.25C216.92877878004813,35.625,232.27635337851842,37.81207250341997,239.95014067775355,37.5C247.6449520517811,37.18707250341997,263.03457479983626,33.593536251709985,270.7293861738638,33.75C278.40317347309895,33.906036251709985,293.7507480715692,38.90625,301.42453537080434,38.75C309.09832267003947,38.59375,324.4458972685098,32.8125,332.1196845677449,32.5C339.79347186698004,32.1875,355.14104646545036,36.56207250341998,362.8148337646855,36.25C370.50964513871304,35.93707250341998,385.89926788676814,31.40817373461012,393.5940792607957,30C401.2678665600308,28.59567373461012,416.61544115850114,24.843749038791017,424.2892284577363,25C431.9629213433022,25.156249038791017,447.31030711443407,29.6875,454.984,31.25L454.984,50L25,50Z" fill-opacity="0.1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.1;"></path><path fill="none" stroke="#ff4558" d="M25,32.5C32.67378729923514,33.125,48.02136189770541,33.4375,55.69514919694055,35C63.368936496175685,36.5625,78.71651109464597,44.53125,86.3902983938811,45C94.06408569311624,45.46875,109.41166029158651,38.593963748290015,117.08544759082166,38.75C124.78025896484922,38.906463748290015,140.16988171290436,45.78060875512996,147.8646930869319,46.25C155.53848038616704,46.71810875512996,170.88605498463733,43.75,178.55984228387246,42.5C186.2336295831076,41.25,201.58120418157787,36.875,209.254991480813,36.25C216.92877878004813,35.625,232.27635337851842,37.81207250341997,239.95014067775355,37.5C247.6449520517811,37.18707250341997,263.03457479983626,33.593536251709985,270.7293861738638,33.75C278.40317347309895,33.906036251709985,293.7507480715692,38.90625,301.42453537080434,38.75C309.09832267003947,38.59375,324.4458972685098,32.8125,332.1196845677449,32.5C339.79347186698004,32.1875,355.14104646545036,36.56207250341998,362.8148337646855,36.25C370.50964513871304,35.93707250341998,385.89926788676814,31.40817373461012,393.5940792607957,30C401.2678665600308,28.59567373461012,416.61544115850114,24.843749038791017,424.2892284577363,25C431.9629213433022,25.156249038791017,447.31030711443407,29.6875,454.984,31.25" stroke-width="2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="25" cy="32.5" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="55.69514919694055" cy="35" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="86.3902983938811" cy="45" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="117.08544759082166" cy="38.75" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="147.8646930869319" cy="46.25" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="178.55984228387246" cy="42.5" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="209.254991480813" cy="36.25" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="239.95014067775355" cy="37.5" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="270.7293861738638" cy="33.75" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="301.42453537080434" cy="38.75" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="332.1196845677449" cy="32.5" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="362.8148337646855" cy="36.25" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="393.5940792607957" cy="30" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="424.2892284577363" cy="25" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="454.984" cy="31.25" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
                  <ul class="list-inline clearfix">
                    <li class="border-right-blue-grey border-right-lighten-2 pr-1">
                      <h1 class="danger text-bold-400">{{ $visitasMes }}</h1>
                      <span class="blue-grey darken-1"><i class="la la-caret-up"></i> Visitas</span>
                    </li>
                    <li class="pl-1">
                      <h1 class="danger text-bold-400">{{ $valorMes }}</h1>
                      <span class="blue-grey darken-1"><i class="la la-caret-down"></i> Ganhos</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Fim da Segunda Linha de Estatistica -->

        <div class="row">
            <div class="col-md-8">
                <div class="card box-shadow-1 border-info">
                    <div class="card-header card-head-inverse bg-primary">
                        <h4 class="card-title text-white" id="basic-layout-form">Top 10 de Hoje</h4>
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

                            <section id="news-feed">

                                <div class="row match-height">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                                <th>Matéria</th>
                                                <th>Total de Acessos</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(count($sqlLinks) > 0){
                                                        foreach($sqlLinks as $dados){
                                                            echo '
                                                                <tr>
                                                                    <td>'.$dados->titulo.'</td>
                                                                    <td>'.$dados->totalAcessos.'</td>
                                                                </tr>
                                                            ';
                                                        }
                                                    }else{
                                                        echo '<tr><td colspan="2">Nenhuma matéria compartilhada hoje</td></tr>';
                                                    }
                                                ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card box-shadow-1 border-info">
                    <div class="card-header card-head-inverse bg-warning">
                        <h4 class="card-title text-white" id="basic-layout-form">Top 10 Publishers</h4>
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
                            <?php
                                $sqltop = DB::table('contagem_promocao')->where('status', 1)->get();

                                if(count($sqltop) > 0){

                                    $sql55 = DB::table('contagem_promocao')->select('*', DB::raw("date_format(data_inicio, '%Y-%m-%d') as data_inicio_format"), DB::raw("date_format(data_final, '%d/%m/%Y') as data_final_format"))->where('id', $sqltop[0]->id)->get();

                                    if($sql55[0]->status == 2){
                                        $datafinal = $sql55[0]->data_final;
                                    }else{
                                        $datafinal = date('Y-m-d');
                                    }

                                    $sql56 = DB::table('usuarios')->leftJoin('contador_visitas_custo', 'contador_visitas_custo.idUsuario', '=','usuarios.id')
                                        ->select('usuarios.*', DB::raw("SUM(qtdVisitas) as somaVisitas"))
                                        ->whereBetween('contador_visitas_custo.dataLancamento', [$sql55[0]->data_inicio_format.'', $datafinal.''])
                                        ->groupBy('usuarios.id')->orderBy('somaVisitas', 'desc')->take(10)->where('tipoUsuario', 1)
                                        ->get();

                                        if(count($sql56) > 0){
                                            foreach($sql56 as $dados){
                                                $sqlLinksInterno = DB::table('contador_visitas_custo_materia')->where('contador_visitas_custo_materia.idUsuario', $dados->id)->where('contador_visitas_custo_materia.tipoUsuario', 1)
                                                ->leftJoin('materias','materias.id','=','contador_visitas_custo_materia.idMateria')
                                                ->where('contador_visitas_custo_materia.dataLancamento','like',date('Y-m-d').'%')
                                                ->select('materias.id','materias.titulo','materias.imagemThumb','materias.linkSite', 'qtdVisitas')->orderBy('qtdVisitas', 'desc')->take(3)->get();

                                                //$ret = '<table><tbody>';
                                                $ret = '';

                                                if(count($sqlLinksInterno) > 0){
                                                    foreach($sqlLinksInterno as $dados2){
                                                        $ret.='<p>'.htmlspecialchars($dados2->titulo).'</p>';
                                                    }
                                                }else{
                                                    $ret.='<p>Nenhuma nova matéria hoje</p>';
                                                }

                                                //$ret.= '</tbody></table>';

                                                echo '
                                                <tr>
                                                    <td><a href="javascript:void();" data-toggle="popover" data-trigger="focus" title="Top Links de Hoje" data-content="'.$ret.'">'.$dados->nickname.'</a></td>
                                                    <td><b>'.intdiv($dados->somaVisitas, 1000).' pontos</b></td>
                                                </tr>
                                                ';
                                            }
                                        }
                                }
                            ?>
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

<script type="text/javascript">
    $(document).ready(function(e){
        $('.btnVisualizar').click(function(e){
            var link = $(this).attr('data-link');

            window.open(link, '_blank')
        });

        $('[data-toggle="popover"]').popover({
            html: true,
            trigger: 'hover focus'
        });
    });
</script>
</body>

</html>
