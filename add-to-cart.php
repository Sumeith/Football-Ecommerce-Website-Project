<?php

session_start();

if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
    $_SESSION['name'] = array();
    $_SESSION['price'] = array();
    $_SESSION['quant'] = array();
    
    array_push($_SESSION['cart'], urldecode($HTTP_GET_VARS["id"]));
    array_push($_SESSION['name'], urldecode($HTTP_GET_VARS["name"]));
    array_push($_SESSION['price'], urldecode($HTTP_GET_VARS["price"]));
    array_push($_SESSION['quant'], $HTTP_GET_VARS["qty"]);
}
else{
    array_push($_SESSION['cart'], urldecode($HTTP_GET_VARS["id"]));
    array_push($_SESSION['name'], urldecode($HTTP_GET_VARS["name"]));
    array_push($_SESSION['price'], urldecode($HTTP_GET_VARS["price"]));
    array_push($_SESSION['quant'], $HTTP_GET_VARS["qty"]);
}
    
function clearCart(){
    unset($_SESSION['cart']);
    unset($_SESSION['name']);
    unset($_SESSION['price']);
    unset($_SESSION['quant']);
    
}
function update(){
    $_SESSION['quant'] = array();
    $quantA = $_POST['quant'];
    $i = 0;
    
    foreach($quantA as $q){
        if($q > 0){
             array_push($_SESSION['quant'], $q);
             $i++;
        }
        else{
            array_splice($_SESSION['cart'], $i, 1);
            array_splice($_SESSION['name'], $i, 1);
            array_splice($_SESSION['price'], $i, 1);
            array_splice($_SESSION['quant'], $i, 1);
        }
    }
  
}
?>
 
<?php 

function displayCart($num){
    if(!empty($_SESSION['cart'])){
        $id = $_SESSION['cart'];
        $name = $_SESSION['name'];
        $price = $_SESSION['price'];
        $quantity = $_SESSION['quant'];
        
        echo '<form action="shoppingCart.php" enctype="multipart/form-data" name="myForm" id="myform" method="post"><table class = "listTable" style = "width: 100%; border: 1px solid black; border-bottom: 1px solid #ddd; font-size: .917em; cellpadding=2;"><thead><tr><th style = "text-align: left;">Item Name</th><th style = "text-align: left;">Price</th><th style = "text-align: left;" >Quantity</th><th style = "text-align: left;">Total Price</th></tr></thead><tbody>';
        $total = 0;
        for ($i = 0; $i < count($id); $i++){
            echo ('<tr>');
            echo ('<td>'.$name[$i].'</td>');
            echo ('<td class = "right">R'.$price[$i].'</td>'); 
            if ($num < 0){
                echo ('<td><input type = "text" name = "quant[]" size = "7" value = "'.$quantity[$i].'"</td>');
            }
            else{
                echo ('<td class = "right">'.$quantity[$i].'</td>');
            }
            
            
            echo ('<td class = "right">R'.number_format($price[$i]*$quantity[$i], 2).'</td>');
            echo('</tr>');
            $total = $total + $price[$i]*$quantity[$i];
            
        }
    
        echo ('<tr><td colspan = "5" class = "right"><strong>Subtotal:&nbsp;</strong></td><td class = "right">R'.number_format($total, 2). '</td></tr>');
        if($num < 0){
            echo('<tr><td colspan = "6" align = "center">');
            echo('<input type = "submit" name = "update" value = "Update Cart">');
            echo('<input type = "submit" name = "clear" value = "Clear Cart">');
            echo('<input type = "button" name = "Checkout" value = "CheckOut">');  
            echo('</td></tr></form>');
        }
        else {
            echo('<input type = "button" name = "view cart" onclick = window.location.href = \'shoppingCart.php?clear=1\';"> ');
        }
    }
    else{
        echo("<h2>Your cart is empty</h2>");
    }
}
?>

        