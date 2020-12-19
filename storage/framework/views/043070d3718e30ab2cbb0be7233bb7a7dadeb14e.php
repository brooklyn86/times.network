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
    <title>Editar redator</title>
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
<?php echo $__env->make('admin.include', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <h3 class="content-header-title mb-0 d-inline-block">Editar Redator</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Administrador</a></li>
                            <li class="breadcrumb-item"><a href="#">Redatores</a></li>
                            <li class="breadcrumb-item active">Editar redator</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right">
                    <button class="btn btn-danger dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações Rápidas</button>
                    <div class="dropdown-menu arrow">
                        <a class="dropdown-item" href="/admin/redatores/listar">Listar redatores</a>
                    </div>
                </div>
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

                    <div id="divMostraMensagem"></div>

                    <?php echo e(Form::model( $sql, ['url' => ['admin/redatores/editar', $sql->id], 'class' => 'form', 'id' => 'formSalvar', 'files' => 'true'] )); ?>


                    <div class="card box-shadow-1 border-info">
                        <div class="card-header card-head-inverse bg-info">
                            <h4 class="card-title text-white" id="basic-layout-form">Dados do redator</h4>
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
                                <div class="form-body">

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Nome</label>
                                            <?php echo e(Form::text('nome', null, ['class' => 'form-control '.( $errors->has('nome') ? ' is-invalid' : ''),
                                            'placeholder' => 'Digite o nome desse usuário'])); ?>

                                            <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Email</label>
                                            <?php echo e(Form::text('email', null, ['class' => 'form-control '.( $errors->has('email') ? ' is-invalid' : ''),
                                            'placeholder' => 'Digite o email desse usuário'])); ?>

                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Senha</label>
                                            <?php echo e(Form::password('senha', ['class' => 'form-control '.( $errors->has('senha') ? ' is-invalid' : ''),
                                            'placeholder' => 'Digite a senha desse usuário'])); ?>

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
                                    <div class="row">

                                        <div class="col-md-12 form-group">
                                            <label>Status</label>
                                            <?php echo e(Form::select('status', ['1' => 'Ativo', '0' => 'Inativo'], null, ['class' => 'form-control '.( $errors->has('status') ? ' is-invalid' : ''),
                                            'placeholder' => 'Selecione o status'])); ?>

                                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-outline-info" id="btnSalvar">
                                        <i class="la la-save"></i> Salvar dados</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <?php echo e(Form::close()); ?>



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

            $('input[name=telefone]').mask('(00) 00000-0000');

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
<?php /**PATH /home/times-news/webapps/timesnews_network/resources/views/admin/redatores/editar.blade.php ENDPATH**/ ?>