<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  
  <main>

   <div id="usuarios" class="tela">
     <form class="crud-form" action="./action/usuarios.php" method="post">
       <h2>Cadastro de Usuarios</h2>
         <input type="hidden" name="acao" value="inserir">
          <input type="text"  name="Usuario" placeholder="Usuário">
          <input type="text"  name="Senha" placeholder="Senha">
          <input type="text"  name="Email" placeholder="Email">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>