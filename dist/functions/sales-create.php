<?php
    $userid = $_POST['userid'];
    $date = $_POST['date'];
    $customer = strtoupper($_POST['customer']);
    $paymentmethod = strtoupper($_POST['payment-method']);
    $paid = $_POST['paid'];
    $receiptno = $_POST['receipt-no'];

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * FROM tblsales WHERE sale_receiptno = ?");
    $stmt->execute([$receiptno]);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $stmt = $connection->prepare("SELECT * FROM tblpos WHERE pos_userID = ?");
        $stmt->execute([$userid]);
        $count = $stmt->rowCount();
        if ($count > 0) {
    
            $datas = $stmt->fetchAll();
            foreach ($datas as $data) {
                $stmt = $connection->prepare("SELECT prd_qty, prd_name, prd_code FROM tblproducts WHERE prd_ID = ?");
                $stmt->execute([$data['pos_invID']]);
                $qtys = $stmt->fetch();
                $newQty = $qtys['prd_qty'] - $data['pos_qty'];
                $stmt = $connection->prepare("UPDATE tblproducts SET prd_qty = ? WHERE prd_ID = ?");
                $stmt->execute([$newQty,$data['pos_invID']]);
    
                $stmt = $connection->prepare("INSERT INTO tblsalesitem 
                (item_receiptno,item_prdName,item_prdCode,item_qty,item_sellingPrice,item_unitprice,item_date) VALUES (?,?,?,?,?,?,?)");
                $stmt->execute([$receiptno,$qtys['prd_name'],$qtys['prd_code'],$data['pos_qty'],$data['pos_sellingPrice'],$data['pos_unitprice'],$date]);
            }
            
            $stmt = $connection->prepare("INSERT INTO tblsales 
            (sale_userID,sale_date,sale_customer,sale_pm,sale_paid,sale_receiptno) VALUES (?,?,?,?,?,?)");
            $stmt->execute([$userid,$date,$customer,$paymentmethod,$paid,$receiptno]);
    
            $stmt = $connection->prepare("DELETE FROM tblpos WHERE pos_userID = ?");
            $stmt->execute([$userid]);
    
            include_once ('connection-close.php');
            echo '<script>window.location.assign("../sales-point2.php?sales-success");</script>';
        } else {
            echo '<script>window.location.assign("../sales-point2.php?no-products");</script>';
        }
    } else {
        echo '<script>window.location.assign("../sales-point.php?receiptno-exists");</script>';
    }
    
    
    

?>