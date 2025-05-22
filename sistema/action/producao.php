<?php
include_once '../include/logado.php';
include_once '../include/conexao.php';

$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';

if ($acao == 'inserir') {
    $produtoID = $_POST['ProdutoID'];
    $clienteID = $_POST['ClienteID'];
    $dataProducao = $_POST['DataProducao'];

    $sql = "INSERT INTO producao (ProdutoID, ClienteID, DataProducao) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $produtoID, $clienteID, $dataProducao);
    $stmt->execute();

    header('Location: ../lista-producao.php');
    exit;
}

if ($acao == 'editar') {
    $id = $_POST['id'];
    $produtoID = $_POST['ProdutoID'];
    $clienteID = $_POST['ClienteID'];
    $dataProducao = $_POST['DataProducao'];

    $sql = "UPDATE producao SET ProdutoID = ?, ClienteID = ?, DataProducao = ? WHERE ProducaoID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissi", $produtoID, $clienteID, $dataProducao, $id);
    $stmt->execute();

    header('Location: ../lista-producao.php');
    exit;
}

if ($acao == 'excluir') {
    $id = $_GET['id'];

    $sql = "DELETE FROM producao WHERE ProducaoID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header('Location: ../lista-producao.php');
    exit;
}
?>
