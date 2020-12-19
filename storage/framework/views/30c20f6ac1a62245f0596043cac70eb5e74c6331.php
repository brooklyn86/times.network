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
    <title>Solicitação de Saque</title>
    <link rel="apple-touch-icon" href="/assets_admin/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
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
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/plugins/forms/checkboxes-radios.min.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/app-assets/css/plugins/pickers/daterange/daterange.min.css">
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
                <h3 class="content-header-title mb-0 d-inline-block">Listar Solicitação de Saque</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/publisher/dashboard">Publisher</a></li>
                            <li class="breadcrumb-item"><a href="#">Financeiro</a></li>
                            <li class="breadcrumb-item active">Solicitações de Saque</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right">
                    <button class="btn btn-danger dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações Rápidas</button>
                    <div class="dropdown-menu arrow">
                        <a class="dropdown-item" href="/admin/usuarios/cadastrar">Minhas Solicitações de Saque</a>
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
                                    Ocorreu um erro ao cadastrar o cliente. Verifique os campos destacados e tente novamente
                                </div>
                                ';
                    }
                    ?>

                    <div class="card box-shadow-1 border-info">
                        <div class="card-header card-head-inverse bg-info">
                            <h4 class="card-title text-white" id="basic-layout-form">Listar Solicitação de Saque</h4>
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
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered dataex-html5-export">
                                        <thead>
                                            <th>Data de Solicitação</th>
                                            <th>Valor Solicitado</th>
                                            <th>Taxas</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if(count($sql) > 0){
                                            foreach($sql as $dados){

                                                if($dados->status == 1){
                                                    //solicitado
                                                    $status = '<div class="badge badge-primary">Solicitado em '.$dados->dataSolicitacaoFormat.'</div>';
                                                }elseif($dados->status == 2){
                                                    //em processamento
                                                    $status = '<div class="badge badge-warning">Processando em '.$dados->dataProcessandoFormat.'</div>';
                                                }elseif($dados->status == 3){
                                                    //pagamento efetuado
                                                    $status = '<div class="badge badge-success">Pagamento efetuado em '.$dados->dataTransferenciaFormat.'</div>';
                                                }elseif($dados->status == 4){
                                                    //solicitacao cancelada
                                                    $status = '<div class="badge badge-danger">Cancelamento efetuado em '.$dados->dataCancelamentoFormat.'</div>';
                                                }

                                                echo '
                        <tr data-id="'.$dados->id.'">
                            <td>'.$dados->dataSolicitacaoFormat.'</td>
                            <td>R$ '.number_format($dados->valorSolicitado,2,',','.').'</td>
                            <td>R$ '.number_format($dados->taxas,2,',','.').'</td>
                            <td>'.$status.'</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </button>
                                    <div class="dropdown-menu arrow">';
                                        if($dados->status == 1){
                                            echo '<a class="dropdown-item clickCancelar" href="#" data-id="'.$dados->id.'">Cancelar</a>';
                                        }elseif($dados->status == 2){

                                        }elseif($dados->status == 3){
                                            echo '<a class="dropdown-item clickVerComprovante" data-comprovante="'.$dados->anexo.'" href="#" data-id="'.$dados->id.'">Visualizar Comprovante</a>';
                                        }elseif($dados->status == 4){

                                        }
                                    echo '

                                    </div>
                                </div>
                            </td>
                        </tr>
                        ';
                                            }
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->

<div class="modal fade text-left" id="modalVisualzarComprovante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-warning white">
				<h4 class="modal-title white" id="myModalLabel12"><i class="la la-tree"></i> Visualizar Comprovante</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
                    <div class="col-md-12">
                        <img src="" class="imagem">
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fechar</button>

			</div>
		</div>
	</div>
</div>


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<input name="currentId" type="hidden">

<script src="/assets_admin/app-assets/vendors/js/vendors.min.js"></script>

<script src="/assets_admin/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="/assets_admin/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="/assets_admin/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
<script src="/assets_admin/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
<script src="/assets_admin/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>

<script src="/assets_admin/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/tables/jszip.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/tables/pdfmake.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/tables/vfs_fonts.js"></script>
<script src="/assets_admin/app-assets/vendors/js/tables/buttons.html5.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/tables/buttons.print.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/tables/buttons.colVis.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="/assets_admin/app-assets/vendors/js/extensions/polyfill.min.js"></script>
<script src="/assets_admin/app-assets/js/core/app-menu.min.js"></script>
<script src="/assets_admin/app-assets/js/core/app.min.js"></script>
<script src="/assets_admin/app-assets/js/scripts/footer.min.js"></script>
<script src="/assets_admin/assets/js/jquery.mask.min.js"></script>
<script src="/assets_admin/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.min.js"></script>
<script src="/assets_admin/app-assets/js/scripts/forms/checkbox-radio.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(e){
        $('input[name=cpf]').mask('000.000.000-00');
        $('input[name=cep]').mask('00000-000');
        $('input[name=valor]').mask('000.000.000,00', { reverse: true });

        $('.clickVerComprovante').click(function(e){
            var id = $(this).attr('data-id');
            var comprovante = $(this).attr('data-comprovante');

            $('.imagem').attr( 'src', 'http://timesnews.network/public_img/' + comprovante );

            $('#modalVisualzarComprovante').modal('show');
        });

        $('#btnSalvar').click(function(e){
            var element = $(this);
            element.attr('disabled', 'disabled');
            element.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

            $.ajax({
                url: '/admin/creditos/lancamento',
                method: 'GET',
                data: {
                    id: $('input[name=currentId]').val(),
                    valor: $('input[name=valor]').val(),
                    idTipoMovimentacao: $('select[name=idTipoMovimentacao]').val(),
                    tipoUsuario: '1'
                },
                success: function(res){
                    if(res.status == 'ok'){
                        Swal.fire( 'Sucesso', 'Lançamento de Crédito para o cliente foi efetuado com sucesso', 'success' );
                    }else{
                        Swal.fire( 'Erro', 'Ocorreu um erro ao efetuar lançamento. Tente novamente', 'error' );
                    }
                },error: function(err){
                    Swal.fire( 'Erro', 'Ocorreu um erro ao efetuar lançamento. Tente novamente', 'error' );
                },complete: function(){
                    element.removeAttr('disabled');
                    element.html('Efetuar Lançamento');

                    $('#modalLancarCredito').modal('hide');
                }
            });
        });

        $('#btnFiltrar').click(function(e){
            var element = $(this);
            element.attr('disabled', 'disabled');
            element.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

            $('#formFiltrar').submit();
        });

        $('.dataBrasil').pickadate({
            format: 'dd/mm/yyyy',
            monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            today: 'Hoje',
            clear: 'Limpar',
            close: 'Fechar',
            labelMonthNext: 'Próximo Mês',
            labelMonthPrev: 'Mês Anterior',
            labelMonthSelect: 'Selecione um mês',
            labelYearSelect: 'Selecione um ano',
        });


        $('body').on('click', '.clickCancelar', function(e){
            var id = $(this).attr('data-id');

            Swal.fire({
                title: 'Cancelar a solicitação?',
                text: "Tem certeza que deseja cancelar essa solicitação? Essa ação não pode ser desfeita",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, quero cancelar!',
                cancelButtonText: 'Voltar',
            }).then((result) => {
                if (result.value) {
                    window.location.href = '/publisher/minhas-solicitacoes-saque/cancelar/' + id;
                }
            });
        });

        $('.clickAlterarSenha').click(function(e){
            var id = $(this).attr('data-id');
            $('input[name=currentId]').val(id);

            $('#modalNovaSenha').modal('show');
        });

        
    });
</script>
</body>

</html>
<?php /**PATH /home/times-news/webapps/timesnews_network/resources/views/publisher/financeiro/minhas_solicitacoes.blade.php ENDPATH**/ ?>