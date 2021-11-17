<h2>Pedido em Andamento: </h2>
<p>Tipo de Pagamento: <?php echo $_SESSION['tipo_pagamento'];?></p>
<hr>
<p>Total: R$ <?php echo $_SESSION['total'];?></p>
<hr>
<?php 
    if($_SESSION['tipo_pagamento'] == "dinheiro"){
        echo "<p>Troco para:".$_SESSION['valor_troco']."</p>";
    }
?>

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
            <td><p> <?= $item[2];?></p></td>
            <td><p>R$ <?= $item[1];?></p></td>
        </tr>
        <?php }?>
        
    </table>
</div>