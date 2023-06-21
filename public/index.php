<?php
include_once "../generic/Autoload.php";
use generic\Seguranca;
use service\EmployeesService;
use bean\Employees;
use dao\EmployeesDAO;
use generic\ConnectionFactory;
use public\login;
//include '../generic/DBSingleton.php';
Seguranca::verificaConexao();

//$email=$_POST['email'];
//echo $email;


?>

<!DOCTYPE html>
<html>
<head>
  <title>Lista de Tarefas</title>
  <script>
        function filterTasks() {
            document.getElementById('filterForm').submit();
        }
    </script>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    table th, table td {
      padding: 15px;
      border: 1px solid #ddd;
      text-align: left;
    }
    
    table th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <h2>Lista de Tarefas</h2>
  <form id="filterForm" action="" method="get">
        <label for="status">Filtrar por status:</label>
        <select name="status" id="status" onchange="filterTasks()">
            <option value="" <?php if (!isset($_GET['status'])) echo 'selected'; ?>>Todos</option>
            <option value="pendente" <?php if (isset($_GET['status']) && $_GET['status'] == 'pendente') echo 'selected'; ?>>Pendente</option>
            <option value="em_andamento" <?php if (isset($_GET['status']) && $_GET['status'] == 'em_andamento') echo 'selected'; ?>>Em Andamento</option>
            <option value="concluida" <?php if (isset($_GET['status']) && $_GET['status'] == 'concluida') echo 'selected'; ?>>Concluída</option>
        </select>
  </form>
  <table>
    <thead>
        <br>
      <tr>
        <th>Título</th>
        <th>Data de Vencimento</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Conexão com o banco de dados
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "tarefasja";

      $conn = new mysqli($servername, $username, $password, $dbname);
     

    // Consulta SQL para obter as tarefas ordenadas pela data de vencimento
        $sql = "SELECT * FROM tasks2";

    // Verificar se foi enviado um filtro por status via GET
    if (isset($_GET['status']) && !empty($_GET['status'])) {
        $status = $_GET['status'];
        $sql .= " WHERE status = '$status'";
    }

    $sql .= " ORDER BY due_date";

    $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Exibir as tarefas em uma tabela
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td><a href='detalhes_tarefa_tela.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></td>";
              echo "<td>" . $row['due_date'] . "</td>";
              echo "<td>";
              echo "<select name='status' onchange='updateStatus(this.value, " . $row['id'] . ")'>";
              echo "<option value='pendente' " . ($row['status'] == 'pendente' ? 'selected' : '') . ">Pendente</option>";
              echo "<option value='em_andamento' " . ($row['status'] == 'em_andamento' ? 'selected' : '') . ">Em andamento</option>";
              echo "<option value='concluida' " . ($row['status'] == 'concluida' ? 'selected' : '') . ">Concluída</option>";
              echo "</select>";
              echo "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='3'>Nenhuma tarefa encontrada.</td></tr>";
      }

      // Fechar a conexão com o banco de dados
      $conn->close();
      ?>
    </tbody>
  </table>
  
  <script>
    function updateStatus(status, taskId) {
  
      // Exemplo de código utilizando fetch:
      fetch('atualizar_status.php', {
        method: 'POST',
        body: JSON.stringify({
          status: status,
          taskId: taskId
        })
      })
      .then(response => response.json())
      .then(data => {
        // Lógica para tratar a resposta do backend (sucesso, erro, etc.)
        console.log(data);
      })
      .catch(error => {
        // Lógica para tratar erros de requisição
        console.error('Erro:', error);
      });
    }
  </script>
    <h2>Casdastro</h2>
     <form method="POST" action="cadastro_tela.php">   		
			<input type="submit" value="Cadastrar Tarefas" >
    </form>

</body>
</html>





