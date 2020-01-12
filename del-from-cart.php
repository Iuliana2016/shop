<?php
if(isset($_GET['id'])){
    $productId = (int)$_GET['id'];
    session_start();
    include 'db.php';
    $db = new Database();
    $product = $db->fetch('products', 'entity_id', array('entity_id' => $productId));
    if($product){
        if(isset($_SESSION['cart'][$productId])){
            unset($_SESSION['cart'][$productId]);
        }

        if(count($_SESSION['cart']) === 0){
            session_destroy();
        }
    }
}

header('Location: cart.php');
die;