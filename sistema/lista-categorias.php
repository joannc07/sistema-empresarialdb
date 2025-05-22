<?php 

include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';


$sql = "SELECT * FROM categorias";



$resultado = mysqli_query($conn,$sql);

?>
  <main>

    <div class="container">
        <h1>Lista de Categorias</h1>
        <a href="./salvar-categorias.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Descrição</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //
            while ( $dado = mysqli_fetch_assoc($resultado)) {
             ?>
            <tr>
            <td><?php echo $dado['CategoriaID'];?></td>
            <td><?php echo $dado['Nome'];?></td>
            <td><?php echo $dado['Descricao'];?></td>
            

              <td>
              <a href="editar-categoria.php?id=<?php echo $dado['CategoriaID']; ?>" class="btn btn-edit">Editar</a>
              <a href="./action/categorias.php?acao=excluir&id=<?php echo $dado['CategoriaID']; ?>" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
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
  
  include_once './include/footer.php';
  ?>