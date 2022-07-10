<?php

require 'config/Database.php';

class PessoaModel extends Database {

    private object $pdo;

    public function __construct()
    {
        $this->pdo = $this->connection();
    }
    public function listar($id = false)
    {
        if($id):
            $pessoa =  $this->pdo->prepare("SELECT * FROM pessoas WHERE id=:id");
            $pessoa->bindParam(':id', $id);
            $pessoa->execute();
            return $pessoa->fetch();
        else:
            $pessoas = $this->pdo->query("SELECT * FROM pessoas");
            return $pessoas->fetchAll();
        endif;
    }

    public function cadastrar($pessoa)
    {
        $sql = "INSERT INTO pessoas (name, email) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute([$pessoa['nome'], $pessoa['email']])):
            return true;
        endif;
        return;
    }

    public function editar($id, $pessoa)
    {
        $sql = "UPDATE pessoas SET name=?, email=? WHERE id=?";
        $stmt =  $this->pdo->prepare($sql);
        if($stmt->execute([$pessoa['nome'], $pessoa['email'], $id])):
            return true;
        endif;
        return;
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM pessoas WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute([$id])):
            return true;
        endif;
        return;
    }
}