<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/53f10bde57.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= INCLUDE_PATH;?>views/style.css">
    <title>Delivery System - Code Spirit</title>
</head>
<body>
    <section class="descricao-home">
        <div class="container">
            <h2><i class="fas fa-hamburger"></i> Faça seu pedido conosco!</h2>
            <a href="<?= INCLUDE_PATH;?>fechar-pedido">Fechar Pedido!</a>
            <div class="clear"></div>
        </div>
    </section>

    <section class="lista-produtos">
        <div class="container">
            <?php 
                $sushi = deliveryModel::listar_items();
                foreach ($sushi as $key => $value) {
            ?>
            <div class="box-single-food">
                <img src="<?= INCLUDE_PATH; ?>images/<?= $value[0];?>" alt="Imagem de Sushi!">
                <p><?= $value[1]?></p>
                <a href="<?= INCLUDE_PATH; ?>?add_to_cart=<?= $key;?>">Adicionar ao Carrinho!</a>
            </div>
            <?php }?>
            <div class="clear"></div>
        </div>
    </section>
</body>
</html>