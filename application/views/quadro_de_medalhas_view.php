<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: text/html; charset=utf-8');

$url = "http://globoesporte.globo.com/jogos-pan-americanos/medalhas.html";
$ch = curl_init();
$proxy = 'proxylatam.indra.es:8080';
$proxyauth = 'wfpimentel:Indra0616';

curl_setopt($ch, CURLOPT_URL,$url);
if(ENVIRONMENT=='development'){
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
}
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

<div class="col-sx-12">
    <div id="error">
            
    </div>
    <div id="quadro">
        <?php echo $codigo?>
    </div>
</div>