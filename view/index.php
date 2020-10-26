<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="../css/index.css">-->
    <title>Review de Filmes</title>
  </head>

  <body>
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

    <div class="container-md" id="screen">
        <br>
      <h3 style="font-size:20px">Catálogo</h3>
      <hr style="border:1px solid black">
    </section>

    <div class="container-md" id="catalogo" style="padding: 0px;">
      <?php

        include_once '../controller/DBconnection.php';
        $images = array();
        $images = $db->query("SELECT file_name FROM images"); 
        $images = $images->fetch_assoc();
        //print_r($images);
        // print_r($images[file_name]);exit;
        $catalogo = $db->query("SELECT titulo FROM filme");
        $catalogo = mysqli_fetch_assoc($catalogo);
        
        //print_r(mysqli_query($GLOBALS['global_conexao_mysqli'],$catalogo));exit;
        $i = 0;


        $titulos = $db->query("SELECT titulo FROM filme");
        while($exibir=mysqli_fetch_array($titulos)){
          $titulo[] = $exibir['titulo'];
        }
        $imagens = $db->query("SELECT file_name FROM images");
        while($exibir=mysqli_fetch_array($imagens)){
          $imagem[] = $exibir['file_name'];
        }

        foreach ($titulo as $value){
          $i++;
          $j=$i-1;
            echo "
            <div class='card' style='width: 10rem; display:inline-block;'>
              <img src='/uploads/$imagem[$j]' class='card-img-top' alt='images' style='height:200px;width:158px'>
              <div class='card-body'>
                <h5 class='card-title'>$titulo[$j]</h5>
                <a href='/view/comentar.php?id=$i' class='btn btn-primary'>Review</a>
                <form action='/view/comentar.php?id=$i' method='GET'>
              </div>
            </div>
          ";
          
        }
      ?>

    </div>

    <footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </footer>
  
  </body>

<style>
  body {
    background-color:#e8e4e3;
  }
  #navbar {
    color: white;
  }
</style>

</html>