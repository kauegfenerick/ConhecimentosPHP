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
            
            //tratar dados
            $nome = trim(strtoupper($dados['nome']));
            $email = trim(strtolower($dados['email']));
            $senha = md5(($dados['senha']));

            //mesclar ou tratar os dados
            $sql->bindParam(':nome',$nome);
            $sql->bindParam(':email',$email);
            $sql->bindParam(':senha',$senha);

            //executar
            $sql->execute();

            //retorno de dados
            return $this->pdo->lastInsertId();
        }

        public function atualizar(array $dados)
        {
            //conexão e consulta no banco de dados
            $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id_usuario  = :id_usuario LIMIT 1");
            
            //tratar dados
            $nome  = trim(strtoupper($dados['nome']));
            $email = trim(strtolower($dados['email']));
            $senha = md5(($dados['senha']));

            //mesclar ou tratar os dados
            $sql->bindParam(':nome',$nome);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':senha', $senha);
            $sql->bindParam(':id_usuario',$dados['id_usuario']);
            
            //executar
            $sql->execute();
        }
        
        public function apagar(int $id_usuario)
        {
            $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");

            $sql->bindParam(':id_usuario', $id_usuario);

            $sql->execute();
        }

        public function mostrar(int $id_usuario)
        {
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");

            $sql->bindParam(':id_usuario',$id_usuario);

            $sql->execute();

            return $sql->fetch(PDO::FETCH_OBJ);
        }
    }

?>