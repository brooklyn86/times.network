<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('publisher/cadastro', 'PublisherController@viewCadastro');
Route::post('publisher/cadastro', 'PublisherController@postCadastro');

Route::get('redator/cadastro', 'RedatorController@viewCadastro');
Route::post('redator/cadastro', 'RedatorController@postCadastro');

Route::get('teste-javascript', 'AdminController@testeJavaScript');


/*Route::get('contabiliza-acesso', 'ControleAcessoController@novoContabilizaAcesso');*/
Route::get('contabiliza-acesso', 'AdminController@contabilizaAcesso');
Route::get('ajax/retorno-resumo-publisher', 'PublisherController@retornoResumoPublisher');
Route::post('verify-recaptcha',  'AdminController@verifyRecaptcha');

Route::get('novo-contabiliza-acesso', 'ControleAcessoController@novoContabilizaAcesso');
Route::get('converte-acesso', 'ControleAcessoController@converteAcesso');

// Route::get('name-user/{id}', 'PublisherController@showNameUser');


Route::prefix('redator')->group(function(){
    Route::get('login', 'RedatorController@viewLogin');
    Route::post('login', 'RedatorController@postLogin');

    Route::group(['middleware' => ['authRedator']], function () {
        Route::get('/', 'RedatorController@viewDashboard');
        Route::get('/dashboard', 'RedatorController@viewDashboard');

        Route::get('materias/cadastrar', 'RedatorController@viewCadastrarMateria');
        Route::post('materias/cadastrar', 'RedatorController@postCadastrarMateria');
        Route::get('materias/minhas-materias', 'RedatorController@minhasMaterias');
        Route::get('materias/excluir/{id}', 'RedatorController@excluirMateria');
        Route::get('materias/editar/{id}', 'RedatorController@viewEditarMateria');
        Route::post('materias/editar/{id}', 'RedatorController@postEditarMateria');
        Route::get('materias/clique-dias', 'RedatorController@cliquePorDia');

        Route::get('meus-dados', 'RedatorController@viewMeusDados');
        Route::post('meus-dados', 'RedatorController@postMeusDados');
        Route::post('meus-dados/informacoes-pagamento', 'RedatorController@postMeusDadosInformacoesPagamento');

        Route::get('historico-movimentacao', 'RedatorController@viewHistoricoMovimentacao');
        Route::get('solicitar-saque', 'RedatorController@viewSolicitarSaque');
        Route::post('solicitar-saque', 'RedatorController@postSolicitarSaque');
        Route::get('minhas-solicitacoes-saque', 'RedatorController@listarMinhasSolicitacoes');
        //Route::get('minhas-solicitacoes-saque/cancelar/{id}', 'RedatorController@cancelarSolicitacao');

        Route::get('logout', 'RedatorController@logout');
    });
});

Route::prefix('publisher')->group(function(){
    Route::get('login', 'PublisherController@viewLogin');
    Route::post('login', 'PublisherController@postLogin');

    Route::get('gerar-tag-instagram/{id}', 'PublisherController@gerarTagInstagram');

    Route::group(['middleware' => ['authPublisher']], function () {
        Route::get('/', 'PublisherController@viewDashboard');
        Route::get('/dashboard', 'PublisherController@viewDashboard');

        Route::get('/meus-dados', 'PublisherController@viewMeusDados');
        Route::post('/meus-dados/informacoes', 'PublisherController@postMeusDadosInformacoes');
        Route::post('meus-dados/alterar-senha', 'PublisherController@postMeusDadosAlterarSenha');
        Route::post('meus-dados/informacoes-pagamento', 'PublisherController@postMeusDadosInformacoesPagamento');

        Route::get('materias', 'PublisherController@viewListarMaterias');
        Route::get('/meus-links', 'PublisherController@viewMeusLinks');

        Route::get('historico-movimentacao', 'PublisherController@viewHistoricoMovimentacao');
        Route::get('solicitar-saque', 'PublisherController@viewSolicitarSaque');
        Route::post('solicitar-saque', 'PublisherController@postSolicitarSaque');
        Route::get('minhas-solicitacoes-saque', 'PublisherController@listarMinhasSolicitacoes');
        //Route::get('minhas-solicitacoes-saque/cancelar/{id}', 'PublisherController@cancelarSolicitacao');

        Route::get('meus-indicados', 'PublisherController@viewMeusIndicados');
        Route::get('meus-indicados/cliques-por-dia/{id}', 'PublisherController@meusIndicadosCliquePorDia');


        Route::get('gerar-link-usuario', 'PublisherController@gerarLinkUsuario');
        Route::get('meus-links', 'PublisherController@viewMeusLinks');

        Route::get('relatorios/cliques-por-dia', 'PublisherController@viewRelatoriosCliquePorDia');

        Route::get('faq/listar', 'PublisherController@viewListarFaq');

        Route::get('logout', 'PublisherController@logout');
    });
});

