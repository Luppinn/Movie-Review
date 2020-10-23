<?php
include 'DBconnection.php';

//Add Comentario
if($_POST != NULL){
    $comentario = $_POST['comentario'];
    $nota = $_POST['nota'];
    $id = $_GET["id"];

    
    if($nota>=1 and $nota<=5){
        $sql = "INSERT INTO avaliacao (id,nota,comentario) VALUES ($id,$nota,'$comentario')";
        mysqli_query($db,$sql);
    } else {
        echo("Nota deve ser um numero de 1 a 5!");
    }
}

header('Location: comentar.php?id='.$_GET['id']);
?>
