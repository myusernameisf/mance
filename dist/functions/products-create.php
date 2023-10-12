<?php
    $productcode = $_POST['product-code'];
    $name = strtoupper($_POST['name']);
    $category = $_POST['category'];
    $desc = $_POST['desc'];
    $uom = strtoupper($_POST['uom']);
    $lowstock = $_POST['low-stock'];
    $receiptno = strtoupper($_POST['receipt-no']);
    $supplier = strtoupper($_POST['supplier']);
    $unitprice = $_POST['unit-price'];
    $sellingprice = $_POST['selling-price'];
    $qty = $_POST['qty'];
    $date = $_POST['date'];

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT prd_ID FROM tblproducts WHERE prd_name = ? AND prd_code = ? AND prd_isTrash = ?");
    $stmt->execute([$name,$productcode,0]);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $stmt = $connection->prepare("INSERT INTO tblproducts 
        (prd_code,prd_name,prd_uom,prd_category,prd_unitprice,prd_sellingprice,prd_lowstock,prd_qty,prd_desc) 
        VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$productcode,$name,$uom,$category,$unitprice,$sellingprice,$lowstock,$qty,$desc]);
        $stmt = $connection->prepare("INSERT INTO tblexpenses (exp_supplier,exp_receiptno,exp_qty,exp_unitprice,exp_productCode,exp_productName,exp_date) 
        VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([$supplier,$receiptno,$qty,$unitprice,$productcode,$name,$date]);
        include_once ('connection-close.php');
        echo '<script>window.location.assign("../products-table.php?product-added-success");</script>';
    } else {
        echo '<script>window.location.assign("../products-table.php?product-exists");</script>';
    }
    
    

?>