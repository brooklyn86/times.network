<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Login - Administrador">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Cadastro | Publisher</title>
    <link rel="apple-touch-icon" href="/assets_admin/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/pages/login-register.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/assets/css/style.css">
</head>
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <section class="row navbar-flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <img src="/logo.png" alt="Logo" style="max-width: 125px;">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Digite os dados para criar sua conta</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
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
                                    <?php echo e(Form::open(['url' => 'publisher/cadastro', 'class' => 'form-horizontal', 'id' => 'formLogin'])); ?>


                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label>Nome</label>
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
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
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
                                        <div class="col-md-12 form-group">
                                            <label>Telefone com DDD</label>
                                            <?php echo e(Form::text('telefone', null, ['class' => 'form-control '.( $errors->has('telefone') ? ' is-invalid' : ''),
                                            'placeholder' => 'Digite um telefone válido, com DDD'])); ?>

                                            <?php $__errorArgs = ['telefone'];
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
                                            <label>Apelido</label>
                                            <?php echo e(Form::text('nickname', null, ['class' => 'form-control '.( $errors->has('nickname') ? ' is-invalid' : ''),
                                            'placeholder' => 'Digite um apelido ou nickname'])); ?>

                                            <?php $__errorArgs = ['nickname'];
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
                                            <label>Url do Post</label>
                                            <div class="text-muted" style="font-size: 12px; margin-top: 10px; margin-bottom: 20px;">
                                                Para ter o seu cadastro aprovado como Publisher na TimesNews, é necessário ter uma página no facebook, perfil
                                                do Instagram ou Twitter com no mínimo 1000 seguidores e fazer o procedimento abaixo:<br>
                                                Crie um post com a hashtag <b>#TN</b> e cole a URL desse post no campo abaixo. Preferencialmente, utilize a página
                                                com o maior número de seguidores em suas redes sociais.
                                            </div>
                                            <?php echo e(Form::text('urlPost', null, ['class' => 'form-control '.( $errors->has('urlPost') ? ' is-invalid' : ''),
                                            'placeholder' => 'Url do Post'])); ?>

                                            <?php $__errorArgs = ['urlPost'];
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
                                            <label>Senha</label>
                                            <?php echo e(Form::password('senha', ['class' => 'form-control '.( $errors->has('senha') ? ' is-invalid' : ''),
                                            'placeholder' => 'Digite sua senha'])); ?>

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
                                            <label>Confirme Senha</label>
                                            <?php echo e(Form::password('csenha', ['class' => 'form-control '.( $errors->has('csenha') ? ' is-invalid' : ''),
                                            'placeholder' => 'Digite a confirmação de senha'])); ?>

                                            <?php $__errorArgs = ['csenha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <button type="button" name="btnLogin" id="btnLogin" class="btn btn-danger btn-block btn-lg"><i class="ft-unlock"></i> Entrar</button>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Buynow Button-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<script src="/assets_admin/app-assets/vendors/js/vendors.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
<script src="/assets_admin/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
<script src="/assets_admin/app-assets/js/core/app-menu.min.js"></script>
<script src="/assets_admin/app-assets/js/core/app.min.js"></script>
<script src="/assets_admin/app-assets/js/scripts/footer.min.js"></script>
<script src="/assets_admin/app-assets/js/scripts/forms/form-login-register.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(e){
        $('#btnLogin').click(function(e){
            var element = $(this);
            element.attr('disabled', 'disabled');
            element.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

            $('#formLogin').submit();
        });
    });
</script>
</body>
</html>
<?php /**PATH /home/times-news/timesnews.network/resources/views/publisher/cadastro.blade.php ENDPATH**/ ?>