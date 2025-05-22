<?php
include_once '../include/logado.php';
include_once '../include/conexao.php';

$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';

if ($acao == 'inserir') {
    $usuario = $_POST['Usuario'];
    $senha = $_POST['Senha'];
    $email = $_POST['Email'];

    $sql = "INSERT INTO usuarios (Usuario, Senha, Email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $usuario, $senha, $email);
    $stmt->execute();

    header('Location: ../lista-usuarios.php');
    exit;
}

if ($acao == 'editar') {
    $id = $_POST['id'];
    $usuario = $_POST['Usuario'];
    $senha = $_POST['Senha'];
    $email = $_POST['Email'];

    $sql = "UPDATE usuarios SET Usuario = ?, Senha = ?, Email = ? WHERE UsuarioID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $usuario, $senha, $email, $id);
    $stmt->execute();

    header('Location: ../lista-usuarios.php');
    exit;
}




if ($acao == 'excluir') {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE usuarioID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header('Location: ../lista-usuarios.php');
    exit;
}
?>
