<?php // Esse editar da produção não executa direito, mas vou verificar e ver no que eu errei.
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  echo "<p>ID inválido!</p>";
  exit;
}

$id = $_GET['id'];
$produtoID = $clienteID = $dataProducao = '';


$sql_produtos = "SELECT ProdutoID, Nome FROM produtos ORDER BY Nome";
$result_produtos = $conn->query($sql_produtos);


$sql_clientes = "SELECT ClienteID, Nome FROM clientes ORDER BY Nome";
$result_clientes = $conn->query($sql_clientes);


$stmt = $conn->prepare("SELECT ProdutoID, ClienteID, DataProducao FROM producao WHERE ProducaoID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($produtoID, $clienteID, $dataProducao);
$stmt->fetch();
$stmt->close();
?>

<main>
  <div id="producao" class="tela">
    <form class="crud-form" method="post" action="./action/producao.php">
      <h2>Editar Produção</h2>
      <input type="hidden" name="acao" value="editar">
      <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

      <label>Produto:</label>
      <select name="ProdutoID" required>
        <option value="">Selecione</option>
        <?php while ($p = $result_produtos->fetch_assoc()) { ?>
        <option value="<?= $p['ProdutoID'] ?>" <?= ($p['ProdutoID'] == $produtoID) ? 'selected' : '' ?>><?= htmlspecialchars($p['Nome']) ?></option>
        <?php } ?>
      </select>

      <label>Cliente:</label>
      <select name="ClienteID" required>
        <option value="">Selecione</option>
        <?php while ($c = $result_clientes->fetch_assoc()) { ?>
        <option value="<?= $c['ClienteID'] ?>" <?= ($c['ClienteID'] == $clienteID) ? 'selected' : '' ?>><?= htmlspecialchars($c['Nome']) ?></option>
        <?php } ?>
      </select>


      <label>Data de Produção:</label>
      <input type="date" name="DataProducao" value="<?= $dataProducao ?>" required>

      <button type="submit">Salvar</button>
    </form>
  </div>
</main>

<?php include_once './include/footer.php'; ?>
