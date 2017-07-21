<br>

<a href="clientes/novo"><button class="btn btn-success pull-right">Cadastrar cliente +</button></a>

<h4>Total clientes cadastrados = <button class="btn btn-info"><?= $countClientes; ?></button></h4>
<h4>Total clientes cadastrados este mês = <button class="btn btn-info"><?= $countClientesLastMonth; ?></button></h4>
<h4>Total clientes cadastrados neste dia = <button class="btn btn-info"><?= $countClientesLastDay; ?></button></h4>

<table class="table">
  <thead>
    <tr>
      <th>Cliente id</th>
      <th>Nome</th>
      <th>Sobrenome</th>
      <th>Data cadastro</th>
      <th>Data última modificação</th>
      <th>Alterar</th>
      <th>Excluir</th>
    </tr>
    <!-- end tr -->
  </thead>
  <!-- end thead -->
  <tbody>
    <?php
        foreach ($clientes as $cliente) {
    ?>
    <tr>
      <td><?= $cliente['cliente_id']; ?></td>
      <td><?= $cliente['cliente_nome']; ?></td>
      <td><?= $cliente['cliente_sobrenome']; ?></td>
      <td><?= $cliente['cliente_created_at']; ?></td>
      <td><?= $cliente['cliente_updated_at']; ?></td>
      <td><?php echo $this->Html->Link('Alterar', ['controller' => 'clientes', 'action' => 'update', $cliente['cliente_id']]) ?></td>
      <td><?php echo $this->Html->Link('Excluir', ['controller' => 'clientes', 'action' => 'delete', $cliente['cliente_id']], ['confirm' => 'Tem certeza que deseja excluir o cliente '.$cliente['cliente_nome'].'?']) ?></td>
    </tr>
    <!-- end tr -->
    <?php } ?>
    <!-- end foreach -->
  </tbody>
  <!-- end tbody -->
</table>
