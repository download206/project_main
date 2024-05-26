<?php
require_once 'Cliente.php';

$cliente = new $clientes($pdo);

if (isset($_GET['id'])) {
    $clienteId = $_GET['id'];
    $clienteAtual = $cliente->obterCliente($clienteId);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cliente->atualizarCliente($id, $nome, $email);
    header("Location: listar_clientes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Cliente</h1>
        <form id="editarClienteForm" action="editar_cliente.php" method="post">
            <input type="hidden" name="id" value="<?php echo $clienteAtual['id']; ?>">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $clienteAtual['nome']; ?>" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $clienteAtual['email']; ?>" required><br>
            <button type="submit">Salvar</button>
        </form>
        <a href="listar_clientes.php">Voltar para a lista de clientes</a>
    </div>

    <script>
        // Adicionando um evento de clique ao botão "Salvar" para validar o formulário
        document.getElementById('editarClienteForm').addEventListener('submit', function(event) {
            var nome = document.getElementById('nome').value.trim();
            var email = document.getElementById('email').value.trim();

            if (nome === '' || email === '') {
                event.preventDefault(); // Impede o envio do formulário se os campos estiverem vazios
                alert('Por favor, preencha todos os campos.');
            }
        });
    </script>
</body>
</html>
