<?php
if(isset($_GET['id'])){
    $productId = (int)$_GET['id'];
    $qty = isset($_GET['qty']) ? (int)$_GET['qty'] : 1;
    session_start();
    include 'db.php';
    $db = new Database();
    $product = $db->fetch('products', 'entity_id', array('entity_id' => $productId));
    if($product){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }

        if(!isset($_SESSION['cart'][$productId])){
            $_SESSION['cart'][$productId] = $qty;
        }else{
            $_SESSION['cart'][$productId] += $qty;
        }
    }
}

header('Location: cart.php');
die;