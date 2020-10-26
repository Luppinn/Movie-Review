<script src="../js/script.js"></script>
<?php
include 'DBconnection.php';

//Add Comentario
if($_POST != NULL){
    $comentario = $_POST['comentario'];
    $nota = $_POST['nota'];
    $id = $_GET["id"];

    
    if($nota>=1 and $nota<=5){
        $sql = "INSERT INTO avaliacao (id_filme,nota,comentario) VALUES ($id,$nota,'$comentario')";
        mysqli_query($db,$sql);
    } else {
       validation();
    }
}

header('Location: ../view/comentar.php?id='.$_GET['id']);
?>