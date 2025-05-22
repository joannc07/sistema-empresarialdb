<?php
include_once '../include/logado.php';
include_once '../include/conexao.php';

$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';

if ($acao == 'inserir') {

    $nome = $_POST['Nome'];
    $cargo = $_POST["CargoID"];
    $setor = $_POST["SetorID"];


    $sql = "INSERT INTO funcionarios (Nome, CargoID, SetorID ) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $cargo, $setor);
    $stmt->execute();

    header('Location: ../lista-funcionarios.php');
    exit;
}

if ($acao == 'editar') {
    $id = $_POST['id'];
    $nome = $_POST['Nome'];
    $cargo = $_POST["CargoID"];
    $setor = $_POST["SetorID"];

    $sql = "UPDATE funcionarios SET Nome = ?, CargoID = ?, SetorID = ?  WHERE funcionarioID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $cargo, $setor, $id);
    $stmt->execute();

    header('Location: ../lista-funcionarios.php');
    exit;
}




if ($acao == 'excluir') {
    $id = $_GET['id'];

    $sql = "DELETE FROM funcionarios WHERE funcionarioID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header('Location: ../lista-funcionarios.php');
    exit;
}
?>