Route::prefix('gerente')->group(function(){
    Route::get('login', 'GerenciaController@viewLogin');
    Route::post('login', 'GerenciaController@postLogin');

    Route::group(['middleware' => 'authGerencia'], function() {
        Route::get('/', 'GerenciaController@viewDashboard');
        Route::get('/dashboard', 'GerenciaController@viewDashboard');

        Route::get('materias/cadastrar', 'GerenciaController@viewCadastrarMateria');
        Route::post('materias/cadastrar', 'GerenciaController@postCadastrarMateria');
        Route::get('materias/listar', 'GerenciaController@viewListarMaterias');
        Route::get('materias/editar/{id}', 'GerenciaController@viewEditarMateria');
        Route::post('materias/editar/{id}', 'GerenciaController@postEditarMateria');
        Route::get('materias/alterar-status/{id}', 'GerenciaController@alterarStatusMateria');
        Route::get('materias/excluir/{id}', 'GerenciaController@excluirMateria');

        Route::get('meus-dados', 'GerenciaController@viewMeusDados');
        Route::post('meus-dados', 'GerenciaController@postMeusDados');

        Route::get('logout', 'GerenciaController@logout');
    });
});

Route::prefix('financeiro')->group(function(){
    Route::get('login', 'FinanceiroController@viewLogin');
    Route::post('login', 'FinanceiroController@postLogin');

    Route::group(['middleware' => 'authFinanceiro'], function() {
        Route::get('/dashboard', 'FinanceiroController@viewDashboard');

        Route::get('saques/listar-solicitacoes', 'FinanceiroController@viewListarSolicitacoes');
        Route::get('saques/editar/{id}', 'FinanceiroController@viewEditarSolicitacao');
        Route::post('saques/editar/{id}', 'FinanceiroController@postEditarSolicitacao');
    });
});


