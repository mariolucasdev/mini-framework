<?php

abstract class Database {
    public function connection()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=pessoas_db', 'root', '');
            return $pdo;
        } catch(\Trowable $e) {
            echo 'Erro ao conectar com banco de Dados<br> Erro:'. $e->getMessage();
        } 
    }
}