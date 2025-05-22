<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

// comando SQL que sera executado no banco
$sql = "SELECT f.FuncionarioID, f.Nome as nome_funcionario, c.Nome as Nome_cargo, s.Nome as Nome_setor
        FROM funcionarios AS f
        INNER JOIN cargos AS c ON f.Cargoid = c.CargoID
        INNER JOIN setor AS s ON f.Setorid = s.SetorID";

// dataresult da execucao do SQL no banco
$resultado = mysqli_query($conn,$sql);



?>

<main>

  <div class="container">
      <h1>Lista de Funcionários</h1>
      <a href="./salvar-funcionarios.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Setor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php
            //
            while ( $dado = mysqli_fetch_assoc($resultado)) {
             ?>
          <tr>
          <td><?php echo $dado['FuncionarioID'];?></td>
          <td><?php echo $dado['nome_funcionario']; ?></td>
          <td><?php echo $dado['Nome_cargo']; ?></td>
          <td><?php echo $dado['Nome_setor']; ?></td>

            <td>
            <a href="editar-funcionario.php?id=<?php echo $dado['FuncionarioID']; ?>" class="btn btn-edit">Editar</a>
            <a href="./action/funcionarios.php?acao=excluir&id=<?php echo $dado['FuncionarioID']; ?>" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
          
               
          <?php
            }
            ?>
          
            

          
        </tbody>
      </table>
    </div>

<?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>