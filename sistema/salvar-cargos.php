<?php 
include_once './include/logado.php';
include_once './include/header.php';
?>

<main>
  <div id="cargos" class="tela">
    <form class="crud-form" action="./action/cargos.php" method="post">
      <h2>Cadastro de Cargos</h2>
      <input type="hidden" name="acao" value="inserir">
      <input type="text" name="nome" placeholder="Nome do Cargo" required>
      <input type="number" name="teto" placeholder="Teto Salarial" required>
      <button type="submit">Salvar</button>
    </form>
  </div>
</main>

<?php include_once './include/footer.php'; ?>
