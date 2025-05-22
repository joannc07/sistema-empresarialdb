<?php 
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>ID inválido!</p>";
    exit;
}

$id = $_GET['id'];


$sql_cargos = "SELECT CargoID, Nome FROM cargos ORDER BY Nome";
$result_cargos = $conn->query($sql_cargos);
$cargos = $result_cargos->fetch_all(MYSQLI_ASSOC);


$sql_setores = "SELECT SetorID, Nome FROM setor ORDER BY Nome";
$result_setores = $conn->query($sql_setores);
$setores = $result_setores->fetch_all(MYSQLI_ASSOC);


$sql = "SELECT Nome, CargoID, SetorID FROM funcionarios WHERE FuncionarioID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nome, $cargoID_atual, $setorID_atual);
$stmt->fetch();
$stmt->close();
?>

  <div id="funcionarios" class="tela">
  <form class = "crud-form"action="./action/funcionarios.php" method="post">
  <h2>Editar Funcionário</h2>
  
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

  <input type="text" name="Nome" placeholder="Nome" value="<?= htmlspecialchars($nome) ?>" required>

    <select name="CargoID" required>
    <option value="">Selecione o cargo</option>
    <?php foreach ($cargos as $cargo) { ?>
    <option value="<?= $cargo['CargoID'] ?>" <?= ($cargo['CargoID'] == $cargoID_atual) ? 'selected' : '' ?>> <?= htmlspecialchars($cargo['Nome']) ?> </option>
    <?php } ?>
    </select>

    <select name="SetorID" required>
    <option value="">Selecione o setor</option>
    <?php foreach ($setores as $setor) { ?>
    <option value="<?= $setor['SetorID'] ?>" <?= ($setor['SetorID'] == $setorID_atual) ? 'selected' : '' ?>> <?= htmlspecialchars($setor['Nome']) ?>
    </option>
    <?php } ?>
    </select>

  <button type="submit">Salvar alterações</button>
      </form>
  </div>
   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>