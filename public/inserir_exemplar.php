<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "biblioteca";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$id_exemplar = filter_input(INPUT_POST, 'exemplarID', FILTER_SANITIZE_STRING);
//$id_livro = filter_input(INPUT_POST, 'livroID', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_biblioteca = "INSERT INTO exemplares (status, exemplarID) VALUES ('$status', '$id_exemplar')";
$resultado_biblioteca = mysqli_query($conn, $result_biblioteca);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Livro cadastrado com sucesso</p>";
	header("Location: dashboard.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Livro não foi cadastrado com sucesso</p>";
	header("Location: dashboard.php");
}