<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

// comando SQL que sera executado no banco
$sql = "SELECT * FROM usuarios";
// dataresult da execucao do SQL no banco
$resultado = mysqli_query($conn,$sql);
?>
  <main>

    <div class="container">
        <h1>Lista de Usuários</h1>
        <a href="./salvar-usuarios.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
            
              <th>ID</th>
              <th>Usuário</th>
              <th>Senha</th>
              <th>Email</th>
              <th>ações<th>
            </tr>
          </thead>
          <tbody>
            <?php
            //
            while ( $dado = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
              <td><?php echo $dado['UsuarioID'];?></td>
              <td><?php echo $dado['Usuario'];?></td>
              <td><?php echo $dado['Senha'];?></td>
              <td><?php echo $dado['Email'];?></td>
             
              <td>
              <a href="editar-usuario.php?id=<?php echo $dado['UsuarioID']; ?>" class="btn btn-edit">Editar</a>
              <a href="./action/usuarios.php?acao=excluir&id=<?php echo $dado['UsuarioID']; ?>" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
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