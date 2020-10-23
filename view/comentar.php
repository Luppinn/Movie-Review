<?php
include '../controller/DBconnection.php';
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="/css/comentar.css">
    </head>


    <body style="overflow-x: hidden;">
    <nav class="navbar navbar-light" style="background-color:white" id="navbar">
        <a class="navbar-brand" href="/view/index.php">
            <img src="/assets/network3.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            Contabilivre Movies
        </a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
            <a class="nav-link active" href="http://localhost/view/index.php">Home</a>
            </li>
            <li>
            <a class="nav-link" href="http://localhost/view/addFilme.php">Adicionar Filme</a>   
            </li>
        </ul>
    </nav>
        <?php
        //Get the Movie's Image
            $images = array();
            $images = $db->query("SELECT file_name FROM images"); 
            $images = $images->fetch_assoc();
        ?>

        <?php 
            $comentario = $db->query("SELECT comentario FROM avaliacao");
            $nota = $db->query("SELECT nota FROM avaliacao");

            $comentario = $comentario->fetch_assoc();
            $nota = $nota->fetch_assoc();
        ?>

        <div class="jumbotron jumbotron-fluid" id="screen">
            <p></p>
            <div class="row">
                <div class="col-3">
                    <div class="container-sm" id="img" style="width:300px;height:300px;display:grid;margin:0px;">
                        <?php echo"<img src='/uploads/$images[file_name]' style='width:250px;height:300px'>"?>
                    </div>
                </div>
                    <div class="col">
                        <div class="container-sm" style="width: 400px;max-width:400px;max-height:300px;margin:0px;overflow:scroll;vertical-align:top;float:left;display:grid;overflow-x: hidden;">
                        <h3 style="font-size:20px;margin-left:15px">Comentários</h3>
                        <hr style="border: 1px solid grey;">
                            <ul class="list-group">
                                <?php
                                    $cmnt = $db->query("SELECT nota,comentario FROM avaliacao ORDER BY id desc");
                                    while($exibir=mysqli_fetch_array($cmnt)){
                                       // print_r($exibir);
                                        $comentario = $exibir['comentario'];
                                        $nota = $exibir['nota'];

                                        echo "
                                            <div class='container-md' id='comment'>
                                                <p style='display:inline-block'>Nota: $nota</p>
                                                <button type='button' onclick='fdeletar(\"$comentario\")' class='btn btn-outline-danger' style='width:75px;display:inline-block;float:right'>Delete</button>
                                                <p>$comentario</p>
                                            </div>
                                        ";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <form action="inserirComentario.php?id=<?php print $_GET['id'];?>" method="POST" style="margin-left:15px;vertical-align:top;float:left">
                        <input id="inputtext" type="text" name="comentario" class="form-control" id="formGroupExampleInput" placeholder="Comentario" required>
                        <input id="inputnota"type="number" name="nota" class="form-control" id="formGroupExampleInput" placeholder="Nota [0~5]"required>
                        <input type="submit" value="submit" onclick="reload()">
                    </form> 
                </div>
            </div>
        </div>
    
<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="../js/script.js"></script>
    </body>
</html>