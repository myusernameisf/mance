<?php
    $supplier = strtoupper($_POST['supplier']);
    $receiptno = strtoupper($_POST['receipt-no']);
    $qty = $_POST['qty'];
    $supplier = strtoupper($_POST['supplier']);
    $unitprice = $_POST['unit-price'];
    $prdID = $_POST['product-id'];
    $date = $_POST['date'];

    include_once ('connection-open.php');
    $stmt = $connection->prepare("INSERT INTO tblexpenses (exp_supplier,exp_receiptno,exp_qty,exp_unitprice,exp_productID,exp_date) 
    VALUES (?,?,?,?,?,?)");
    $stmt->execute([$supplier,$receiptno,$qty,$unitprice,$prdID,$date]);

    $stmt = $connection->prepare("SELECT inv_qty FROM tblinventory WHERE inv_productID = ? AND inv_isTrash = ?");
    $stmt->execute([$prdID,0]);
    $count = $stmt->rowCount();

    if ($count == 0) {
        $stmt = $connection->prepare("SELECT prd_brandname,prd_name,prd_code FROM tblproducts WHERE prd_ID = ?");
        $stmt->execute([$prdID]);
        $productdatas = $stmt->fetch();

        $stmt = $connection->prepare("INSERT INTO tblinventory (inv_productID,inv_prdCode,inv_brandname,inv_name,inv_qty,inv_unitprice,inv_sellingprice) 
        VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([$prdID,$productdatas['prd_code'],$productdatas['prd_brandname'],$productdatas['prd_name'],$qty,$unitprice,$unitprice]);
    } else {
        $invQty = $stmt->fetch();
        $newQty = $invQty['inv_qty'] + $qty;
        $stmt = $connection->prepare("UPDATE tblinventory SET inv_qty = ?, inv_unitprice = ? WHERE inv_productID = ?");
        $stmt->execute([$newQty,$unitprice,$prdID]);
    }
    
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../expenses-table.php?expense-added-success");</script>';
?>