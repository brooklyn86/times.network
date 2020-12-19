<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Meus Dados</title>
    <link rel="apple-touch-icon" href="/assets_admin/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/forms/selects/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/pickers/daterange/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/pickers/pickadate/pickadate.css">
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
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/plugins/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/plugins/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/pages/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/plugins/pickers/daterange/daterange.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets_admin/assets/css/style.css">
    <!-- END: Custom CSS-->

    <style type="text/css">
        .tableComposicao td{
            padding: 0.75rem .25rem !important;
        }
        .tableComposicao th{
            padding: 0.75rem .25rem !important;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php echo $__env->make('publisher.include', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- BEGIN: Header-->
<?php echo $__env->yieldContent('header'); ?>
<!-- END: Header-->

<!-- BEGIN: Main Menu-->
<?php echo $__env->yieldContent('main-menu'); ?>
<!-- END: Main Menu-->
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Editar Meus Dados</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/publisher/dashboard">Publisher</a></li>
                            <li class="breadcrumb-item"><a href="#">Meus Dados</a></li>
                            <li class="breadcrumb-item active">Editar</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">

            </div>
        </div>
        <div class="content-body">
            <div class="row match-height">
                <div class="col-md-12">
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

                    if( $errors->any() ){
                        echo '
                                <div class="alert round bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                                    <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Ocorreu um erro ao gerar o orçamento. Verifique os campos destacados e tente novamente
                                    ';
                        echo '<ul>';
                        foreach($errors->all() as $error){
                            echo '<li>'.$error.'</li>';
                        }
                        echo '</ul>';
                        echo '
                                </div>
                                ';
                    }
                    ?>

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

                    <div id="divMostraMensagem"></div>

                    <div class="card">
                        <div class="card-header card-head-inverse bg-info">
                            <h4 class="card-title text-white" id="basic-layout-form">Minhas Informações</h4>
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
                                <ul class="nav nav-tabs nav-underline no-hover-bg">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-tab31" data-toggle="tab" aria-controls="tab31" href="#tab31"
                                        aria-expanded="true">Dados Pessoais</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab32" data-toggle="tab" aria-controls="tab32" href="#tab32"
                                        aria-expanded="false">Alterar Senha</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab33" data-toggle="tab" aria-controls="tab33" href="#tab33"
                                        aria-expanded="false">Informações de Pagamento</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div role="tabpanel" class="tab-pane active" id="tab31" aria-expanded="true" aria-labelledby="base-tab31">
                                        <div class="form-body">
                                            <h4 class="form-section"> Dados Pessoais</h4>

                                            <?php echo e(Form::model($sql, ['url' => ['publisher/meus-dados/informacoes', ''], 'class' => 'form', 'id' => 'formSalvar'])); ?>

                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label>Nome Completo</label>
                                                        <?php echo e(Form::text('nome', null, ['class' => 'form-control '.( $errors->has('nome') ? ' is-invalid' : ''),
                                                        'placeholder' => 'Digite o seu nome completo'])); ?>

                                                        <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>Email</label>
                                                        <?php echo e(Form::text('email', null, ['class' => 'form-control '.( $errors->has('email') ? ' is-invalid' : ''),
                                                        'placeholder' => 'Digite um email válido'])); ?>

                                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label>Telefone</label>
                                                        <?php echo e(Form::text('telefone', null, ['class' => 'form-control '.( $errors->has('telefone') ? ' is-invalid' : ''),
                                                        'placeholder' => 'Digite o seu telefone fixo ou celular'])); ?>

                                                        <?php $__errorArgs = ['telefone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>Nickname</label>
                                                        <?php echo e(Form::text('nickname', null, ['class' => 'form-control '.( $errors->has('nickname') ? ' is-invalid' : ''),
                                                        'placeholder' => 'Digite um nickname'])); ?>

                                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-outline-info" id="btnSalvar">
                                                            <i class="la la-save"></i> Salvar dados</button>
                                                    </div>
                                                </div>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="tab32" aria-expanded="true" aria-labelledby="base-tab32">
                                        <div class="form-body">
                                            <h4 class="form-section"> Alterar Senha</h4>

                                            <?php echo e(Form::open(['url' => 'publisher/meus-dados/alterar-senha', 'class' => 'form', 'id' => 'formSalvar2'])); ?>


                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label>Senha</label>
                                                    <?php echo e(Form::password('senha', ['class' => 'form-control '.( $errors->has('senha') ? ' is-invalid' : ''),
                                                    'placeholder' => 'Digite a nova senha'])); ?>

                                                    <?php $__errorArgs = ['senha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Confirma a senha</label>
                                                    <?php echo e(Form::password('csenha', ['class' => 'form-control '.( $errors->has('csenha') ? ' is-invalid' : ''),
                                                    'placeholder' => 'Confirma a nova senha'])); ?>

                                                    <?php $__errorArgs = ['senha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <?php echo e(Form::close()); ?>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-outline-info" id="btnSalvar2">
                                                        <i class="la la-save"></i> Salvar dados</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="tab33" aria-expanded="true" aria-labelledby="base-tab33">
                                        <div class="form-body">
                                            <h4 class="form-section"> Informações de Pagamento</h4>

                                            <?php echo e(Form::model($sqlInformacoes[0], ['url' => 'publisher/meus-dados/informacoes-pagamento', 'class' => 'form', 'id' => 'formSalvar3'])); ?>


                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <label>Nome do Títular da Conta</label>
                                                    <?php echo e(Form::text('nomeTitular', null, ['class' => 'form-control '.( $errors->has('nome') ? ' is-invalid' : ''),
                                                    'placeholder' => 'Digite o seu nome completo'])); ?>

                                                    <?php $__errorArgs = ['nomeTitular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label>Tipo de Pessoa</label>
                                                    <?php echo e(Form::select('tipoPessoa', ['1' => 'Pessoa Física', '2' => 'Pessoa Jurídica'], null, ['class' => 'form-control '.( $errors->has('tipoPessoa') ? ' is-invalid' : ''),
                                                    'placeholder' => 'Pessoa Física ou Pessoa Jurídica?'])); ?>

                                                    <?php $__errorArgs = ['tipoPessoa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>CPF ou CNPJ do titular</label>
                                                    <?php echo e(Form::text('cpfCnpj', null, ['class' => 'form-control '.( $errors->has('cpfCnpj') ? ' is-invalid' : ''),
                                                    'placeholder' => 'CPF ou CNPJ do titular'])); ?>

                                                    <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8 form-group">
                                                    <label>Instituição Bancária</label>
                                                    <?php echo e(Form::text('nomeBanco', null, ['class' => 'form-control '.( $errors->has('nomeBanco') ? ' is-invalid' : ''),
                                                    'placeholder' => 'Digite o nome da instituição bancária'])); ?>

                                                    <?php $__errorArgs = ['nomeBanco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label>Tipo de Conta</label>
                                                    <?php echo e(Form::select('tipoConta', ['1' => 'Conta Corrente', '2' => 'Conta Poupança'], null, ['class' => 'form-control '.( $errors->has('tipoConta') ? ' is-invalid' : ''),
                                                    'placeholder' => 'Selecione se Conta Poupança ou Conta Corrente'])); ?>

                                                    <?php $__errorArgs = ['tipoConta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label>Agência</label>
                                                    <?php echo e(Form::text('agencia', null, ['class' => 'form-control '.( $errors->has('agencia') ? ' is-invalid' : ''),
                                                    'placeholder' => 'Digite o número da agência'])); ?>

                                                    <?php $__errorArgs = ['nomeBanco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Número da Conta</label>
                                                    <?php echo e(Form::text('numeroConta', null, ['class' => 'form-control '.( $errors->has('numeroConta') ? ' is-invalid' : ''),
                                                    'placeholder' => 'Digite o número da conta'])); ?>

                                                    <?php $__errorArgs = ['numeroConta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <?php echo e(Form::close()); ?>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-outline-info" id="btnSalvar3">
                                                        <i class="la la-save"></i> Salvar dados</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- END: Content-->



    <style type="text/css">
        .select2-container{
            display: block !important;
        }
    </style>


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <script src="/assets_admin/app-assets/vendors/js/vendors.min.js"></script>

    <script src="/assets_admin/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/assets_admin/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="/assets_admin/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="/assets_admin/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="/assets_admin/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"></script>
    <script src="/assets_admin/app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>

    <script src="/assets_admin/app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <script src="/assets_admin/app-assets/vendors/js/ui/prism.min.js"></script>

    <script src="/assets_admin/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/assets_admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="/assets_admin/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="/assets_admin/app-assets/js/core/app-menu.min.js"></script>
    <script src="/assets_admin/app-assets/js/core/app.min.js"></script>

    <script src="/assets_admin/app-assets/js/scripts/customizer.min.js"></script>
    <script src="/assets_admin/app-assets/js/scripts/footer.min.js"></script>

    <script src="/assets_admin/assets/js/jquery.mask.min.js"></script>
    <script src="/assets_admin/app-assets/js/scripts/extensions/block-ui.js"></script>
    <script src="/assets_admin/app-assets/js/scripts/navs/navs.min.js"></script>

    <!-- <script src="/assets_admin/app-assets/js/scripts/extensions/dropzone.min.js"></script> -->


    <script type="text/javascript">
        $(document).ready(function(e){
            $('#btnSalvar').click(function(e){
                var element = $(this);
                element.attr('disabled', 'disabled');
                element.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                $('#formSalvar').submit();
            });
            $('#btnSalvar2').click(function(e){
                var element = $(this);
                element.attr('disabled', 'disabled');
                element.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                $('#formSalvar2').submit();
            });
            $('#btnSalvar3').click(function(e){
                var element = $(this);
                element.attr('disabled', 'disabled');
                element.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                $('#formSalvar3').submit();
            });

            function block(){
                $.blockUI({
                    message: '<div class="ft-refresh-cw icon-spin font-medium-2"></div>',
                    overlayCSS: {
                        backgroundColor: "#FFF",
                        opacity: 0.8,
                        cursor: "wait"
                    },
                    css: {
                        border: 0,
                        padding: 0,
                        backgroundColor: "transparent"
                    }
                });
            }

            function unblock(){
                $.unblockUI();
            }

        });
    </script>
</body>

</html>
<?php /**PATH /home/times-news/timesnews.network/resources/views/publisher/meusdados.blade.php ENDPATH**/ ?>