<?php 
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>ID inválido!</p>";
    exit;
}

$id = $_GET['id'];


$sql = "SELECT Nome, TetoSalarial FROM cargos WHERE CargoID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nome, $teto);
$stmt->fetch();
$stmt->close();
?>

<main>
  <div id="cargos" class="tela">
    <form class="crud-form" action="./action/cargos.php" method="post">
      <h2>Editar Cargo</h2>

      <input type="hidden" name="acao" value="editar">
      <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

      <input type="text" name="nome" placeholder="Nome do Cargo" value="<?= htmlspecialchars($nome) ?>" required>
      <input type="number" step="0.01" name="teto" placeholder="Teto Salarial" value="<?= htmlspecialchars($teto) ?>" required>

      <button type="submit">Salvar Alterações</button>
    </form>
  </div>
</main>

<?php include_once './include/footer.php'; ?>
