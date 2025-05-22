<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  
  <main>

    <div id="setores" class="tela">
    <form class="crud-form" action="./action/setores.php" method="post">
     <h2>Cadastro de Setores</h2>
     <input type="hidden" name="acao" value="inserir">
     <input type="text" name="Nome" placeholder="Nome do Setor" required>
     <input type="number" step="0.01" name="Andar" placeholder="Andar" required>
     <input type="text" name="Cor" placeholder="Cor" required>
     <button type="submit">Salvar</button>
    </form>
  </div>
</main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>