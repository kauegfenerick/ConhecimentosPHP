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

        public function cadastrar(Array $dados = null, $foto)
        {
            $partes = explode('.',$foto['name']);
            $extensao = end($partes);
            $novoNome = date('dmYHis').'.'.$extensao;
            $ok = move_uploaded_file($foto['tmp_name'],'./imagens/'.$novoNome);
            if ($ok) {
                $imagem = $novoNome;
            }
            else {
                $imagem = null;
            }

            //conexão e consulta no banco de dados
            $sql = $this->pdo->prepare("INSERT INTO postagens (id_usuario, descricao, dt, foto) VALUES (:id_usuario, :descricao, :dt, :foto)");
            
            //tratar dados
            $id_usuario = $dados['id_usuario'];
            $descricao = trim($dados['descricao']);
            $dt = date('Y-m-d');

            //mesclar ou tratar os dados
            $sql->bindParam(':id_usuario',$id_usuario);
            $sql->bindParam(':descricao',$descricao);
            $sql->bindParam(':dt',$dt);
            $sql->bindParam(':foto',$imagem);

            //executar
            $sql->execute();

            //retorno de dados
            return $this->pdo->lastInsertId();
        }

        public function atualizar(array $dados, $foto)
        {
            if($foto['name'] != ''){
            $partes = explode('.',$foto['name']);
            $extensao = end($partes);
            $novoNome = date('dmYHis').'.'.$extensao;
            $ok = move_uploaded_file($foto['tmp_name'],'./imagens/'.$novoNome);
            if ($ok) {
                $imagem = $novoNome;
            }
            else {
                $imagem = $dados['foto_atual'];
            }
        }
        else {
            $imagem = $dados['foto_atual'];
        }

            //conexão e consulta no banco de dados
            $sql = $this->pdo->prepare("UPDATE postagens SET descricao = :descricao, dt = :dt, foto = :foto WHERE id_postagem  = :id_postagem LIMIT 1");
            
            //tratar dados
            $descricao  = trim($dados['descricao']);
            $dt = date('Y-m-d');

            //mesclar ou tratar os dados
            $sql->bindParam(':descricao',$descricao);
            $sql->bindParam(':dt', $dt);
            $sql->bindParam(':foto', $imagem);
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
        
        public function gostei(int $id_postagem)
        {
            $sql = $this->pdo->prepare("UPDATE postagens SET gostei = gostei++ WHERE id_postagem = :id_postagem");

            $sql->bindParam(':id_postagem',$id_postagem);

            $sql->execute();
        }

        public function naogostei(int $id_postagem)
        {
            $sql = $this->pdo->prepare("UPDATE postagens SET naogostei = naogostei++ WHERE id_postagem = :id_postagem");

            $sql->bindParam(':id_postagem',$id_postagem);

            $sql->execute();
        }
    }
?>