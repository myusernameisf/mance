<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT prd_qty,prd_unitprice,prd_lowstock FROM tblproducts WHERE prd_isTrash = ?");
    $stmt->execute([0]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
    $totalInventory = 0;
    $totalLowStocks = 0;
    $totalProducts = 0;

    foreach ($datas as $data) {
        $total = $data['prd_qty'] * $data['prd_unitprice'];
        $totalInventory += $total;

        if ($data['prd_qty'] != 0) {
            $totalProducts++;
        }

        if ($data['prd_qty'] <= $data['prd_lowstock']) {
            $totalLowStocks++;
        }
        
    }
?>

<div class="col-6 col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <a href="products-table.php" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Go to Inventory">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon purple">
                            <i class="bi-list-task mt-2"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Inventory Value</h6>
                        <h6 class="font-extrabold mb-0"><?= number_format($totalInventory,2); ?></h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="col-6 col-lg-3 col-md-6">
    <div class="card">
        <a href="products-table.php" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Go to Products">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon blue">
                            <i class="bi-archive-fill mt-2"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">No. of Products</h6>
                        <h6 class="font-extrabold mb-0"><?= number_format($totalProducts); ?></h6>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="col-6 col-lg-3 col-md-6">
    <div class="card">
        <a href="inventory-low-stocks.php" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Go to Low Stocks">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon red">
                            <i class="iconly-boldBookmark"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Low Stocks</h6>
                        <h6 class="font-extrabold mb-0"><?= number_format($totalLowStocks); ?></h6>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>


<?php include_once ('connection-close.php'); ?>

    

