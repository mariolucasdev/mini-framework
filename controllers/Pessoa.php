<?php

require_once 'helpers/Load.php';
require_once 'helpers/Input.php';
require_once 'models/PessoaModel.php';

class Pessoa {

    public int $id = 0;
    public string $nome = '';
    public string $email = '';
    private object $pessoaModel;
    private object $load;

    public function __construct()
    {
        if(!isset($_SESSION['nome'])):
            redirect(base_url('login/'));
        endif;

        $this->pessoaModel = new PessoaModel;
        $this->load = new Load;
        $this->input = new Input;
    }

    public function __set($atrib, $value)
    {
        $this->$atrib = $value;
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }

    public function index()
    {
        $data = array(
            'listaPessoas' => $this->pessoaModel->listar()
        );

        $this->load->view('pessoas/listar', $data);
    }

    public function getPessoa(string $id) :void
    {
        $pessoa = $this->pessoaModel->listar($id);
        
        if(!empty($pessoa)):
            $this->__set('id', $id);
            $this->__set('nome', $pessoa['name']);
            $this->__set('email', $pessoa['email']);
        endif;
    }

    public function listar()
    {
        return $this->pessoaModel->listar();
    }

    public function cadastrar()
    {
        if($_POST):
            $pessoa = array(
                "nome" => $this->input->post('nome'),
                "email" => $this->input->post('email')
            );
            
            $this->pessoaModel->cadastrar($pessoa);
            redirect(base_url());
        else:
            $this->load->view('pessoas/cadastrar');
        endif;
    }

    public function editar($id)
    {
        if($_POST):
            $pessoa = array(
                "nome" => $this->input->post('nome'),
                "email" => $this->input->post('email')
            );

            $this->pessoaModel->editar($id, $pessoa);
            redirect(base_url());
        else:
            $data =  array(
                'pessoa' => $this->pessoaModel->listar($id)
            );
            $this->load->view('pessoas/editar', $data);
        endif;
    }
    
    public function excluir($id, $check = false)
    {
        $this->pessoaModel->excluir($id);
        redirect(base_url());
    }
}