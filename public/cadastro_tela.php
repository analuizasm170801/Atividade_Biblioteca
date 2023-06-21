<?php
include_once "../generic/Autoload.php";
use generic\Seguranca;

?>
<html lang="pt-br">

	<body>
		<h1>Cadastrar Tarefa</h1>
		<form method="POST" action="cadastrar_tarefa.php">
			<label>Título: </label>
			<input type="text" name="title" placeholder="Digite o título da tarefa"><br><br>
			
			<label>Descrição: </label>
			<input type="text" name="description" placeholder="Digite a descrição"><br><br>

            <label>Data de vencimento: </label>
			<input type=date name="due_date" placeholder="Digite a data de vencimento"><br><br>

			<input type="submit" value="Cadastrar" >
		</form>
	</body>
</html>


