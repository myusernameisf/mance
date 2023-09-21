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
                $stmt = $connection->prepare("SELECT inv_qty FROM tblinventory WHERE inv_ID = ?");
                $stmt->execute([$data['pos_invID']]);
                $qtys = $stmt->fetch();
                $newQty = $qtys['inv_qty'] - $data['pos_qty'];
                $stmt = $connection->prepare("UPDATE tblinventory SET inv_qty = ? WHERE inv_ID = ?");
                $stmt->execute([$newQty,$data['pos_invID']]);
    
                $stmt = $connection->prepare("INSERT INTO tblsalesitem 
                (item_receiptno,item_invID,item_qty,item_sellingPrice,item_unitprice,item_date) VALUES (?,?,?,?,?,?)");
                $stmt->execute([$receiptno,$data['pos_invID'],$data['pos_qty'],$data['pos_sellingPrice'],$data['pos_unitprice'],$date]);
            }
            
            $stmt = $connection->prepare("INSERT INTO tblsales 
            (sale_userID,sale_date,sale_customer,sale_pm,sale_paid,sale_receiptno) VALUES (?,?,?,?,?,?)");
            $stmt->execute([$userid,$date,$customer,$paymentmethod,$paid,$receiptno]);
    
            $stmt = $connection->prepare("DELETE FROM tblpos WHERE pos_userID = ?");
            $stmt->execute([$userid]);
    
            include_once ('connection-close.php');
            echo '<script>window.location.assign("../sales-data.php?receiptno='.$receiptno.'");</script>';
        } else {
            echo '<script>window.location.assign("../sales-point.php?no-products");</script>';
        }
    } else {
        echo '<script>window.location.assign("../sales-point.php?receiptno-exists");</script>';
    }
    
    
    

?>