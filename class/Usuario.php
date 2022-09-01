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
    }

?>