<?php 
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';


$sql_cargos = "SELECT CargoID, Nome FROM cargos ORDER BY Nome";
$result_cargos = $conn->query($sql_cargos);
$cargos = $result_cargos->fetch_all(MYSQLI_ASSOC);


$sql_setores = "SELECT SetorID, Nome FROM setor ORDER BY Nome";
$result_setores = $conn->query($sql_setores);
$setores = $result_setores->fetch_all(MYSQLI_ASSOC);
?>

<main>
  <div id="funcionarios" class="tela">
    <form class="crud-form" action="./action/funcionarios.php" method="post">
      <h2>Cadastro de Funcionários</h2>
      <input type="hidden" name="acao" value="inserir">
      <input type="text" name="Nome" placeholder="Nome" required>

        <select name="CargoID" required>
        <option value="">Selecione o cargo</option>
        <?php foreach ($cargos as $cargo) { ?>
          <option value="<?= $cargo['CargoID'] ?>">
            <?= htmlspecialchars($cargo['Nome']) ?>
          </option>
            <?php } ?>
        </select>

      <select name="SetorID" required>
        <option value="">Selecione o setor</option>
        <?php foreach ($setores as $setor) { ?>
          <option value="<?= $setor['SetorID'] ?>">
          <?= htmlspecialchars($setor['Nome']) ?>
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
