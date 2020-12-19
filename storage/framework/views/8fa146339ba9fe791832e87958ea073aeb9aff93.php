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
    <title>Matérias | Publisher</title>
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
                <h3 class="content-header-title mb-0 d-inline-block">Matérias</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/publisher/dashboard">Publisher</a></li>
                            <li class="breadcrumb-item"><a href="#">Matérias</a></li>
                            <li class="breadcrumb-item active">Visualizar matérias</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">

            <div class="row match-height">
                <div class="col-md-12">

                    <div class="card box-shadow-1 border-info">
                        <div class="card-header card-head-inverse bg-info">
                            <h4 class="card-title text-white" id="basic-layout-form">Meus Links</h4>
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
                                    <?php
                                        if(count($sql) > 0){
                                            foreach($sql as $dados){
                                                echo '
                                                <div class="col-lg-3 col-md-3 col-sm-6">
                                                    <div class="card box-shadow-2" style="box-shadow: 0 10px 18px 0 rgba(62,57,107,.2) !important;">
                                                        <img src="/public_img/'.$dados->imagemThumb.'" alt="" class="card-img-top img-fluid">
                                                        <div class="news-feed-overlay">
                                                            <span class="badge badge-success badge-sm float-right news-feed-badge news-feed-badge-nature position-absolute">
                                                                '.$dados->nomeCategoria.'
                                                            </span>
                                                        </div>
                                                        <div class="card-body" style="padding-left: .5rem; padding-right: .5rem; padding-top: 1rem">
                                                            <div class="row"><div class="col-md-12">
                                                            <span href="#" class="text-dark">
                                                                <h6 class="card-title font-small-6">'.$dados->titulo.'</h6>
                                                            </span>
                                                            <span class="float-left font-small-2 text-muted">Adicionado em: '.$dados->dataCadastro.'</span><br>
                                                            <span class="float-left font-small-2 text-muted">Link gerado em: '.$dados->dataLink.'</span>
                                                            </div></div>
                                                            <div class="row" style="margin-top: 10px;">
                                                                <div class="col-md-4">
                                                                    <button type="button" name="btnVisualizar" class="btn btn-sm btn-warning btnVisualizar btn-block" data-id="'.$dados->id.'" data-link="'.$dados->linkSite.'">
                                                                        <i class="la la-eye"></i> Abrir
                                                                    </button>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <button type="button" name="btnLink" class="btn btn-sm btn-success btnLink btn-block" data-id="'.$dados->id.'" data-link="'.$dados->linkSite.'">
                                                                        <i class="la la-chain"></i> Link
                                                                    </button>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <button type="button" id="btnFB" name="btnFB" class="btn btn-sm btn-info btnFacebook btn-block" data-id="'.$dados->id.'" data-link="'.$dados->linkSite.'">
                                                                        <i class="la la-facebook"></i> FB
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                ';
                                            }
                                        }
                                    ?>
                                </div>
                                </section>

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
<script src="/assets_admin/app-assets/data/jvector/visitor-data.js"></script>
<script src="/assets_admin/app-assets/js/core/app-menu.min.js"></script>
<script src="/assets_admin/app-assets/js/core/app.min.js"></script>
<script src="/assets_admin/app-assets/js/scripts/customizer.min.js"></script>
<script src="/assets_admin/app-assets/js/scripts/footer.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

<div class="modal fade text-left" id="modalGerarLink" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger white">
				<h4 class="modal-title white" id="myModalLabel10">Gerar Link de Compartilhamento</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div id="mostraMsgModal"></div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="projectinput1"></label>
                        <fieldset>
    						<div class="input-group">
    							<input type="text" class="form-control" id="modalLink" aria-describedby="basic-addon4">
    							<div class="input-group-append" id="clickCopy1">
    								<span class="input-group-text" id="basic-addon4"><i class="la la-copy"></i></span>
    							</div>
    						</div>
    					</fieldset>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="projectinput1"></label>
                        <fieldset>
    						<div class="input-group">
    							<input type="text" class="form-control" id="modalTitulo" aria-describedby="basic-addon5">
    							<div class="input-group-append" id="clickCopy2">
    								<span class="input-group-text" id="basic-addon5"><i class="la la-copy"></i></span>
    							</div>
    						</div>
    					</fieldset>
                    </div>
                </div>

                <h4 class="form-section"><i class="ft-briefcase"></i> Capa para Stories</h4>

                <div class="row">
                    <div class="col-md-12">
                        <div style="display: inline">
                            <fieldset class="checkboxsas">
                                <label>
                                    <input type="checkbox" value="1" name="checkComTitulo" checked="true"> Gerar com Título
  							    </label>
                            </fieldset>

                            <a href="#" name="btnGerar" id="btnGerar" class="btn btn-primary">Gerar</a>
                        </div>
                    </div>
                </div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function(e){
        $('#btnFiltrar').click(function(e){
            var element = $(this);
            element.attr('disabled', 'disabled');

            $('#formFiltrar').submit();
        });

        $('#btnFB').click(function(e){
            var dataLink = $(this).attr('data-link');

            window.open('https://developers.facebook.com/tools/debug/sharing/?q='+dataLink+'','_blank')
        });

        $('#clickCopy1').click(function(e){
            var copyText = document.getElementById("modalLink");

            copyText.select();
            copyText.setSelectionRange(0, 99999);

            document.execCommand("copy");
        });
        $('#clickCopy2').click(function(e){
            var copyText = document.getElementById("modalTitulo");

            copyText.select();
            copyText.setSelectionRange(0, 99999);

            document.execCommand("copy");
        });

        $('.btnVisualizar').click(function(e){
            var link = $(this).attr('data-link');

            window.open(link, '_blank')
        });

        $('.btnLink').click(function(e){
            var id = $(this).attr('data-id');
            var element = $(this);
            element.attr('disabled', 'disabled');

            $.ajax({
                url: '/publisher/gerar-link-usuario',
                method: 'GET',
                data: {
                    idMateria: id
                },success: function(res){
                    if(res.status == 'ok'){
                        $('#modalGerarLink').modal('show');

                        $('#modalLink').val(res.link);
                        $('#modalTitulo').val(res.titulo);

                        $('#btnGerar').attr('href', '/publisher/gerar-tag-instagram/' + res.idLink);
                    }
                },error: function(err){
                    Swal.fire( 'Erro', 'Ocorreu um erro ao gerar o link. Tente novamente', 'error' );
                },complete: function(){
                    element.removeAttr('disabled', 'disabled');
                }
            });
        });
    });
</script>
</body>

</html>
<?php /**PATH /home/times-news/timesnews.network/resources/views/publisher/materias/meus_links.blade.php ENDPATH**/ ?>