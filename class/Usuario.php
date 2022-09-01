<?php

    class Usuario extends Conexao
    {
        public $pdo;

        public function __construct()
        {
            $this->pdo = Conexao::conexao();
        }

        public function listar()
        {
            // conexão com banco de dados
            //montar consulta
            $sql = $this->pdo->prepare('SELECT * FROM usuarios');

            //executar
            $sql->execute();

            //retornar dados
            return $sql->fetchAll(PDO::FETCH_OBJ);
        }

        public function cadastrar(Array $dados = null)
        {
            //conexão e consulta no banco de dados
            $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");

            //mesclar ou tratar os dados
            $sql->bindParam(':nome',$dados['nome']);
            $sql->bindParam(':email',$dados['email']);
            $sql->bindParam(':senha',$dados['senha']);

            //executar
            $sql->execute();

            //retorno de dados
            return $this->pdo->lastInsertId();
        }
    }

?>