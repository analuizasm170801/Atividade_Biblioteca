<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "tarefasja";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$title = $_POST["title"];
$description= $_POST["description"];
$due_date = $_POST["due_date"];


$result_gerenciador = "INSERT INTO tasks2 (title, description, due_date) VALUES ('$title', '$description', '$due_date')";
$resultado_gerenciador= mysqli_query($conn, $result_gerenciador);

header('Location: ../public/index.php');

?>