<!doctype html>
<html lang="pt-BR">
  <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>

  <body>
  <ul class="nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link active" href="http://localhost/view/index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/view/addFilme.php">Adicionar Filme</a>
    </li>
  </ul>
      <div class="container-fluid" id="mainbox">
        <h1>Cadastrar Filme</h1>
        <form action="" method="POST" enctype="multipart/form-data" onsubmit="alert('Cadastrado!')">
            <div class="form-group">
                <input type="text" name="titulo" class="form-control is-invalid" id="formGroupExampleInput" placeholder="Título" required>
                <div class="invalid-feedback">
                    Insira o Título do Filme
                </div>
            </div>
            <label>Select Image File:</label>
            <input type="file" id="file" name="file">
            <input type="submit" name="submit">
        </form>

        <?php
        require_once '../controller/DBconnection.php';
        
          if($_POST['titulo'] != NULL){
            $titulo = $_POST['titulo'];
            $sql = "INSERT INTO filme (titulo) VALUES ('$titulo')";
            mysqli_query($db,$sql);
          }
          if($_FILES['file']['name'] != NULL){
            if(isset($_POST['submit'])){
              $filename = $_FILES["file"]["name"]; 
              $tempname = $_FILES["file"]["tmp_name"]; 
              $folder = "../uploads/".$filename;
              

              $sql = "INSERT INTO images (file_name) VALUES ('$filename')";
              mysqli_query($db,$sql);
              if (move_uploaded_file($tempname, $folder))  { 
                $msg = "Image uploaded successfully"; 
              }else{ 
                $msg = "Failed to upload image"; 
              }
            }
          }
            
        ?>

      </div>
  </body>
</html>