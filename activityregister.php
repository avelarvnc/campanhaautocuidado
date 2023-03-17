<?php
session_start();
//$link = mysqli_connect("localhost", "id20445259_admin", "S3n@c2023SAN", "id20445259_calendariobemestar");
$link = mysqli_connect("localhost", "root", "", "calendariobemestar");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$data = mysqli_real_escape_string($link, $_REQUEST['data']);
$atividade = mysqli_real_escape_string($link, $_REQUEST['atividade']);
$usuario = mysqli_real_escape_string($link, $_REQUEST['uid']);
 
// Attempt insert query execution
$sql = "INSERT INTO atividade (dtAtividade , descricao, idUsuario) VALUES ('$data', '$atividade', '$usuario')";
if(mysqli_query($link, $sql)){
    
    header("Location: confirm.html");
    die();
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>