<?php
    /*session_start();
    */require 'navigation.php';/*
    //error_reporting(0);
    $select = $pdo->prepare('SELECT * FROM users WHERE user_id=:user_id');
    $values=[
        'user_id' => $_SESSION['loggedin']
    ];
    $select->execute($values);*/
    $product_id =$_REQUEST['product_id']
?>

        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-detail-top">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-slider-single normal-slider">
                                    <?php
                                        $data = $pdo->prepare('SELECT * FROM products WHERE product_id = :product_id');
                                        $values=[
                                            'product_id' => $product_id
                                        ];
                                        $data->execute($values);
                                        foreach($data as $product) {
                                    ?>
                                        <img src="img/<?php echo $product['image_source']; ?>" alt="image" class="thumbnail">
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex justify-items-center">
                                    <div class="product-content">
                                        <div class="title"><h2><?php echo $product['title']; ?></h2></div>
                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p>£<?php echo $product['price']; if($product['discount_price'] != $product['price']) echo '<span>£' . $product['discount_price'] . '</span>' ?></p>
                                        </div>
                                        <div class="quantity">
                                            <h4>Quantity:</h4>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="1" name="quantity">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="action">
                                        <?php
                                            $add = $pdo->prepare('INSERT INTO cart_products (user_id, product_id, quatity)
                                                                    VALUES(:user_id, :product_id, :quantity)');
                                            $values = [
                                                'user_id' => $_SESSION['loggedin'],
                                                'product_id' => $product_id,
                                                'quantity' => $_POST['quantity']
                                            ]
                                        ?>
                                            <a class="btn" href="#" name="addtocart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-detail-bottom col-md-6">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#description">Product description</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="description" class="container tab-pane active">
                                            <p>
                                                <?php echo $product['description']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        
                        
                        
                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-4">
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">Product Name</a>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="img/product-10.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">Product Name</a>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="img/product-8.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">Product Name</a>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="img/product-6.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">Product Name</a>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="img/product-4.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">Product Name</a>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="img/product-2.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Detail End -->
        
<?php require "brandcarousel.php" ?>        
<?php require "footer.php" ?>
