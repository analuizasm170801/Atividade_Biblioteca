<?php
// Verificar se o parâmetro "id" foi enviado via GET
if (isset($_GET['id'])) {
    // Dados de conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tarefasja";

    // Conectar ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);


    // Obter o ID da tarefa a partir do parâmetro enviado via GET
    $taskId = $_GET['id'];

    // Consulta SQL para obter os detalhes da tarefa com base no ID
    $sql = "SELECT * FROM tasks2 WHERE id = $taskId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obter os detalhes da tarefa como um array associativo
        $row = $result->fetch_assoc();

        // Exibir os detalhes da tarefa em uma lista bonita
        echo "<h2>Detalhes da Tarefa</h2>";
        echo "<ul>";
        echo "<li><strong>Título:</strong> " . $row['title'] . "</li>";
        echo "<li><strong>Descrição:</strong> " . $row['description'] . "</li>";
        echo "<li><strong>Data de Vencimento:</strong> " . $row['due_date'] . "</li>";
        echo "<li><strong>Status:</strong> " . $row['status'] . "</li>";
        echo "</ul>";

        // Botão para voltar ao arquivo index.php
        echo "<a href='index.php' style='margin-top: 10px; display: inline-block;'>Voltar</a>";
    } else {
        // Mensagem de erro se a tarefa não for encontrada
        echo "<h2>Tarefa não encontrada</h2>";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
    
} else {
    // Mensagem de erro se o parâmetro "id" não for fornecido
    echo "<h2>Parâmetro 'id' não fornecido</h2>";
}
?>
