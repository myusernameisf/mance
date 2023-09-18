<?php
    
    $date = $_POST['date'];
    $supplier = strtoupper($_POST['supplier']);
    $receiptno = $_POST['receipt-no'];
    $productid = $_POST['product-id'];
    $qty = $_POST['qty'];
    $unitprice = $_POST['unit-price'];
    $id = $_POST['update-expense-id'];


    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblexpenses SET exp_productID = ?, exp_receiptno = ?, exp_supplier = ?, exp_qty = ?, exp_unitprice = ?, exp_date = ? WHERE exp_ID = ?");
    $stmt->execute([$productid,$receiptno,$supplier,$qty,$unitprice,$date,$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../expenses-table.php?update-success");</script>';
    
?>