<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP - Alterar Pânico</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 20%;
        }

        th {
            background-color: #010874;
            color: white;
            font-weight: bold;
            border: 1px solid #000;
            padding: 8px;
        }

        td {
            background-color: #eee;
            color: black;
            border: 1px solid #000;
            padding: 8px;
        }

        input[type='text'] {
            width: 100%;
            box-sizing: border-box;
            padding: 6px;
        }

        input[type='submit'] {
            margin-top: 10px;
            padding: 6px 12px;
            background-color: #010874;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    // Conexão com o banco de dados (substitua as informações de acordo com o seu ambiente)
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'rjalerta_db';

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_errno) {
        echo "Erro na conexão com o banco de dados: " . $conn->connect_error;
        exit();
    }

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recupera os dados do formulário
        $idPanico = $_POST['idPanico'];
        $status = $_POST['status'];

        // Verifica se o botão de confirmação foi acionado
        if (isset($_POST['confirmar'])) {
            // Prepara a query de atualização
            $stmt = $conn->prepare("UPDATE panico SET status = ? WHERE idPanico = ?");
            $stmt->bind_param("si", $status, $idPanico);

            // Executa a query de atualização
            if ($stmt->execute()) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro Alterado com sucesso',
                    });
                </script>";
            } else {
                echo "Erro na atualização do registro: " . $stmt->error;
            }

            // Fecha a conexão com o banco de dados
            $stmt->close();
        }
    }

    // Recupera os dados da tabela panico
    $sql = "SELECT * FROM panico";
    $result = $conn->query($sql);

    // Exibe os dados em uma tabela
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID Pânico</th>
                    <th>ID Tipo Pânico</th>
                    <th>Descrição</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>CPF</th>
                    <th>CEP</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Endereço</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['idPanico'] . "</td>
                    <td>" . $row['idTipoPanico'] . "</td>
                    <td>" . $row['descricao'] . "</td>
                    <td>" . $row['nome'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['celular'] . "</td>
                    <td>" . $row['cpf'] . "</td>
                    <td>" . $row['cep'] . "</td>
                    <td>" . $row['bairro'] . "</td>
                    <td>" . $row['cidade'] . "</td>
                    <td>" . $row['rua'] . "</td>
                    <td>" . $row['numero'] . "</td>
                    <td>" . $row['complemento'] . "</td>
                    <td>" . $row['status'] . "</td>
                    <td>
                        <form method='POST'>
                            <input type='hidden' name='idPanico' value='" . $row['idPanico'] . "'>
                            <input type='text' name='status' value='" . $row['status'] . "'>
                            <input type='submit' name='confirmar' value='Salvar'>
                        </form>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum registro encontrado na tabela panico.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>
</body>
</html>
