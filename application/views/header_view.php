<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Palpite Olímpico</title>
        
        <link href="<?php echo base_url(); ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,100,300' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>">PALPITE OLÍMPICO</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <?php if($this->session->userdata('logged_in')==TRUE): ?>
                            <li><a href="<?php echo base_url(); ?>app/pergunta-do-dia/">PERGUNTA DO DIA</a></li>
                            <li><a href="<?php echo base_url(); ?>app/resultado/">RESULTADOS</a></li>
                            <li><a href="<?php echo base_url(); ?>app/quadro-de-medalhas/">QUADRO DE MEDALHAS</a></li>
                            <li><a href="<?php echo base_url(); ?>app/noticias/">NOTÍCIAS</a></li>
                            <?php endif;?>
                        </ul>
                        <?php if($this->session->userdata('level')=='admin'): ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url()?>admin/login/logout/">Logout</a></li>
                        </ul>
                        <?php else: ?>
                            <?php if($this->session->userdata('logged_in')==TRUE): ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li>OLÁ <span class="user"><?php echo (isset($user))?$user:""; ?></span> | <a href="<?php echo base_url()?>login/logout/">SAIR</a></li>
                            </ul>
                            <?php endif;?>
                        <?php endif;?>
                        
                    </div><!--/.nav-collapse -->
                </div>
            </nav>