<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class ClientesController extends AppController
{
    //pagina inicial do sistema listando todos os clientes
    public function index()
    {
        $clientesTable = TableRegistry::get('clientes');
        $clientes = $clientesTable->find('all');
        $countClientes = $clientes->count();
        $countClientesLastDay = 0;
        $countClientesLastMonth = 0;

        foreach ($clientes as $c)
        {
            $time = new Time($c->cliente_created_at);
            if($time->isThisMonth(30))
            {
                $countClientesLastMonth += 1;
            }
            if($time->isToday())
            {
                $countClientesLastDay += 1;
            }
        }

        $this->set('clientes', $clientes);
        $this->set('countClientes', $countClientes);
        $this->set('countClientesLastDay', $countClientesLastDay);
        $this->set('countClientesLastMonth', $countClientesLastMonth);
    }

    //cria uma entidade cliente em branco e chama a view com o form do cadastro
    public function novo()
    {
        $clientesTable = TableRegistry::get('clientes');
        $cliente = $clientesTable->newEntity();

        $this->set('cliente', $cliente);
    }

    //funcao para salvar novo cliente no banco, setando a data e hora do cadastro
    public function store()
    {
        date_default_timezone_set('America/Sao_Paulo');
  		$date_create_at = date('Y-m-d H:i:s');

        $clientesTable = TableRegistry::get('clientes');
        $cliente = $clientesTable->newEntity();
        $cliente->cliente_nome = $this->request->data('cliente_nome');
        $cliente->cliente_sobrenome = $this->request->data('cliente_sobrenome');
        $cliente->cliente_created_at = $date_create_at;

        if($clientesTable->save($cliente))
        {
            $msg = "Cliente cadastrado com sucesso!";
        }
        else
        {
            $msg = "Erro ao cadastrar cliente!";
        }
        $this->set('msg', $msg);
    }

    //busca um cliente em especifico e chama a view com seus dados
    public function update($id)
    {
        $clientesTable = TableRegistry::get('clientes');
        $cliente = $clientesTable->get($id);

        $this->set('cliente', $cliente);
    }

    //funcao para salvar as alteracoes feitas nos dados do cliente, setando a data e hora da ultima modificacao
    public function updateSave()
    {
        date_default_timezone_set('America/Sao_Paulo');
  		$date_update_at = date('Y-m-d H:i:s');

        $clientesTable = TableRegistry::get('clientes');
        $cliente = $clientesTable->newEntity();
        $cliente->cliente_id = $this->request->data('cliente_id');
        $cliente->cliente_nome = $this->request->data('cliente_nome');
        $cliente->cliente_sobrenome = $this->request->data('cliente_sobrenome');
        $cliente->cliente_updated_at = $date_update_at;

        if($clientesTable->save($cliente))
        {
            $msg = "Dados alterados com sucesso!";
        }
        else
        {
            $msg = "Erro ao alterar dados!";
        }
        $this->set('msg', $msg);
    }

    //funcao para excluir um cliente
    public function delete($id)
    {
        $clientesTable = TableRegistry::get('clientes');
        $cliente = $clientesTable->get($id);

        if($clientesTable->delete($cliente))
        {
            $msg = "Cliente excluído com sucesso!";
        }
        else
        {
            $msg = "Erro ao excluir cliente!";
        }
        $this->set('msg', $msg);
    }

}
?>
