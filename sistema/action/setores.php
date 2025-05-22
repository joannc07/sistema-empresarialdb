<?php
include_once '../include/logado.php';
include_once '../include/conexao.php';

$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';

if ($acao == 'inserir') {
    $nome = $_POST['Nome'];
    $andar = $_POST['Andar'];
    $cor = $_POST['Cor'];

    $sql = "INSERT INTO setor (Nome, Andar, Cor) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $andar, $cor);
    $stmt->execute();

    header('Location: ../lista-setores.php');
    exit;
}

if ($acao == 'editar') {
    $id = $_POST['id'];
    $nome = $_POST['Nome'];
    $andar = $_POST['Andar'];
    $cor = $_POST['Cor'];

    $sql = "UPDATE setor SET Nome = ?, Andar = ?, Cor = ? WHERE SetorID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $andar, $cor, $id);
    $stmt->execute();

    header('Location: ../lista-setores.php');
    exit;
}




if ($acao == 'excluir') {
    $id = $_GET['id'];

    $sql = "DELETE FROM setor WHERE setorID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header('Location: ../lista-setores.php');
    exit;
}
?>