Route::prefix('admin')->group(function(){
    Route::get('login', 'AdminController@viewLogin');
    Route::post('login', 'AdminController@postLogin');

    Route::group(['middleware' => 'authAdmin'], function() {
        Route::get('/', 'AdminController@viewDashboard');
        Route::get('dashboard', 'AdminController@viewDashboard');

        Route::get('contagem-promocao', 'ContagemPromocao@viewContagemPromocao');
        Route::get('contagem-promocao/iniciar', 'ContagemPromocao@inciarNovoPeriodo');
        Route::get('visualizar-periodo/{id}', 'ContagemPromocao@visualizarPeriodo');
        Route::get('finalizar-periodo/{id}', 'ContagemPromocao@finalizarPeriodo');

        Route::get('ganhos-gerais', 'ContagemPromocao@viewGanhosGerais');

        Route::get('admin-login/publisher/{id}', 'AdminController@entrarComoPublisher');
        Route::get('admin-login/redator/{id}', 'AdminController@entrarComoRedator');
        Route::get('admin-login/financeiro/{id}', 'AdminController@entrarComoFinanceiro');

        Route::get('configuracoes', 'AdminController@viewConfiguracoes');
        Route::post('configuracoes', 'AdminController@postConfiguracoes');

        Route::get('meus-dados', 'AdminController@viewMeusDados');
        Route::post('meus-dados', 'AdminController@postMeusDados');

        Route::get('usuarios/cadastrar', 'AdminController@viewCadastrarUsuario');
        Route::post('usuarios/cadastrar', 'AdminController@postCadastrarUsuario');
        Route::get('usuarios/listar', 'AdminController@viewListarUsuarios');
        Route::get('usuarios/editar/{id}', 'AdminController@viewEditarUsuario');
        Route::post('usuarios/editar/{id}', 'AdminController@postEditarUsuario');
        Route::get('usuarios/alterar-status/{id}', 'AdminController@alterarStatusUsuario');
        Route::get('usuarios/contador', 'AdminController@viewContadorAcessos');
        Route::get('usuarios/ver-indicados/{id}', 'AdminController@viewIndicados');

        Route::get('sites/cadastrar', 'AdminController@viewCadastrarSite');
        Route::post('sites/cadastrar', 'AdminController@postCadastrarSite');
        Route::get('sites/listar', 'AdminController@viewListarSites');
        Route::get('sites/editar/{id}', 'AdminController@viewEditarSite');
        Route::post('sites/editar/{id}', 'AdminController@postEditarSite');
        Route::get('sites/excluir/{id}', 'AdminController@excluirSite');

        Route::get('categorias/cadastrar', 'AdminController@viewCadastrarCategoria');
        Route::post('categorias/cadastrar', 'AdminController@postCadastrarCategoria');
        Route::get('categorias/listar', 'AdminController@viewListarCategorias');
        Route::get('categorias/editar/{id}', 'AdminController@viewEditarCategoria');
        Route::post('categorias/editar/{id}', 'AdminController@postEditarCategoria');
        Route::get('categorias/excluir/{id}', 'AdminController@excluirCategoria');

        Route::get('materias/cadastrar', 'AdminController@viewCadastrarMateria');
        Route::post('materias/cadastrar', 'AdminController@postCadastrarMateria');
        Route::get('materias/listar', 'AdminController@viewListarMaterias');
        Route::get('materias/editar/{id}', 'AdminController@viewEditarMateria');
        Route::post('materias/editar/{id}', 'AdminController@postEditarMateria');
        Route::get('materias/alterar-status/{id}', 'AdminController@alterarStatusMateria');
        Route::get('materias/excluir/{id}', 'AdminController@excluirMateria');
        Route::get('materias/clique-por-dia', 'AdminController@cliquePorDia');

        Route::get('redatores/cadastrar', 'AdminController@viewCadastrarRedator');
        Route::post('redatores/cadastrar', 'AdminController@postCadastrarRedator');
        Route::get('redatores/listar', 'AdminController@viewListarRedatores');
        Route::get('redatores/editar/{id}', 'AdminController@viewEditarRedator');
        Route::post('redatores/editar/{id}', 'AdminController@postEditarRedator');
        Route::get('redator/excluir/{id}', 'AdminController@excluirRedator');

        Route::get('gerentes/cadastrar', 'AdminController@viewCadastrarGerente');
        Route::post('gerentes/cadastrar', 'AdminController@postCadastrarGerente');
        Route::get('gerentes/listar', 'AdminController@viewListarGerente');
        Route::get('gerentes/editar/{id}', 'AdminController@viewEditarGerente');
        Route::post('gerentes/editar/{id}', 'AdminController@postEditarGerente');
        Route::get('gerentes/excluir/{id}', 'AdminController@excluirGerente');

        Route::get('creditos/lancamento', 'AdminController@postLancamentoCredito');
        Route::get('creditos/listar-lancamentos', 'AdminController@viewListarLancamentos');

        Route::get('saques/listar-solicitacoes', 'AdminController@viewListarSolicitacoes');
        Route::get('saques/editar/{id}', 'AdminController@viewEditarSolicitacao');
        Route::post('saques/editar/{id}', 'AdminController@postEditarSolicitacao');

        Route::get('faq/cadastrar', 'AdminController@viewCadastrarFaq');
        Route::post('faq/cadastrar', 'AdminController@postCadastrarFaq');
        Route::get('faq/listar', 'AdminController@viewListarFaq');
        Route::get('faq/editar/{id}', 'AdminController@viewEditarFaq');
        Route::post('faq/editar/{id}', 'AdminController@postEditarFaq');
        Route::get('faq/excluir/{id}', 'AdminController@excluirFaq');

        Route::get('financeiro/cadastrar', 'AdminController@viewCadastrarFinanceiro');
        Route::post('financeiro/cadastrar' ,'AdminController@postCadastrarFinanceiro');
        Route::get('financeiro/listar', 'AdminController@viewListarFinanceiro');
        Route::get('financeiro/editar/{id}', 'AdminController@viewEditarFinanceiro');
        Route::post('financeiro/editar/{id}', 'AdminController@postEditarFinanceiro');
        Route::get('financeiro/excluir/{id}', 'AdminController@excluirFinanceiro');

        Route::get('logout', 'AdminController@logout');
    });
});

Route::get('/', function () {
    return view('site.home.index');
});
