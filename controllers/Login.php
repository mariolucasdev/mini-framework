<?php

require 'helpers/Load.php';
require 'helpers/Input.php';

class Login {
    
    private object $load;
    private object $input;

    public function __construct()
    {
        $this->load = new Load;
        $this->input = new Input;
    }

    public function index()
    {
        $this->load->view('login', '', false);
    }
    
    public function autenticar()
    {
        // Variáveis chubadas para fins de teste
        $nome = 'Mário Lucas';
        $email = 'mario@gmail.com';
        $senha = '123';

        $emailEnviado = $this->input->post('email');
        $senhaEnviada = $this->input->post('senha');

        if($email == $emailEnviado):
            if($senha == $senhaEnviada):
                $_SESSION['nome'] = $nome;
                redirect(base_url());
            else:
                $_SESSION['temp_error'] = 'Senha incorreta!';
            endif;
        else:
            $_SESSION['temp_error'] = 'Usuário não encontrado!';
        endif;

        $this->load->view('login', '', false);
    }

    public function sair()
    {
        session_destroy();
        unset($_SESSION['nome']);

        redirect(base_url('login/index'));
    }
}