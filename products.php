<?php require 'navigation.php' ?>

        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="product-search">
                                                <input type="email" value="Search">
                                                <button><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-short">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product sort by</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">Newest</a>
                                                        <a href="#" class="dropdown-item">Popular</a>
                                                        <a href="#" class="dropdown-item">Most sale</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-price-range">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">£0 to £50</a>
                                                        <a href="#" class="dropdown-item">£51 to £100</a>
                                                        <a href="#" class="dropdown-item">£101 to £150</a>
                                                        <a href="#" class="dropdown-item">£151 to £200</a>
                                                        <a href="#" class="dropdown-item">£201 to £250</a>
                                                        <a href="#" class="dropdown-item">£251 to £300</a>
                                                        <a href="#" class="dropdown-item">£301 to £350</a>
                                                        <a href="#" class="dropdown-item">£351 to £400</a>
                                                        <a href="#" class="dropdown-item">£401 to £450</a>
                                                        <a href="#" class="dropdown-item">£451 to £500</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <?php
                                    if(isset($_POST['addtocart'])){
                                        $check=$pdo->prepare('SELECT * FROM carts');
                                        $check->execute();
                                        $stmt=$pdo->prepare('INSERT INTO carts (user_id, product_id)
                                                                VALUES (:user_id, :product_id)');
                                        $values = [
                                            'user_id' => $_SESSION['loggedin'],
                                            'product_id' => $_POST['product_id'],
                                        ];
                                        foreach($check as $row){
                                            if(($row['user_id'] == $values['user_id']) && ($row['product_id'] == $values['product_id'])){
                                                $stmt=$pdo->prepare('UPDATE carts SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id');
                                                $values = [
                                                    'user_id' => $_SESSION['loggedin'],
                                                    'product_id' => $_POST['product_id'],
                                                    'quantity' => $row['quantity'] + 1
                                                ];
                                            }
                                        }
                                        $stmt->execute($values);
                                    }
                                    $items=$pdo->prepare('SELECT * FROM products');
                                    $items->execute();
                                    foreach ($items as $product){
                                        require 'product.php';
                                    }
                                ?>
                        </div>
                        
                        <!-- Pagination Start -->
                        <!--<div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>-->
                        <!-- Pagination Start -->
                    </div>           
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
<?php
        $select = $pdo->prepare('SELECT * FROM categories');
        $select->execute();	

        foreach($select as $row){
?>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><?=$row['category_name']?></a>
                                    </li>
                            
<?php 
        }
?>

                                </ul>
                            </nav>
                        </div>
                        
                        
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->  
        
<?php require "footer.php" ?>