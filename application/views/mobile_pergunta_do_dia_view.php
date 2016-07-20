<!DOCTYPE html>
<html>
    <head>
        <title>Olimpíadas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="favicon.ico">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/js/jquery.mobile-1.4.5/jquery.mobile.theme-1.4.5.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/fonts/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <script src="<?php echo base_url(); ?>assets/js/jquery.mobile-1.4.5/demos/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
        <script src="lib/js/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>   
    </head>

    <body>
        <div data-role="page" id="Login">
            <div data-role="header">
                <h1>PALPITE OLÍMPICO</h1>
            </div><!-- /header -->

            <div role="main" class="ui-content">
                <h2 class="text-center">Quem ganhará o jogo Brasil x Chile?</h2>
                <form action="/app/resposta/" method="post" id="form-resposta" data-ajax="false">

                    <fieldset data-role="controlgroup">
                        <input type="radio" name="radio-choice" id="radio-choice-1" value="choice-1" />
                        <label for="radio-choice-1">Brasil</label>

                        <input type="radio" name="radio-choice" id="radio-choice-2" value="choice-2"  />
                        <label for="radio-choice-2">Chile</label>

                        <input type="radio" name="radio-choice" id="radio-choice-3" value="choice-3"  />
                        <label for="radio-choice-3">Empate</label>
                    </fieldset>
                    <button value="submit-value" name="submit" data-theme="b" type="submit" class="ui-btn-hidden" aria-disabled="false">Submit</button>

                </form>

            </div><!-- /content -->
            <div data-role="footer" data-position="fixed">		
                <div data-role="navbar" role="navigation" data-iconpos="top"  >
                    <ul>
                        <li><a href="/app/pergunta-do-dia/"    data-ajax="false" data-corners="false" data-shadow="true"     data-iconshadow="true" data-iconpos="top"><span class="fa fa-question-circle"></span><br />PERGUNTA<br />DO DIA</a></li>
                        <li><a href="/app/quadro-de-medalhas/" data-ajax="false" data-corners="false" data-shadow="false"    data-iconshadow="true" data-iconpos="top"><span class="fa fa-globe"></span><br />QUADRO<br />DE MEDALHAS</a></li>
                        <li><a href="/app/noticias"            data-ajax="false" data-corners="false" data-shadow="false"    data-iconshadow="true" data-iconpos="top"><span class="fa fa-newspaper-o"></span><br />NOTÍCIAS<br />OLÍMPICAS</a></li>
                    </ul>
                </div>
            </div><!-- /footer -->
        </div><!-- /page -->


        <div data-role="page" id="cadastro">
            <div data-role="header">
                <a href="index.html" data-role="button" data-icon="home" data-iconpos="notext">home</a> 
                <h1>CADASTRO</h1>
            </div><!-- /header -->
            <div role="main" class="ui-content">

                <form id="cadastroForm" action="http://localhost:8999/cadastrar.php" method="post">
                    <label for="matrícula" class="ui-hidden-accessible">Matrícula</label>
                    <input type="number" name="matricula" id="matricula" value="" placeholder="000000" pattern="[0-9]*" />

                    <label for="nome_completo" class="ui-hidden-accessible">Nome Completo</label>
                    <input type="text" name="nome_completo" id="nome_completo" value="" placeholder="Nome Completo"/>

                    <label for="data_nascimento" class="ui-hidden-accessible">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" value="" placeholder="Data de Nascimento"/>

                    <label for="email" class="ui-hidden-accessible">Email</label>
                    <input type="email" name="email" id="email" value="" placeholder="Email"/>

                    <label for="telefone" class="ui-hidden-accessible">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" value="" placeholder="Telefone"/>

                    <label for="cidade" class="ui-hidden-accessible">Cidade</label>
                    <input type="text" name="cidade" id="cidade" value="" placeholder="Cidade"/>

                    <label for="estado" class="ui-hidden-accessible">Estado</label>
                    <input type="text" name="estado" id="estado" value="" placeholder="Estado"/>

                    <label for="projeto_area" class="ui-hidden-accessible">Projeto / Área</label>
                    <input type="text" name="projeto_area" id="projeto_area" value="" placeholder="Projeto / Área"/>

                    <label for="senha" class="ui-hidden-accessible">Senha</label>
                    <input type="text" name="senha" id="senha" value="" placeholder="senha"/>

                    <input type="submit" name="submit" id="submit" value="CADASTRAR">
                </form>

                <div data-role="popup" id="erroCadastro" data-dismissible="false">
                    <div role="main" class="ui-content">
                        <h3 class="mc-text-danger">Erro ao cadastrar</h3>
                        <p>Houve um problema ao tentar enviar seu cadastro.</p>
                        <p>Por favor, tente novamente e se o erro persistir, entre em contato conosco.</p>
                        <div class="mc-text-center">
                            <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a>
                        </div>
                    </div>
                </div>

                <div data-role="popup" id="erroCadastrado" data-dismissible="false">
                    <div role="main" class="ui-content">
                        <h3 class="mc-text-danger">Usuário já cadastrado</h3>
                        <p>Cadastro já existente</p>
                        <p>Para receber a senha novamente, clique em "Esqueci a senha" na tela de login</p>
                        <div class="mc-text-center">
                            <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>