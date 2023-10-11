<?php include_once('functions/index-bar-chart.php'); ?>
<?php include_once('functions/index-pie-chart.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mance Bicycle Shop</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="icon" type="image/x-icon" href="assets/images/logo/mancelogo.PNG">
    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php include_once ('sidebar.php'); ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <a href="sales-table.php" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Go to Sales Transaction: <?= date('F');?>">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon green">
                                                        <i class="bi-calculator-fill mt-2"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Sales: <?= date('F');?></h6>
                                                    <h6 class="font-extrabold mb-0"><?= number_format($values[0],2); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <?php include_once ('functions/index-inventory.php'); ?>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Sales this Year: <?= date('Y'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header" id="remarks">
                                        <h4>Latest Remarks/Notes/Announcements</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Comment</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php include_once ('functions/remarks-table.php'); ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="assets/images/faces/<?= $userdetails['logo']; ?>.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0"><?= $userdetails['fname'].' '.$userdetails['lname']; ?></p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                        <form action="functions/remarks-create.php" method="post">
                                                            <div class="form-group row">
                                                                <div class="col-sm-10">
                                                                <textarea class="form-control" name="remarks" placeholder="Type Here..." id="exampleFormControlCategory" required
                                                                    rows="3"></textarea>
                                                                </div>
                                                                <div class="col-sm-2 mt-5">
                                                                <button class="btn btn-primary mr-2" name="remarks-user" value="<?= $userdetails['id']; ?>" type="submit">Send</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <a href="" data-bs-toggle="modal" data-bs-target="#viewUser<?= $userdetails['id']; ?>" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="View Profile">
                            <div class="card">
                                <div class="card-body py-4 px-5">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <img src="assets/images/faces/<?= $userdetails['logo']; ?>.jpg" alt="Face 1">
                                        </div>
                                        <div class="ms-3 name">
                                            <h5 class="font-bold"><?= $userdetails['fname']; ?></h5>
                                            <h6 class="text-muted mb-0">@<?=$userdetails['email']; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        

                        <div class="card">
                            <div class="card-header">
                                <h4>Recent Sales</h4>
                            </div>
                            <div class="card-content pb-4">

                                <?php include_once ('functions/index-sales.php'); ?>
                                <div class="px-4">
                                    <a class='btn btn-block btn-xl btn-outline-primary font-bold mt-3' href="sales-point2.php">Point of Sales</a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Last Month/This month</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php include_once ('footer.php'); ?>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    
    <script>
        var optionsProfileVisit = {
            annotations: {
                position: 'back'
            },
            dataLabels: {
                enabled:false
            },
            chart: {
                type: 'bar',
                height: 300
            },
            fill: {
                opacity:1
            },
            plotOptions: {
            },
            series: [{
                name: 'Sales',
                data: [<?= $barValues[0]; ?>,<?= $barValues[1]; ?>,<?= $barValues[2]; ?>,<?= $barValues[3]; ?>,<?= $barValues[4]; ?>,<?= $barValues[5]; ?>,<?= $barValues[6]; ?>,<?= $barValues[7]; ?>,<?= $barValues[8]; ?>,<?= $barValues[9]; ?>,<?= $barValues[10]; ?>,<?= $barValues[11]; ?>]
            }],
            colors: '#435ebe',
            xaxis: {
                categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"],
            },
        }
        let optionsVisitorsProfile  = {
            series: [<?= $values[2]; ?>, <?= $values[0]; ?>],
            labels: ['<?= $values[3]; ?>', '<?= $values[1]; ?>'],
            colors: ['#435ebe','#55c6e8'],
            chart: {
                type: 'donut',
                width: '100%',
                height:'350px'
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '30%'
                    }
                }
            }
        }
    </script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>