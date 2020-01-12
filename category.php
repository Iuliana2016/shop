<?php
$title = "Category - eMag.ro";
$id = $_GET['id'];
include 'header.php';
$products = $db->fetch('products', '*', array('category_id' => $id));
$categoryArray = $db->fetch('categories', array('name', 'description'), array('entity_id' => $id));
?>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <strong><?php echo $categoryArray[0]['name'] ?></strong>
                <p><?php echo $categoryArray[0]['description'] ?></p>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php foreach($products as $product): ?>
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <img src="images/product/<?php echo $product['image'] ?>" alt="">
                <div class="caption">
                    <h4><a href="#"><?php echo $product['name'] ?></a></h4>
                    <p><?php echo $product['description'] ?></p>
                </div>
                <div class="ratings">
                    <p class="pull-right"><?php echo $product['reviews'] ?> reviews</p>
                    <p>
                        <span class="glyphicon <?php echo $product['reviews'] > 0 ? 'glyphicon-star' : 'glyphicon-star-empty'?>"></span>
                        <span class="glyphicon <?php echo $product['reviews'] > 1 ? 'glyphicon-star' : 'glyphicon-star-empty'?>"></span>
                        <span class="glyphicon <?php echo $product['reviews'] > 2 ? 'glyphicon-star' : 'glyphicon-star-empty'?>"></span>
                        <span class="glyphicon <?php echo $product['reviews'] > 3 ? 'glyphicon-star' : 'glyphicon-star-empty'?>"></span>
                        <span class="glyphicon <?php echo $product['reviews'] > 4 ? 'glyphicon-star' : 'glyphicon-star-empty'?>"></span>
                    </p>
                </div>
                <div class="add-to-cart">
                    <h4 class="pull-right"><?php echo $product['price'] ?>  Lei</h4>
                    <a href="add-to-cart.php?id=<?php echo $product['entity_id'] ?>" class="btn btn-success">Add to cart</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php include 'footer.php'; ?>