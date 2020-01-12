<?php
include 'db.php';
$db = new Database();

if(!isset($includeMenu)){
    $includeMenu = true;
}
if($includeMenu){
    $categories = $db->fetch('categories');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title ?></title>

    <link href="favicon.ico" rel="icon">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">eMag</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="feedback.php">Da-ne un feedback</a>
                    </li>
                    <li>
                        <a href="cart.php">Cosul Meu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
		<div class="row">
            <?php if($includeMenu): ?>
            <div class="col-md-3">
                <p><a href="index.php"><img src="images/logo.png"/></a></p>
                <div class="list-group">
                    <?php foreach($categories as $category): ?>
                    <a href="category.php?id=<?php echo $category['entity_id'] ?>" class="list-group-item"><?php echo $category['name'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-md-9">
            <?php else: ?>
            <div class="col-md-12">
            <?php endif; ?>
				