<?php 
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$sql = "SELECT pp.ProducaoID, p.Nome AS nome_produto, c.Nome AS nome_cliente, pp.DataEntrega, pp.DataProducao
        FROM producao AS pp
        INNER JOIN produtos AS p ON pp.ProdutoID = p.ProdutoID
        INNER JOIN clientes AS c ON pp.ClienteID = c.ClienteID";
$resultado = mysqli_query($conn, $sql);
?>

<main>
  <div class="container">
    <h1>Lista de Produção</h1>
    <a href="salvar-producao.php" class="btn btn-add">Incluir</a>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Produto</th>
          <th>Cliente</th>
          <th>Data Produção</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($dado = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
          <td><?= $dado['ProducaoID'] ?></td>
          <td><?= $dado['nome_produto'] ?></td>
          <td><?= $dado['nome_cliente'] ?></td>
          <td><?= $dado['DataProducao'] ?></td>
          <td>
            <a href="salvar-producao.php?id=<?= $dado['ProducaoID'] ?>" class="btn btn-edit">Editar</a>
            <a href="./action/producao.php?acao=excluir&id=<?= $dado['ProducaoID'] ?>" class="btn btn-delete" onclick="return confirm('Excluir esta produção?')">Excluir</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</main>

<?php include_once './include/footer.php'; ?>
