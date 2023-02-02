<?php 
    require_once "medicine.php";
    require_once "products.php";

    class Cart extends Medicine{

        private $cartItems = array();

        function addToCart($item){
            $this->cartitems[] = $item;
        }

        function viewCart(){
            $arrCartItems = $this->cartItems;
            foreach ($arrCartItems as $key => $x){
                echo 
                '
                <ul>
                    <li>Name: ' . $x->getName() . '</li>
                    <li>Description: ' . $x->getDescription() . '</li>
                    <li>Price: ₱ ' . number_format($x->getPrice(), 2 ). '</li>
                    <li>Dose: ' . $x->getDose() . '</li>
                    <li>Type: ' . $x->getType() . '</li>
                    <li>Exp Date: ' . $x->getExpirationDate() . '</li>
                    <li>SRP: ' . $x->computeSRP() . '</li>
                </ul>
                <hr>';
            }
        }

        function computeTotal(){
            $total = 0;
            foreach($this->cartItems as $key => $x){
                $total += $x->computeSRP();
            }
            echo '<b>Total Cart Amount: </b> ₱ ' . number_format($total,2);
        }
    
    }
?>