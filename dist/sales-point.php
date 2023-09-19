<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point Of Sales - Mance Bicycle Shop</title>

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

<script>
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
</script>

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
                                <h3>Point Of Sales</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Point Of Sales
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
                <?php } elseif (isset($_GET['receiptno-exists'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Receipt No. already Exists. Check Sales Transaction/(Archived).
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <form action="functions/pos-create.php" method="post">
                            <input type="hidden" name="userid" value="<?= $userdetails['id']; ?>">
                                <div class="form-group row" id="getData">
                                    <div class="col-sm-9">
                                        <label class="mb-2">Select Item: </label>
                                        <select name="" class="choices form-select" id="SelectA" onchange="my_fun(this.value);" required>
                                            <option>Select Product</option>
                                            <?php include_once ('functions/select-inventory.php'); ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <hr>
                        </div>

                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Brand Name</th>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Selling Price</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include_once ('functions/pos-table.php'); ?>
                                    </tbody>
                                </table>

                                <form action="functions/sales-create.php" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label>User: </label>
                                            <input type="text" name="" placeholder="User" value="<?= $userdetails['fname'].' '.$userdetails['lname']; ?>"
                                            class="form-control" readonly>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Receipt No.: </label>
                                            <input type="number" name="receipt-no" placeholder="Receipt No."
                                            class="form-control" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label>Date: </label>
                                            <input type="date" name="date" value="<?= date('Y-m-d'); ?>" placeholder="Date"
                                            class="form-control" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Customer: </label>
                                            <input type="text" name="customer" placeholder="Customer"
                                            class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label>Payment Method: </label>
                                            <select name="payment-method" class="choices form-select" required>
                                                <option>Select Method</option>
                                                <option value="Cash">Cash</option>
                                                <option value="GCash">GCash</option>
                                                <option value="Bank Transfer">Bank Transfer</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Paid: </label>
                                            <input type="number" name="paid" placeholder="Paid" id="inputPaid" onkeyup="add_number()"
                                            class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label>Total: </label>
                                            <input type="text" name="total" placeholder="Total" value="<?= number_format($totalValue,2); ?>" id="inputTotal"
                                            class="form-control" readonly>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Change: </label>
                                            <input type="text" name="change" placeholder="Change" id="viewChange"
                                            class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="hidden" name="userid" value="<?= $userdetails['id']; ?>">
                                            <button type="submit" class="btn btn-primary  m-1 float-end">Submit</button>
                                            <a class="btn btn-secondary  m-1 float-end" href="functions/pos-delete-all.php?userid=<?=$userdetails['id']; ?>">Reset</a>
                                        </div>
                                    </div>
                                </form>
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
    <script>
        function add_number() {
            var a_number = parseFloat(document.getElementById("inputPaid").value.replace(/,/g,''));
            if (isNaN(a_number)) a_number = 0;
            var b_number = parseFloat(document.getElementById("inputTotal").value.replace(/,/g,''));
            if (isNaN(b_number)) b_number = 0;
            
            
            var resultChange = a_number - b_number;
            var result2 = resultChange.toFixed(2);
            document.getElementById("viewChange").value = result2.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
</body>

</html>