<?php
    $supplier = strtoupper($_POST['supplier']);
    $receiptno = strtoupper($_POST['receipt-no']);
    $qty = $_POST['qty'];
    $rqty = $_POST['rqty'];
    $unitprice = $_POST['unit-price'];
    $productcode = $_POST['product-code'];
    $productname = $_POST['product-name'];
    $uom = $_POST['uom'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $id = $_POST['id'];

    include_once ('connection-open.php');
    $stmt = $connection->prepare("INSERT INTO tblexpenses (exp_supplier,exp_receiptno,exp_qty,exp_unitprice,exp_productCode,exp_productName,exp_date) 
    VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([$supplier,$receiptno,$qty,$unitprice,$productcode,$productname,$date]);
    $newQty = $qty + $rqty;
    $stmt = $connection->prepare("UPDATE tblproducts SET prd_unitprice = ?, prd_qty = ? WHERE prd_ID = ?");
    $stmt->execute([$unitprice,$newQty,$id]);
    
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../products-table.php?update-success");</script>';
?>