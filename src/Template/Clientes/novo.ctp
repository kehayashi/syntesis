<?php
    echo $this->Form->create($cliente,['url' => ['action' => 'store']]);
    echo $this->Form->input('cliente_nome');
    echo $this->Form->input('cliente_sobrenome');
    echo $this->Form->button('Cadastrar');
    echo $this->Form->end();
?>
