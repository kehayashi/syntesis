<?php
    echo $this->Form->create($cliente,['url' => ['action' => 'updateSave']]);
    echo $this->Form->input('cliente_id');
    echo $this->Form->input('cliente_nome');
    echo $this->Form->input('cliente_sobrenome');
    echo $this->Form->button('Salvar');
    echo $this->Form->end();
?>
