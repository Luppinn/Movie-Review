<?php
    include 'DBconnection.php';
    //Delete Comentario
    function delete($comentario){
        include 'DBconnection.php';
        $sql= "DELETE FROM avaliacao WHERE comentario='$comentario'";
        mysqli_query($db,$sql);
    }

    if($_POST['comentario'] != ''){
        delete($_POST['comentario']);
        
    }
?>