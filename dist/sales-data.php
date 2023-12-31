<?php $receiptno = $_GET['receiptno']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales - Mence Bicycle Shop</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="icon" type="image/x-icon" href="assets/images/logo/mancelogo.PNG">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<!-- <script>
    function my_fun(str) {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();

        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange= function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('getData').innerHTML = this.responseText;
            }
        }

        xmlhttp.open("GET", "functions/select-inventory-auto.php?value="+str, true);
        xmlhttp.send();
    }
</script> -->

<body>
    <div id="app">
        <?php include_once ('sidebar.php'); ?>
        <div id="main" class='layout-navbar'>
            <?php include_once ('header.php'); ?>
            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Sales</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Sales
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (isset($_GET['no-products'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Please select product/s first.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Sales
                            <hr>
                        </div>

                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Selling Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include_once ('functions/sales-table.php'); ?>
                                    </tbody>
                                </table>

                                <?php include_once ('functions/sales-data.php'); ?>
                                
                                <?php if (empty($datas)) { ?>
                                    <script>window.location.assign('error-404.php');</script>
                                <?php } ?>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>User: </label>
                                        <input type="text" name="" placeholder="User" value="<?= $datas['acc_firstname'].' '.$datas['acc_lastname']; ?>"
                                        class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Receipt No.: </label>
                                        <input type="number" name="receipt-no" placeholder="Receipt No." value="<?= $datas['sale_receiptno']; ?>"
                                        class="form-control" required readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Date: </label>
                                        <input type="date" name="date" value="<?= date('Y-m-d'); ?>" placeholder="Date" value="<?= $datas['sale_date']; ?>"
                                        class="form-control" required readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Customer: </label>
                                        <input type="text" name="customer" placeholder="Customer" value="<?= $datas['sale_customer']; ?>"
                                        class="form-control" required readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Payment Method: </label>
                                        <input type="text" name="payment-method" placeholder="Payment Method" value="<?= $datas['sale_pm']; ?>"
                                        class="form-control" required readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Paid: </label>
                                        <input type="text" name="paid" placeholder="Paid" value="<?= number_format($datas['sale_paid']); ?>"
                                        class="form-control" required readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Total: </label>
                                        <input type="text" name="total" placeholder="Total" value="<?= number_format($totalValue,2); ?>"
                                        class="form-control" readonly>
                                    </div>
                                    <?php $change = $datas['sale_paid'] - $totalValue; ?>
                                    <div class="col-sm-6">
                                        <label>Change: </label>
                                        <input type="text" name="change" placeholder="Change" value="<?= number_format($change,2); ?>"
                                        class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                    </div>
                </section>

                <?php include_once ('footer.php'); ?>
            </div>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>
</body>

</html>