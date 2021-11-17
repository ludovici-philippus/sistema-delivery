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
            <h2><i class="fas fa-cart"></i> Seu Carrinho!</h2>
            <a href="<?= INCLUDE_PATH;?>">Voltar Home!</a>
            <div class="clear"></div>
        </div>
    </section>

    <section class="tabela">
        <div class="container">
            <table width="100%">
                <tr>
                    <td>#</td>
                    <td>Preço</td>
                </tr>
                <?php 
                    $carrinhos_items = deliveryModel::get_items_cart();
                    foreach ($carrinhos_items as $key => $value) {
                        $item = deliveryModel::get_item($value);
                ?>
                <tr>
                    <td><img src="<?= INCLUDE_PATH."images/".$item[0];?>"></td>
                    <td><p>R$ <?= $item[1];?></p></td>
                </tr>
                <?php }?>
                
            </table>
            <br>
            <p>O Total do seu Pedido foi: R$ <?= deliveryModel::get_total_pedido();?></p>
            <br>
            <br>
            <form method="post">
                <p>Escolha o método de pagamento</p>
                <select name="opcao_pagamento">
                    <option value="cartao_credito">Cartão de Crédito</option>
                    <option value="cartao_debito">Cartão de Débito</option>
                    <option value="dinheiro">Dinheiro</option>
                </select>
                <div class="troco" style="display: none;">
                    <p>Troco para quanto?</p>
                    <input type="text" name="troco" min="<?= deliveryModel::get_total_pedido(); ?>" value="<?= deliveryModel::get_total_pedido();?>">
                </div>
                <input type="submit" value="Fechar Pedido" name="acao">
            </form>
            <br>
            <br>

        </div>
    </section>
    <?php 
        if(isset($_POST['acao'])){
            if(!isset($_SESSION['carrinho'])){
                die("Você não tem items no carrinho!");
            }
            $metodo_pagamento = $_POST['opcao_pagamento'];
            $_SESSION['tipo_pagamento'] = $metodo_pagamento;
            $_SESSION['total'] = deliveryModel::get_total_pedido();
            if($metodo_pagamento == "dinheiro"){
                if($_POST['troco'] != ""){
                    $valor_troco = $_POST['troco'] - deliveryModel::get_total_pedido();
                    if($valor_troco < 0){
                        die("O valor que você especificou para o troco é menor do que o valor do pedido!");
                    }else{
                        $_SESSION['valor_troco'] = $valor_troco;   
                    }
                }else{
                    die("Você escolheu dinheiro, portanto precisa especificar o troco!");
                }
            }
            echo "<script>alert('Seu pedido foi efetuado com sucesso!');</script>";
            echo "<script>location.href = '".INCLUDE_PATH."/historico';</script>";
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('select').change(function(){
            if($(this).val() == "dinheiro"){
                $(".troco").show();
            }else{
                $(".troco").hide();
            }
        })
    </script>
</body>
</html>