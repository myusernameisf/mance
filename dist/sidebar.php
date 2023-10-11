<?php
    include_once ('functions/auth-account-datas.php');

    if (!isset($userdetails)) {
        echo '<script>window.location.assign("auth-login.php?login-first");</script>';
    }

?>

<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo m-1">
                            <a href="index.php"><img src="assets/images/logo/mance.PNG" style="height:80%;width:80%;" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="index.php" class='sidebar-link' data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Dashboard">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <hr>


                        <li class="sidebar-title">Features</li>

                        <li class="sidebar-item  ">
                            <a href="products-table.php" class='sidebar-link' data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Products">
                                <i class="bi bi-archive-fill"></i>
                                <span>Products</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="inventory-table.php" class='sidebar-link' data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Inventory">
                                <i class="bi bi-list-task"></i>
                                <span>Inventory</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="sales-point2.php" class='sidebar-link' data-bs-toggle="tooltip"
                            data-bs-placement="right" title="POS">
                                <i class="bi bi-calculator-fill"></i>
                                <span>Point of Sales</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link' data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Sales">
                                <i class="bi bi-folder-fill"></i>
                                <span>Transaction Records</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                        <a href="expenses-table.php" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Supplier Transactions">Supplier Transactions</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="sales-table.php" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Sales Transactions">Sales Transactions</a>
                                </li>
                                
                            </ul>
                        </li>   

                        <?php if ($userdetails['access'] == 'ADMIN') { ?>

                            <li class="sidebar-item  ">
                                <a href="accounts-user.php" class='sidebar-link' data-bs-toggle="tooltip"
                                data-bs-placement="right" title="User Accounts">
                                    <i class="bi bi-person-circle"></i>
                                    <span>User Accounts</span>
                                </a>
                            </li>

                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link' data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Returns">
                                    <i class="bi bi-trash-fill"></i>
                                    <span>Return Records</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="sales-return.php" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Sales Return">Sales Return</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="inventory-return.php" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Supplier Returns">Supplier Returns</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <!-- <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link' data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Archives">
                                    <i class="bi bi-trash-fill"></i>
                                    <span>Archives</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="sales-table-archived.php" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Sales">Sales</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="inventory-table-archived.php" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Inventory">Inventory</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="expenses-table-archived.php" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Purchase Transactions">Purchase Transactions</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="products-table-archived.php" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Products">Products</a>
                                    </li>   
                                    <li class="submenu-item ">
                                        <a href="accounts-user-archived.php" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="User Accounts">User Accounts</a>
                                    </li>
                                </ul>
                            </li> -->
                            <?php } ?>
                        <hr>
                        <li class="sidebar-title">Other</li>

                        <li class="sidebar-item  ">
                            <a href="" data-bs-toggle="modal" data-bs-target="#logoutModal" class='sidebar-link' data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Log Out">
                                <i class="text-danger bi bi-power"></i>
                                <span class="text-danger">Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <?php include_once ('logout-modal.php'); ?>
        <?php include_once ('user-modal-view.php'); ?>