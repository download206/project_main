<?php
require_once 'Cliente.php';

if (isset($_GET['id'])) {
    $clienteId = $_GET['id'];
    $cliente = new Cliente($pdo);
    $cliente->excluirCliente($clienteId);
    header("Location: listar_clientes.php");
    exit();
}
?>
