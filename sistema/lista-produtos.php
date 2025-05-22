<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

// comando SQL que sera executado no banco
$sql = "SELECT p.ProdutoID, p.Nome AS Nome_produto, p.Preco, c.Nome AS nome_categoria
        FROM produtos AS p
        INNER JOIN categorias AS c ON p.CategoriaID = c.CategoriaID";

// dataresult da execucao do SQL no banco
$resultado = mysqli_query($conn,$sql);
?>
  <main>

    <div class="container">
        <h1>Lista de Produtos</h1>
        <a href="./salvar-produtos.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Preco</th>
              <th>Categorias</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //
            while ( $dado = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
              <td><?php echo $dado['ProdutoID'];?></td>
              <td><?php echo $dado['Nome_produto'];?></td>
              <td><?php echo $dado['Preco'];?></td>
              <td><?php echo $dado['nome_categoria'];?></td>
              <td>
              <a href="editar-produto.php?id=<?php echo $dado['ProdutoID']; ?>" class="btn btn-edit">Editar</a>
              <a href="./action/produtos.php?acao=excluir&id=<?php echo $dado['ProdutoID']; ?>" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
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