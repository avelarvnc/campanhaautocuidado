<?php
session_start();
//$link = mysqli_connect("localhost", "id20445259_admin", "S3n@c2023SAN", "id20445259_calendariobemestar");
$link = mysqli_connect("localhost", "root", "", "calendariobemestar");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$senha = mysqli_real_escape_string($link, $_REQUEST['senha']);

$criptografada = base64_encode($senha);

 
//$sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`usuario` = '".$usuario ."') AND (`senha` = '". sha1($senha) ."') AND (`ativo` = 1) LIMIT 1";

// Attempt insert query execution
$sql = "SELECT * FROM usuario WHERE email = '".$email."' AND senha = '".$criptografada."'";
$result = mysqli_query($link,$sql);
$row = $result->fetch_assoc();
$count = mysqli_num_rows($result);

if ($count === 1)
{
   
    $_SESSION["uid"] = $row['idUsuario'];
    $_SESSION["uname"] = $row['nome'];

    header("Location: feed.php");
    die();
}
else
{
    echo "ERRO";
}

mysqli_close($link);


?>