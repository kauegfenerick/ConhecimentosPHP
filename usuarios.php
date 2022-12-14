 <?php
    require_once('inc/classes.php');

    $Usuario = new Usuario;
    // echo '<pre>';
    // print_r($Usuario->listar());
    // echo '<pre>';

    //cadastrar usuários
    // $dados = array(
    //     'nome' => 'ALVARO GOMES FENERICK',
    //     'email' => 'alvaro@fenerick.com',
    //     'senha' => '321'
    // );
    // echo $Usuario->cadastrar($dados);
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENAGRAN</title>
    <!-- CSS -->
    <?php
        require_once('inc/css.php');
    ?>
    <!-- /CSS -->
    <!-- JS -->
    <?php
        require_once('inc/js.php'); 
    ?>
    <!-- /JS -->
</head>
<body>
        <?php
            require_once('inc/menu.php');            
        ?>   
    <div class="container">
        <!-- MENU -->           
        <!-- /MENU -->
        <!-- CONTEUDO -->
        <div>
            <h1 class="fw-bold"> USUÁRIOS - <a class="fw-bold btn btn-dark" href="<?php echo URL?>/usuario-cadastrar.php">Cadastrar</a></h1>
            <!-- tabela de usuário-->

            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $usuarios = $Usuario->listar();
                        foreach ($usuarios as $usuario) {
                    ?>
                    <tr>
                        <td>
                            <a href="#"><i class="bi bi-eye-fill text-dark"></i></a>  
                            <a href="<?php echo URL?>usuario-atualizar.php?id=<?php echo $usuario->id_usuario?>"><i class="bi bi-pencil-square text-dark"></i></a> 
                            <a href="<?php echo URL?>usuario-deletar.php?id=<?php echo $usuario->id_usuario?>"><i class="bi bi-trash-fill text-dark"></i>
</a>
                        </td>
                        <td>
                            <?php echo $usuario->id_usuario ?>
                        </td>
                        <td>
                            <?php echo $usuario->nome ?>
                        </td>
                        <td>
                            <?php echo $usuario->email ?>
                        </td>
                    </tr>
                    <?php
                        }//fecha foreach
                    ?>
                </tbody>
            </table>
            <!-- \tabela de usuário-->
        </div>
        <!-- /CONTEUDO -->
        <!-- RODAPE -->
        <?php
            include_once('inc/rodape.php');
        ?>
        <!-- /RODAPE -->    
    </div>    
</body>
</html>