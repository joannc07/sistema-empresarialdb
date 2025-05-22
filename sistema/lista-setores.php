<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

// comando SQL que sera executado no banco
$sql = "SELECT * FROM setor";
// dataresult da execucao do SQL no banco
$resultado = mysqli_query($conn,$sql);
?>
  <main>

    <div class="container">
        <h1>Lista de Setores</h1>
        <a href="./salvar-setores.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
            
              <th>Nome</th>
              <th>Andar</th>
              <th>Cor</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //
            while ( $dado = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
              <td><?php echo $dado['Nome'];?></td>
              <td><?php echo $dado['Andar'];?></td>
              <td><?php echo $dado['Cor'];?></td>
              <td>
              <a href="editar-setor.php?id=<?php echo $dado['SetorID']; ?>" class="btn btn-edit">Editar</a>
              <a href="./action/setores.php?acao=excluir&id=<?php echo $dado['SetorID']; ?>" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
              </td>
            </tr>
            <?php
            }
            ?>
            
          </tbody>
        </table>
      </div> 
  </main>
  
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>