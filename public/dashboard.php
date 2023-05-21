<?php
include_once "../generic/Autoload.php";
use generic\Seguranca;

Seguranca::verificaConexao();

?>

<html>
<body>
    <h1>Biblioteca</h1>

    <?php
    // Conectar ao banco de dados e buscar os dados da tabela "livros"
    $conexao = new PDO("mysql:host=localhost;dbname=biblioteca", "root", "");
    $consultaLivros = $conexao->query("SELECT COUNT(*) FROM livros"); 
    $totalLivros = $consultaLivros->fetchColumn();

    $consultaExemplares= $conexao->query("SELECT COUNT(*) FROM exemplares");
    $totalExemplares = $consultaExemplares->fetchColumn();

    $consultaEmprestados = $conexao->query("SELECT COUNT(*) FROM exemplares WHERE status = 'Emprestado'");
    $livrosEmprestados = $consultaEmprestados->fetchColumn();

    $consultaDisponiveis = $conexao->query("SELECT COUNT(*) FROM exemplares WHERE status = 'Disponível'");
    $livrosDisponiveis = $consultaDisponiveis->fetchColumn();
    ?>

    <p>Livros cadastrados: <?php echo $totalLivros; ?></p>
    <p>Quantidade de exemplares: <?php echo $totalExemplares; ?></p>
    <p>Exemplares emprestados: <?php echo $livrosEmprestados; ?></p>
    <p>Exemplares disponíveis: <?php echo $livrosDisponiveis; ?></p>

</body>
</html>

<!--tabela 2-->


<html>
<head>
    <title>Livros, Exemplares e Status</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Livros, Exemplares e Status</h1>

    <table>
        <tr>
            <th>Livro</th>
            <th>Quantidade de Exemplares</th>
            <th>Status do Exemplar</th>
        </tr>
        
        <?php
        // Conectar ao banco de dados e buscar os dados das tabelas "livros" e "exemplares"
        $conexao = new PDO("mysql:host=localhost;dbname=biblioteca", "root", "");

        // Buscar os dados da tabela 'livros'
        $consultaLivros = $conexao->query("SELECT * FROM livros");

        while ($livro = $consultaLivros->fetch(PDO::FETCH_ASSOC)) {
            // Buscar a quantidade de exemplares para o livro atual
            $consultaExemplares = $conexao->prepare("SELECT COUNT(*) FROM exemplares WHERE livroID = :livroID");
            $consultaExemplares->bindParam(':livroID', $livro['livroID']);
            $consultaExemplares->execute();
            $quantidadeExemplares = $consultaExemplares->fetchColumn();

            // Buscar o status dos exemplares para o livro atual
            $consultaStatus = $conexao->prepare("SELECT status FROM exemplares WHERE livroID = :livroID");
            $consultaStatus->bindParam(':livroID', $livro['livroID']);
            $consultaStatus->execute();
            $statusExemplares = $consultaStatus->fetchAll(PDO::FETCH_COLUMN);

            echo "<tr>";
            echo "<td>{$livro['titulo']}</td>";
            echo "<td>{$quantidadeExemplares}</td>";
            echo "<td>" . implode(", ", $statusExemplares) . "</td>";
            echo "</tr>";
        }
        ?>
        
    </table>
</body>
</html>



<html lang="pt-br">

	<body>
		<h1>Cadastrar Livro</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="inserir_livro.php">
			<label>Autor: </label>
			<input type="text" name="autor" placeholder="Digite o nome do autor"><br><br>
			
			<label>Titulo: </label>
			<input type="text" name="titulo" placeholder="Digite o nome do livro"><br><br>

            <label>Genero: </label>
			<input type="text" name="genero" placeholder="Digite o gênero do livro"><br><br>

            <label>ID do livro: </label>
			<input type="int" name="livroID" placeholder="Digite um ID para o livro"><br><br>
			
			<input type="submit" value="Cadastrar" >
		</form>
	</body>
    <body>
		<h1>Cadastrar Exemplar</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="inserir_exemplar.php">
		
            <label>ID do exemplar: </label>
			<input type="int" name="exemplarID" placeholder="Digite o um ID para o exemplar"><br><br>

            <label>ID do livro: </label>
			<input type="int" name="livroID" placeholder="Digite o ID do livro cadastrado"><br><br>

            <label>Status: </label>
			<input type="text" name="status" placeholder="Digite o status do exemplar 'Disponível' ou 'Emprestado'"><br><br>
			
			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>


