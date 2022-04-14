<?php
header("access-control-allow-origin: *");
header("access-control-allow-methods: GET, POST, OPTIONS");
header("access-control-allow-credentials: true");
header("access-control-allow-headers: Content-Type, *");
header("Content-type: application/json");

require_once("config/config.php");

$conn = new mysqli($mysql_hostname,$mysql_user, $mysql_password, $mysql_database);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} 

if ($_POST['submit']) {
    $matricula          = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
    $nome_completo      = filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_STRING);
    $data_nascimento    = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
    $email              = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefone           = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $cidade             = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $estado             = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $projeto_area       = filter_input(INPUT_POST, 'projeto_area', FILTER_SANITIZE_STRING);
    $senha              = sha1(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    $sql = "SELECT matricula FROM cadastros WHERE matricula =' $matricula ' LIMIT 1";
    $result = $conn->query($sql) or die( $conn->error );

    if($result->num_rows > 0){
        $response_array['status'] = "cadastrado";
    } else {
        $sql  = "INSERT INTO cadastros (matricula, nome_completo, data_nascimento, email, telefone, cidade, estado, projeto_area, senha) ";
        $sql .= "VALUES ('".$matricula."', '".$nome_completo."', '".$data_nascimento."', '".$email."', '".$telefone."', '".$cidade."', '".$estado."', '".$projeto_area."', '".$senha."')";
        $result = $conn->query($sql) or die($conn->error);
        
        if($result){
             $response_array['status'] = "success";
        } else {
             $response_array['status'] = "error";
        }
    }
     
    echo json_encode($response_array);
}
$conn->close();
?>