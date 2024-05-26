<?php
require_once 'Cliente.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cliente = new $clientes($pdo);
    $cliente->adicionarCliente($nome, $email);
    header("Location: listar_clientes.php");
    exit();
    
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Cliente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Cliente</h1>
        <form action="adicionar_cliente.php" method="post">
        <label for="comentario">Comentário (mínimo de 20 caracteres):</label>
<textarea id="comentario" name="comentario" rows="4" cols="50" required></textarea><br>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
        <a href="listar_clientes.php" class="btn btn-secondary">Voltar para a lista de clientes</a>
    </div>
</body>
</html>
