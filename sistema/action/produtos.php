<?php
include_once '../include/logado.php';
include_once '../include/conexao.php';

$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';

if ($acao == 'inserir') {
    $nome = $_POST['Nome'];
    $preco = $_POST['Preco'];
    $categoria = $_POST['CategoriaID'];

    $sql = "INSERT INTO produtos (Nome, Preco, CategoriaID) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $preco, $categoria);
    $stmt->execute();

    header('Location: ../lista-produtos.php');
    exit;
}

if ($acao == 'editar') {
    $id = $_POST['id'];
    $nome = $_POST['Nome'];
    $preco = $_POST['Preco'];
    $categoria = $_POST['CategoriaID'];

    $sql = "UPDATE produtos SET Nome = ?, Preco = ?, CategoriaID = ? WHERE ProdutoID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $preco, $categoria, $id);
    $stmt->execute();

    header('Location: ../lista-produtos.php');
    exit;
}




if ($acao == 'excluir') {
    $id = $_GET['id'];

    $sql = "DELETE FROM produtos WHERE ProdutoID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header('Location: ../lista-produtos.php');
    exit;
}
?>
