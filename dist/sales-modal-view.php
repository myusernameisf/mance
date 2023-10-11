<!-- View Sales Modal -->
<div class="modal fade" id="viewSalesModal<?= $data['sale_ID']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="viewSalesModal<?= $data['sale_ID']; ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewSalesModal<?= $data['sale_ID']; ?>Title">View Sales
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php include ('functions/sales-data.php'); ?>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Date: </label>
                        <input type="text" name="date" value="<?= date('F d, Y'); ?>" placeholder="Date" value="<?= $sales['sale_date']; ?>"
                        class="form-control" required readonly>
                    </div>
                    <div class="col-sm-6">
                        <label>Receipt No.: </label>
                        <input type="number" name="receipt-no" placeholder="Receipt No." value="<?= $sales['sale_receiptno']; ?>"
                        class="form-control" required readonly>
                    </div>
                </div>
                <hr>
                <label for="">Products</label>
                <div class="container"> 
                    
                    <div class="row" id="heading"> 
                        <div class="col-2 border p-2"><b>Product Code</b></div> 
                        <div class="col-2 border p-2"><b>Product Name</b></div> 
                        <div class="col-2 border p-2"><b>Qty(Return)</b></div> 
                        <div class="col-2 border p-2"><b>Price</b></div> 
                        <div class="col-2 border p-2"><b>Total</b></div> 
                        <div class="col-2 border p-2"></div> 
                    </div> 
                    <?php $saleid = $data['sale_ID']; ?>
                    <?php include ('functions/sales-table.php'); ?>
                </div> 

                <hr>

                
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>User: </label>
                        <input type="text" name="" placeholder="User" value="<?= $sales['acc_firstname'].' '.$sales['acc_lastname']; ?>"
                        class="form-control" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label>Customer: </label>
                        <input type="text" name="customer" placeholder="Customer" value="<?= $sales['sale_customer']; ?>"
                        class="form-control" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Payment Method: </label>
                        <input type="text" name="payment-method" placeholder="Payment Method" value="<?= $sales['sale_pm']; ?>"
                        class="form-control" required readonly>
                    </div>
                    <div class="col-sm-6">
                        <label>Paid: </label>
                        <input type="text" name="paid" placeholder="Paid" value="<?= number_format($sales['sale_paid']); ?>"
                        class="form-control" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Total: </label>
                        <input type="text" name="total" placeholder="Total" value="<?= number_format($totalValue,2); ?>"
                        class="form-control" readonly>
                    </div>
                    <?php $change = $sales['sale_paid'] - $totalValue; ?>
                    <div class="col-sm-6">
                        <label>Change: </label>
                        <input type="text" name="change" placeholder="Change" value="<?= number_format($change,2); ?>"
                        class="form-control" readonly>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <a type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </a>
            </div>
        </div>
    </div>
</div>



