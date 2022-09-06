<?php
    class Postagem
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
            $sql = $this->pdo->prepare('SELECT * FROM postagens');

            //executar
            $sql->execute();

            //retornar dados
            return $sql->fetchAll(PDO::FETCH_OBJ);
        }

        public function cadastrar(Array $dados = null)
        {
            //conexão e consulta no banco de dados
            $sql = $this->pdo->prepare("INSERT INTO postagens (id_postagem, descricao, dt) VALUES (:id_postagem, :descricao, :dt)");
            
            //tratar dados
            $id_postagem = $dados['id_postagem'];
            $descricao = trim($dados['descricao']);
            $dt = date('Y-m-d');

            //mesclar ou tratar os dados
            $sql->bindParam(':id_postagem',$id_postagem);
            $sql->bindParam(':descricao',$descricao);
            $sql->bindParam(':dt',$dt);

            //executar
            $sql->execute();

            //retorno de dados
            return $this->pdo->lastInsertId();
        }

        public function atualizar(array $dados)
        {
            //conexão e consulta no banco de dados
            $sql = $this->pdo->prepare("UPDATE postagens SET descricao = :descricao, dt = :dt WHERE id_postagem  = :id_postagem LIMIT 1");
            
            //tratar dados
            $descricao  = trim($dados['descricao']);
            $dt = date('Y-m-d');

            //mesclar ou tratar os dados
            $sql->bindParam(':descricao',$descricao);
            $sql->bindParam(':dt', $dt);
            $sql->bindParam(':id_postagem',$dados['id_postagem']);
            
            //executar
            $sql->execute();
        }
        
        public function apagar(int $id_postagem)
        {
            $sql = $this->pdo->prepare("DELETE FROM postagens WHERE id_postagem = :id_postagem");

            $sql->bindParam(':id_postagem', $id_postagem);

            $sql->execute();
        }

        public function mostrar(int $id_postagem)
        {
            $sql = $this->pdo->prepare("SELECT * FROM postagens WHERE id_postagem = :id_postagem");

            $sql->bindParam(':id_postagem',$id_postagem);

            $sql->execute();

            return $sql->fetch(PDO::FETCH_OBJ);
        }
    }
?>