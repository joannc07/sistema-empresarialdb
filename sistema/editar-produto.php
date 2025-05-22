<?php 
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>ID inválido!</p>";
    exit;
}

$id = $_GET['id'];

$sql_categorias = "SELECT CategoriaID, Nome FROM categorias ORDER BY Nome";
$result_categorias = $conn->query($sql_categorias);
$categorias = $result_categorias->fetch_all(MYSQLI_ASSOC);

$sql = "SELECT Nome, Preco, CategoriaID FROM produtos WHERE ProdutoID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nome, $preco, $categoria);
$stmt->fetch();
$stmt->close();
?>

<main>
  <div id="produtos" class="tela">
    <form class="crud-form" action="./action/produtos.php" method="post">
      <h2>Editar Produto</h2>
      <input type="hidden" name="acao" value="editar">
      <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

      <input type="text" name="Nome" placeholder="Nome do Produto" value="<?= htmlspecialchars($nome) ?>" required>
      <input type="number" step="0.01" name="Preco" placeholder="Preço" value="<?= htmlspecialchars($preco) ?>" required>

      <select name="CategoriaID" required>
        <option value="">Selecione a categoria</option>
        <?php foreach ($categorias as $cat) { ?>
          <option value="<?= $cat['CategoriaID'] ?>" <?= ($cat['CategoriaID'] == $categoria) ? 'selected' : '' ?>>
            <?= htmlspecialchars($cat['Nome']) ?>
          </option>
        <?php } ?>
      </select>

      <button type="submit">Salvar</button>
    </form>
  </div>
</main>

<?php 
include_once './include/footer.php';
?>
