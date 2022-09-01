<?php
    require_once('inc/classes.php');

    $Usuario = new Usuario;
    echo '<pre>';
    print_r($Usuario->listar());
    echo '<pre>';
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
    <div class="container">
        <!-- MENU --> 
        <?php
            require_once('inc/menu.php');            
        ?>             
        <!-- /MENU -->
        <!-- CONTEUDO -->
        <div>
            <h1 class="fw-bold"> USUÁRIOS </h1>
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
                        <td>VER || EDITAR || EXCLUIR</td>
                        <td><?php echo $usuario['id_usuario'] ?></td>
                        <td><?php echo $usuario['nome'] ?></td>
                        <td><?php echo $usuario['email'] ?></td>
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