<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$sql_categorias = "SELECT CategoriaID, Nome FROM categorias ORDER BY Nome";
$result_categorias = $conn->query($sql_categorias);
$categorias = $result_categorias->fetch_all(MYSQLI_ASSOC);

?>
  
  <main>

    <div id="produtos" class="tela">
    <form class="crud-form" action="./action/produtos.php" method="post">
          <h2>Cadastro de Produtos</h2>
          <input type="hidden" name="acao" value="inserir">
          <input type="text" name="Nome" placeholder="Nome do Produto">
          <input type="number" name="Preco" placeholder="Preço">

          <select name="CategoriaID" required>
        <option value="">Selecione a categoria</option>
        <?php foreach ($categorias as $categoria) { ?>
          <option value="<?= $categoria['CategoriaID'] ?>">
            <?= htmlspecialchars($categoria['Nome']) ?>
          </option>
            <?php } ?>
        </select>

          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>