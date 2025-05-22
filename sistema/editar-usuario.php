<?php 
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>ID inválido!</p>";
    exit;
}

$id = $_GET['id'];


$sql = "SELECT Usuario, Senha, Email FROM usuarios WHERE UsuarioID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($usuario, $senha, $email);
$stmt->fetch();
$stmt->close();
?>

<main>
  <div id="usuarios" class="tela">
    <form class="crud-form" action="./action/usuarios.php" method="post">
      <h2>Editar Usuario</h2>

      <input type="hidden" name="acao" value="editar">
      <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

      <input type="text" name="Usuario" placeholder="Usuario" value="<?= htmlspecialchars($usuario) ?>" required>
      <input type="text" name="Senha" placeholder="Senha" value="<?= htmlspecialchars($senha) ?>" required>
      <input type="text" name="Email" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required>


      <button type="submit">Salvar Alterações</button>
    </form>
  </div>
</main>

<?php include_once './include/footer.php'; ?>
