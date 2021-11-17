<?php 
    class deliveryController{
        public function index(){
            $url = isset($_GET['url']) ? $_GET['url'] : "home";
            $slug = explode("/", $url)[0];

            if(file_exists("./views/$slug.php")){
                include("views/$slug.php");
                $this->validar_carrinho();
            }else{
                die("404 - Página não existe!");
            }
        }

        public function validar_carrinho(){
            if(isset($_GET['add_to_cart'])){
                $id_produto = (int)$_GET['add_to_cart'];
                deliveryModel::add_to_cart($id_produto);
                echo "<script>alert('O produto foi adicionado no carrinho com sucesso!');</script>";
            }
        }
    }
?>