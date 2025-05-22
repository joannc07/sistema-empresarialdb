<?php 
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>ID inválido!</p>";
    exit;
}

$id = $_GET['id'];


$sql = "SELECT Nome, Andar, Cor FROM setor WHERE SetorID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nome, $andar, $cor);
$stmt->fetch();
$stmt->close();
?>
  
  <main>

    <div id="setores" class="tela">
    <form class="crud-form" action="./action/setores.php" method="post">
          <h2>Editar setor</h2>
          
      <input type="hidden" name="acao" value="editar">
      <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

      <input type="text" name="Nome" placeholder="Nome do Setor" value="<?= htmlspecialchars($nome) ?>" required>
      <input type="number" step="0.01" name="Andar" placeholder="Andar" value="<?= htmlspecialchars($andar) ?>" required>
      <input type="text" name="Cor" placeholder="Cor" value="<?= htmlspecialchars($cor) ?>" required>

          <button type="submit">Salvar alterações</button>
        </form>
      </div>
   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>