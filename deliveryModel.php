<?php 
    class deliveryModel{
        protected static $items = array(array("sushi1.jpeg", "20.00"), array("sushi2.jpg", "60.00"), array("sushi3.jpg", "35.00"));
        public static function listar_items(){
            return self::$items;
        }

        public static function add_to_cart($id_produto){
            if(!isset($_SESSION['carrinho']))
                $_SESSION['carrinho'] = array();

            if($id_produto < 0 || $id_produto > count(self::$items))
                $_SESSION["carrinho"][] = $id_produto;
        }

        public static function get_items_cart(){
            return $_SESSION['carrinho'];
        }

        public static function get_item($id){
            return self::$items[$id];
        }

        public static function get_total_pedido(){
            $valor = 0;
            foreach ($_SESSION['carrinho'] as $key => $value) {
                $item_preco = self::get_item($value)[1];
                $valor += $item_preco;
            }

            return number_format($valor, 2, ",", ".");
        }
    }
?>