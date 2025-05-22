<?php
include_once '../include/logado.php';
include_once '../include/conexao.php';

$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';

if ($acao == 'inserir') {
    $nome = $_POST['Nome'];
    $descricao = $_POST['Descricao'];

    $sql = "INSERT INTO categorias (Nome, Descricao) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $descricao);
    $stmt->execute();

    header('Location: ../lista-categorias.php');
    exit;
}

if ($acao == 'editar') {
    $id = $_POST['id'];
    $nome = $_POST['Nome'];
    $descricao = $_POST['Descricao'];

    $sql = "UPDATE categorias SET Nome = ?, Descricao = ? WHERE CategoriaID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nome, $descricao, $id);
    $stmt->execute();

    header('Location: ../lista-categorias.php');
    exit;
}




if ($acao == 'excluir') {
    $id = $_GET['id'];

    $sql = "DELETE FROM categorias WHERE CategoriaID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header('Location: ../lista-categorias.php');
    exit;
}
?>
