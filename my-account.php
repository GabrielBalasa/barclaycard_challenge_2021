<?php require 'navigation.php' ?>

<!-- My Account Start -->
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab">Manage Categories</a>
                    <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab">Add products</a>
                    <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab">Create accounts</a>
                    <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab">Delete accounts</a>
                    <a class="nav-link" id="account-nav" data-toggle="pill" href="#manage-branches" role="tab">Manage branches</a>
                    <a class="nav-link" href="index.html">Logout</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                        <h4>Manage Categories</h4>
                        <?php require 'managecategories.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Product</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Product Name</td>
                                        <td>01 Jan 2020</td>
                                        <td>$99</td>
                                        <td>Approved</td>
                                        <td><button class="btn">View</button></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Product Name</td>
                                        <td>01 Jan 2020</td>
                                        <td>$99</td>
                                        <td>Approved</td>
                                        <td><button class="btn">View</button></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Product Name</td>
                                        <td>01 Jan 2020</td>
                                        <td>$99</td>
                                        <td>Approved</td>
                                        <td><button class="btn">View</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                        <h4>Create employee accounts</h4>
                        <div class="row">
                            <?php require 'accounts.php'?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                        <h4>Delete employee accounts</h4>
                        <div class="row">
                            <?php require 'deleteaccounts.php'?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="manage-branches" role="tabpanel" aria-labelledby="account-nav">
                        <h4>Manage branches</h4>
                        <?php require 'managebranches.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account End -->

<?php require "brandcarousel.php" ?>        
<?php require "footer.php" ?>
