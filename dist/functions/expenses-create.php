<?php
    $supplier = strtoupper($_POST['supplier']);
    $receiptno = strtoupper($_POST['receipt-no']);
    $qty = $_POST['qty'];
    $supplier = strtoupper($_POST['supplier']);
    $unitprice = $_POST['unit-price'];
    $productcode = $_POST['product-code'];
    $productname = $_POST['product-name'];
    $uom = $_POST['uom'];
    $category = $_POST['category'];
    $date = $_POST['date'];

    include_once ('connection-open.php');
    $stmt = $connection->prepare("INSERT INTO tblexpenses (exp_supplier,exp_receiptno,exp_qty,exp_unitprice,exp_productCode,exp_productName,exp_date) 
    VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([$supplier,$receiptno,$qty,$unitprice,$productcode,$productname,$date]);

    $stmt = $connection->prepare("SELECT inv_qty FROM tblinventory WHERE inv_prdCode = ? AND inv_name = ? AND inv_isTrash = ?");
    $stmt->execute([$productcode,$productname,0]);
    $count = $stmt->rowCount();

    if ($count == 0) {
        $stmt = $connection->prepare("INSERT INTO tblinventory (inv_prdCode,inv_name,inv_uom,inv_prdCategory,inv_qty,inv_unitprice,inv_sellingprice) 
        VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([$productcode,$productname,$uom,$category,$qty,$unitprice,$unitprice]);
    } else {
        $invQty = $stmt->fetch();
        $newQty = $invQty['inv_qty'] + $qty;
        $stmt = $connection->prepare("UPDATE tblinventory SET inv_qty = ?, inv_unitprice = ?, inv_prdCategory = ? WHERE inv_prdCode = ? AND inv_name = ?");
        $stmt->execute([$newQty,$unitprice,$category,$productcode,$productname]);
    }
    
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../expenses-table.php?expense-added-success");</script>';
?>