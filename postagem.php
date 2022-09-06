<?php
        require_once('inc/classes.php');

        $Postagem = new Postagem();

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
            <h1 class="col-md-12 fw-bold" > POSTAGENS - <a class="fw-bold btn btn-dark" href="<?php echo URL?>/postagem-criar.php">Publicar <i class="bi bi-plus-circle"></i></a></h1>
        </div>
        <!-- /CONTEUDO -->
        <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Gostei</th>
                        <th>Não gostei</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $postagens = $Postagem->listar();
                        foreach ($postagens as $Postagem) {
                    ?>
                    <tr>
                        <td>
                            <a href="<?php echo URL?>postagem-exibir.php?id=<?php echo $Postagem->id_postagem?>"><i class="bi bi-eye-fill text-dark"></i></a>  
                            <a href="<?php echo URL?>postagem-atualizar.php?id=<?php echo $Postagem->id_usuario?>"><i class="bi bi-pencil-square text-dark"></i></a> 
                            <a href="<?php echo URL?>postagem-deletar.php?id=<?php echo $Postagem->id_usuario?>"><i class="bi bi-trash-fill text-dark"></i>
</a>
                        </td>
                        <td>
                            <?php echo $Postagem->id_postagem ?>
                        </td>
                        <td>
                            <?php echo $Postagem->id_usuario ?>
                        </td>
                        <td>
                            <?php echo $Postagem->dt ?>
                        </td>
                        <td>
                            <?php echo $Postagem->descricao ?>
                        </td>
                        <td>
                            <?php echo $Postagem->gostei ?>
                        </td>
                        <td>
                            <?php echo $Postagem->naogostei ?>
                        </td>
                    </tr>
                    <?php
                        }//fecha foreach
                    ?>
        <!-- RODAPE -->
        <?php
            include_once('inc/rodape.php');
        ?>
        <!-- /RODAPE -->    
    </div>    
</body>
</html>