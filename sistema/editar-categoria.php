<?php 
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>ID inválido!</p>";
    exit;
}

$id = $_GET['id'];


$sql = "SELECT Nome, Descricao FROM categorias WHERE CategoriaID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nome, $descricao);
$stmt->fetch();
$stmt->close();
?>

<main>
  <div id="categorias" class="tela">
    <form class="crud-form" action="./action/categorias.php" method="post">
      <h2>Editar Categoria</h2>

      <input type="hidden" name="acao" value="editar">
      <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

      <input type="text" name="Nome" placeholder="Nome da categoria" value="<?= htmlspecialchars($nome) ?>" required>
      <input type="text" name="Descricao" placeholder="Descricao" value="<?= htmlspecialchars($descricao) ?>" required>


      <button type="submit">Salvar Alterações</button>
    </form>
  </div>
</main>

<?php include_once './include/footer.php'; ?>
