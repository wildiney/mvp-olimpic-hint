<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: text/html; charset=utf-8');

$url = "http://globoesporte.globo.com/jogos-pan-americanos/medalhas.html";
$ch = curl_init();
$proxy = 'proxylatam.indra.es:8080';
$proxyauth = 'wfpimentel:Indra0616';

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
$resultado = curl_exec($ch);
curl_close($ch);
$regex = "/<section class=\"quadro-de-medalhas\">(.*)section>/is";
preg_match($regex, $resultado, $matches);
$codigo = $matches[0]; //set the file_contents var to the matched elements

$patterns = array();
$replaces = array();

$patterns[] = '/<h2(.*)h2>/';
$patterns[] = '/<h3(.*)h3>/';
$replaces[] = '';
$replaces[] = '';


$codigo = preg_replace($patterns, $replaces, $codigo)
?>

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
        <link href="<?php echo base_url(); ?>assets/css/layout.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>assets/js/jquery.mobile-1.4.5/demos/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
        <script src="lib/js/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>   
    </head>

    <body>
        <div data-role="page" id="quadro_de_medalhas">
            <div data-role="header">
                <h1>PALPITE OLÍMPICO</h1>
            </div><!-- /header -->

            <div role="main" class="ui-content">
                <h2 class="text-center">QUADRO DE MEDALHAS</h2>
                <div class="" style="height:50%; overflow: auto;">
                    <?php echo $codigo ?>
                </div>

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
    </body>
</html>