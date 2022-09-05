<?php

require_once('inc/classes.php');

$Usuario = new Usuario();


if (isset($_POST['btnDeletar'])) {
    $Usuario->apagar($_POST['id_usuario']);
    header('location:'.URL.'usuarios.php');
}

$usuario = $Usuario->mostrar($_GET['id']);

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
           <h1> DELETAR USUÁRIO <?php $usuario->nome?></h1>
           <form action="?" method="post">
           <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario?>">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="nome" required>Nome*</label>
                        <input class="form-control" type="text" name="nome" id="nome" value="<?php echo $usuario->nome?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email" class="form-label" required>E-mail*</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $usuario->email?>" disabled>
                    </div>
                    <div class="offset-11 col-md-1 mt-2">
                        <input class="btn btn-danger" type="submit" 
                        name="btnDeletar" value="Deletar">
                    </div>
                </div>
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