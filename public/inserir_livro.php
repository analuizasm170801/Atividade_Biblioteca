<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "biblioteca";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$autor= filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
$genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'livroID', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_biblioteca = "INSERT INTO livros (autor, genero, titulo, livroID) VALUES ('$autor', '$genero', '$titulo', '$id')";
$resultado_biblioteca = mysqli_query($conn, $result_biblioteca);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Livro cadastrado com sucesso</p>";
	header("Location: dashboard.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Livro não foi cadastrado com sucesso</p>";
	header("Location: dashboard.php");
}