<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Login - Administrador">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Login | Gerente</title>
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

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
                                    <img src="/logo.png" alt="Logo" style="max-width: 175px;">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Digite email e senha para continuar</span>
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
                                    ?>
                                    <?php echo e(Form::open(['url' => '/gerente/login', 'class' => 'form-horizontal', 'id' => 'formLogin'])); ?>

                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" name="email" class="form-control input-lg" id="user-name" placeholder="Digite o email" tabindex="1" required data-validation-required-message="Digite o seu email para continuar.">
                                        <div class="form-control-position">
                                            <i class="la la-user"></i>
                                        </div>
                                        <div class="help-block font-small-3"></div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="senha" class="form-control input-lg" id="password" placeholder="Digita a senha" tabindex="2" required data-validation-required-message="Digite sua senha de acesso para continuar.">
                                        <div class="form-control-position">
                                            <i class="la la-key"></i>
                                        </div>
                                        <div class="help-block font-small-3"></div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12 text-center text-md-left">
                                            <fieldset>
                                                <input type="checkbox" id="remember-me" class="chk-remember">
                                                <label for="remember-me"> Lembrar acesso nesse dispositivo</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12 text-center text-md-right">
                                            <a href="/esqueceu-senha" class="card-link">Esqueceu sua senha?</a>
                                        </div>
                                    </div>

                                    <div class="g-recaptcha" data-sitekey="6Lca4rAZAAAAAHXDR8kVZpzVqqFagUwdsbeWZ2XD"></div>
                                    
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
<?php /**PATH /home/times-news/webapps/timesnews_network/resources/views/gerente/auth/login.blade.php ENDPATH**/ ?>