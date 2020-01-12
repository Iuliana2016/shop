<?php
session_start();
if(!isset($_SESSION['cart'])){
    header('Location: index.php');
    die;
}
$includeMenu = false;
$title = "Checkout - eMag.ro";
include 'header.php';
if(isset($_POST['name'])){
    $db->insert('orders', $_POST);
    session_destroy();
}
$subTotal = 0;
$shipping = 15;
$products = array();
$products = $db->fetch('products', '*', array('entity_id' => '('.implode(array_keys($_SESSION['cart']), ',').')'), 'in');
?>
            <form class="well form-horizontal" action="checkout.php" method="post" id="checkout_form" data-toggle="validator">
                <div class="row">
                    <fieldset class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="name" placeholder="Nume si Prenume" class="form-control" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input name="email" placeholder="name@website.com" class="form-control" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input name="address" placeholder="Adresa" class="form-control" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-5 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                                    <input name="zip" placeholder="Cod" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-7 inputGroupContainer" style="padding-left: 0;">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                    <input name="city" placeholder="Oras" class="form-control" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input name="phone" placeholder="Numar de telefon" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="col-md-3">
                        <div class="form-group">
                            <label class="col-md-5 control-label">Metoda de livrare</label>
                            <div class="col-md-7">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="shipping" value="cargus" required/> Cargus
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="shipping" value="posta" required/> Posta Romana
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="shipping" value="fan" required/> Fan Courier
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Metoda de plata</label>
                            <div class="col-md-7">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="payment" value="card" required/> Card
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="payment" value="banca" required/> Transfer bancar
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="payment" value="rambus" required/> Ramburs
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-md-5">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Produs</th>
                                <th>Cantitate</th>
                                <th class="text-center">Pret</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($products as $product): ?>
                                <?php $subTotal += $_SESSION['cart'][(int)$product['entity_id']] * (int)$product['price']; ?>
                                <tr>
                                    <td class="col-sm-10 col-md-10">
                                        <div class="media">
                                            <a style="padding: 0 5px 5px 5px;" class="thumbnail pull-left" href="#"> <img class="media-object" src="images/product/<?php echo $product['image'] ?>" style="width: 40px; height: 40px;"> </a>
                                            <div class="media-body">
                                                <h5 class="media-heading"><a href="#"><?php echo $product['name'] ?></a></h5>
                                            </div>
                                        </div></td>
                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                        <strong><?php echo $_SESSION['cart'][(int)$product['entity_id']] ?></strong>
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $product['price'] ?> Lei</strong></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td>   </td>
                                <td>Total</td>
                                <td class="text-right"><strong><?php echo $subTotal + $shipping ?> Lei</strong></td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-warning">Trimite comanda</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input type='hidden' name='products' value='<?php echo json_encode($_SESSION['cart']) ?>'/>
            </form>
<?php include 'footer.php'; ?>