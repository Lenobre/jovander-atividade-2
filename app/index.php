<?php
$config = include('config.php');

$servername = $config['servername'];
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];
$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ---------- EXCLUSÃO ----------
    if (isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        $stmt = $conn->prepare("DELETE FROM Clientes WHERE Id_Cliente = :id");
        $stmt->execute([':id' => $id]);
        echo "<p style='color: red;'>Cliente ID $id excluído com sucesso!</p>";
    }

    // ---------- ATUALIZAÇÃO ----------
    if (isset($_POST['update'])) {
        $id = intval($_POST['id']);
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $telefone = $_POST['telefone'];

        $stmt = $conn->prepare("UPDATE Clientes SET Nome = :nome, Endereco = :endereco, Cidade = :cidade, Telefone = :telefone WHERE Id_Cliente = :id");
        $stmt->execute([
            ':nome' => $nome,
            ':endereco' => $endereco,
            ':cidade' => $cidade,
            ':telefone' => $telefone,
            ':id' => $id
        ]);

        echo "<p style='color: green;'>Cliente ID $id atualizado com sucesso!</p>";
    }

    // ---------- CONSULTA ----------
    $sql = "SELECT * FROM Clientes";
    $query = $conn->query($sql);

    echo "<h2>Lista de Clientes</h2>";

    if ($query) {
        echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse; width: 100%;'>";
        echo "<tr style='background-color: #ddd;'><th>ID</th><th>Nome</th><th>Endereço</th><th>Cidade</th><th>Telefone</th><th>Ações</th></tr>";

        $row_num = 0;
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $row_class = $row_num % 2 == 0 ? "style='background-color: #f2f2f2;'" : "";
            echo "<tr $row_class>";
            echo "<td>" . htmlspecialchars($row['Id_Cliente']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Nome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Endereco']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Cidade']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Telefone']) . "</td>";
            echo "<td>
                    <a href='?edit=" . $row['Id_Cliente'] . "'>✏️ Editar</a> | 
                    <a href='?delete=" . $row['Id_Cliente'] . "' onclick=\"return confirm('Tem certeza que deseja excluir este cliente?');\">🗑️ Excluir</a>
                  </td>";
            echo "</tr>";
            $row_num++;
        }
        echo "</table>";
    }

    // ---------- FORMULÁRIO DE EDIÇÃO ----------
    if (isset($_GET['edit'])) {
        $id = intval($_GET['edit']);
        $stmt = $conn->prepare("SELECT * FROM Clientes WHERE Id_Cliente = :id");
        $stmt->execute([':id' => $id]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cliente) {
            echo "<h3>Editar Cliente ID {$cliente['Id_Cliente']}</h3>";
            echo "<form method='post'>
                    <input type='hidden' name='id' value='{$cliente['Id_Cliente']}'>
                    Nome: <input type='text' name='nome' value='" . htmlspecialchars($cliente['Nome']) . "' required><br><br>
                    Endereço: <input type='text' name='endereco' value='" . htmlspecialchars($cliente['Endereco']) . "' required><br><br>
                    Cidade: <input type='text' name='cidade' value='" . htmlspecialchars($cliente['Cidade']) . "' required><br><br>
                    Telefone: <input type='text' name='telefone' value='" . htmlspecialchars($cliente['Telefone']) . "' required><br><br>
                    <button type='submit' name='update'>💾 Atualizar</button>
                  </form>";
        } else {
            echo "<p style='color: red;'>Cliente não encontrado!</p>";
        }
    }

} catch (PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}
?>
