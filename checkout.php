<?php
    require 'navigation.php';
    $user_id = $_SESSION['loggedin'];
    $date = date('Y-m-d');
    $bookings = $pdo->prepare('SELECT * FROM bookings WHERE user_id = :user_id AND date_created = :date_created ORDER BY booking_id DESC LIMIT 1');
    $values = [
        'user_id' => $user_id,
        'date_created' => $date
    ];
    $bookings->execute($values);
    $booking = $bookings->fetch();
?>
        
        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Address</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Phone number</label>
                                        <input class="form-control" type="text" placeholder="Phone number">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Address</label>
                                        <input class="form-control" type="text" placeholder="Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <input class="form-control" type="text" placeholder="Country">
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input class="form-control" type="text" placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Postcode</label>
                                        <input class="form-control" type="text" placeholder="Postcode">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="newaccount">
                                            <label class="custom-control-label" for="newaccount">Create an account</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="shipto" <?php echo ($booking ? 'disabled' : '')?>>
                                            <label class="custom-control-label" for="shipto" >Ship to different address</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="shipping-address">
                                <h2>Shipping Address</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Phone number</label>
                                        <input class="form-control" type="text" placeholder="Phone number">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Address</label>
                                        <input class="form-control" type="text" placeholder="Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <select class="custom-select">
                                            <option selected>United States</option>
                                            <option>Afghanistan</option>
                                            <option>Albania</option>
                                            <option>Algeria</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input class="form-control" type="text" placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Postcode</label>
                                        <input class="form-control" type="text" placeholder="Postcode">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $data = $pdo->prepare('SELECT * FROM bookings JOIN services ON bookings.service_id = services.service_id WHERE user_id = :user_id');
                        $values = [
                            'user_id' => $user_id
                        ];
                        $data->execute($values);
                        $user = $data->fetch();
                    ?>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                <h1>Cart Total</h1>
                                <p class="checkout-total"><?php echo $user['service_name'] . '<span>£' . $user['service_price'] . '</span>' ?></p>
                                <p class="checkout-total">Discount<span>£0</span></p>
                                <h2>Total <?php echo '<span>£' . $user['service_price'] . '</span>' ?></h2>
                            </div>

                            <div class="checkout-payment">
                                <div class="payment-methods">
                                    <h1>Payment Methods</h1>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1" name="payment" >
                                            <label class="custom-control-label" for="payment-1">Card</label>
                                        </div>
                                        <div class="payment-content" id="payment-1-show">
                                            <p>
                                                You will be redirected to our payment gateway.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn">
                                    <form action="HPPAuthBillTo.php" method="POST"><button>Place Order</button></form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->

        <?php require "brandcarousel.php" ?>
        <?php require "footer.php" ?>