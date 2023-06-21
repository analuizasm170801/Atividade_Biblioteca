<?php
// Verificar se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados enviados no corpo da requisição
    $requestData = json_decode(file_get_contents("php://input"), true);

    // Verificar se os dados necessários foram recebidos
    if (isset($requestData['status']) && isset($requestData['taskId'])) {
        // Dados de conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tarefasja";

        // Conectar ao banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Obter o status e o ID da tarefa
        $status = $requestData['status'];
        $taskId = $requestData['taskId'];

        // Atualizar o status da tarefa no banco de dados
        $sql = "UPDATE tasks2 SET status = '$status' WHERE id = $taskId";
        if ($conn->query($sql) === TRUE) {
            // Resposta em formato JSON indicando sucesso
            echo json_encode(array("success" => true));
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
    }  
} 
?>
