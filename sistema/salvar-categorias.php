<?php 
include_once './include/logado.php';
include_once './include/header.php';
?>

<main>
  <div id="categorias" class="tela">
    <form class="crud-form" action="./action/categorias.php" method="post">
      <h2>Cadastro de Categorias</h2>
      <input type="hidden" name="acao" value="inserir">
      <input type="text" name="Nome" placeholder="Nome da categoria" required>
      <input type="text" name="Descricao" placeholder="Descricao" required>
      <button type="submit">Salvar</button>
    </form>
  </div>
</main>

<?php include_once './include/footer.php'; ?>
