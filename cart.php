<?php
session_start();
$emptyCart = false;
$includeMenu = false;
if(!isset($_SESSION['cart'])){
    $emptyCart = true;
    $includeMenu = true;
}
$title = "Cos - eMag.ro";
include 'header.php';
$subTotal = 0;
$shipping = 15;
$products = array();
if(!$emptyCart){
    $products = $db->fetch('products', '*', array('entity_id' => '('.implode(array_keys($_SESSION['cart']), ',').')'), 'in');
}
?>
    <?php if(!$emptyCart): ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Produs</th>
            <th>Cantitate</th>
            <th class="text-center">Pret</th>
            <th class="text-center">Total</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($products as $product): ?>
        <?php $subTotal += $_SESSION['cart'][(int)$product['entity_id']] * (int)$product['price']; ?>
        <tr>
            <td class="col-sm-8 col-md-6">
                <div class="media">
                    <a class="thumbnail pull-left" href="#"> <img class="media-object" src="images/product/<?php echo $product['image'] ?>" style="width: 72px; height: 72px;"> </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#"><?php echo $product['name'] ?></a></h4>
                        <span><?php echo $product['description'] ?></span>
                    </div>
                </div></td>
            <td class="col-sm-1 col-md-1" style="text-align: center">
                <input type="text" class="form-control" name="qty" value="<?php echo $_SESSION['cart'][(int)$product['entity_id']] ?>">
            </td>
            <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $product['price'] ?> Lei</strong></td>
            <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $_SESSION['cart'][(int)$product['entity_id']] * $product['price'] ?> Lei</strong></td>
            <td class="col-sm-1 col-md-1">
                <a href="del-from-cart.php?id=<?php echo $product['entity_id'] ?>" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove"></span> Sterge
                </a></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td>   </td>
            <td>   </td>
            <td>   </td>
            <td><h5>Subtotal</h5></td>
            <td class="text-right"><h5><strong><?php echo $subTotal ?> Lei</strong></h5></td>
        </tr>
        <tr>
            <td>   </td>
            <td>   </td>
            <td>   </td>
            <td><h5>Cost transport</h5></td>
            <td class="text-right"><h5><strong><?php echo $shipping ?> Lei</strong></h5></td>
        </tr>
        <tr>
            <td>   </td>
            <td>   </td>
            <td>   </td>
            <td><h3>Total</h3></td>
            <td class="text-right"><h3><strong><?php echo $subTotal + $shipping ?> Lei</strong></h3></td>
        </tr>
        <tr>
            <td>   </td>
            <td>   </td>
            <td>   </td>
            <td>
                <a href="index.php" class="btn btn-default">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                </a></td>
            <td>
                <a href="checkout.php" class="btn btn-success">
                    Checkout <span class="glyphicon glyphicon-play"></span>
                </a></td>
        </tr>
        </tbody>
    </table>
    <?php else: ?>
    <div class="well">
        <strong>Cosul dumneavoastra de cumparaturi este gol</strong>
    </div>
    <?php endif; ?>
<?php include 'footer.php'; ?>