<?php

//$link = mysqli_connect("localhost", "id20445259_admin", "S3n@c2023SAN", "id20445259_calendariobemestar");
$link = mysqli_connect("localhost", "root", "", "calendariobemestar");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$nome = mysqli_real_escape_string($link, $_REQUEST['nome']);
$sobrenome = mysqli_real_escape_string($link, $_REQUEST['sobrenome']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$unidade = mysqli_real_escape_string($link, $_REQUEST['unidade']);
$senha = mysqli_real_escape_string($link, $_REQUEST['senha']);

$criptografada = base64_encode($senha);
echo $criptografada;

 
// Attempt insert query execution
$sql = "INSERT INTO usuario (nome, sobrenome, email, unidade, senha) VALUES ('$nome', '$sobrenome', '$email', '$unidade', '$criptografada')";
if(mysqli_query($link, $sql)){
    
    header("Location: userconfirm.html");
    die();
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>