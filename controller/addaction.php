<?php
    $pdo = new PDO('mysql:host=localhost;dbname=filmedb', 'root', 'root');
    include 'Filme.php';

    $filme = new Filme($titulo);
    var_dump($filme);
    $serializedObject = serialize($filme);

    $stmt = $pdo->prepare("INSERT INTO filmes (data) VALUES (?));

    $stmt->execute(array(
        $serializedObject
    ));
    
?>

#Colocar dentro de uma função e chamar no onsubmit event no addFilme.php