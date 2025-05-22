<?php
include_once '../include/logado.php';
include_once '../include/conexao.php';

$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';

if ($acao == 'inserir') {
    $nome = $_POST['nome'];
    $teto = $_POST['teto'];

    $sql = "INSERT INTO cargos (Nome, TetoSalarial) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $nome, $teto);
    $stmt->execute();

    header('Location: ../lista-cargos.php');
    exit;
}

if ($acao == 'editar') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $teto = $_POST['teto'];

    $sql = "UPDATE cargos SET Nome = ?, TetoSalarial = ? WHERE CargoID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdi", $nome, $teto, $id);
    $stmt->execute();

    header('Location: ../lista-cargos.php');
    exit;
}




if ($acao == 'excluir') {
    $id = $_GET['id'];

    $sql = "DELETE FROM cargos WHERE CargoID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header('Location: ../lista-cargos.php');
    exit;
}
?>
