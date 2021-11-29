<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog-token">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add New Token</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="token_process.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="invoice_no" class="control-label">Invoice Number</label>
                            <input type="text" class="form-control" id="invoice_no" name="invoice_no" required>
                        </div>
                        <div class="col-md-3">
                            <label for="datepicker_add" class="control-label">Order Date</label>
                            <div class='input-group date'>
                                <input type="text" autocomplete="off" class="form-control" id="datepicker_add" name="order_date" required>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="product_code" class="control-label">Product Code</label>
                            <input type="text" class="form-control" id="product_code" name="product_code" required>
                        </div>
                        <div class="col-md-4">
                            <label for="color" class="control-label">Color</label>
                            <input type="text" class="form-control" id="color" name="color">
                        </div>
                    </div>
                    <h4 style="margin-top: 30px; font-weight: 600; text-decoration: underline;">Measurement</h4>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="length" class="control-label">Length</label>
                            <input type="text" class="form-control" id="length" name="length" placeholder="Enter Value in Inches">
                        </div>
                        <div class="col-md-4">
                            <label for="body" class="control-label">Body</label>
                            <input type="text" class="form-control" id="body" name="body" placeholder="Enter Value in Inches">
                        </div>
                        <div class="col-md-4">
                            <label for="sleeve" class="control-label">Sleeve</label>
                            <input type="text" class="form-control" id="sleeve" name="sleeve" placeholder="Enter Value in Inches">
                        </div>
                    </div>
                    <h4 style="margin-top: 30px; font-weight: 600; text-decoration: underline;">Working Status</h4>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="cutting" class="control-label">Cutting Assigned To</label>
                            <select class="form-control" name="cutting" id="cutting">
                                <option value="" selected>- Select -</option>
                                <?php
                                $sql = "SELECT * FROM cutting_master";
                                $query = $conn->query($sql);
                                while ($prow = $query->fetch_assoc()) {
                                    echo "
                                                        <option value='" . $prow['name'] . "'>" . $prow['name'] . "</option>
                                                         ";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="embroidery" class="control-label">Embroidery Assigned To</label>
                            <select class="form-control" name="embroidery" id="embroidery">
                                <option value="" selected>- Select -</option>
                                <?php
                                $sql = "SELECT * FROM embroidery_master";
                                $query = $conn->query($sql);
                                while ($prow = $query->fetch_assoc()) {
                                    echo "
                                                        <option value='" . $prow['name'] . "'>" . $prow['name'] . "</option>
                                                         ";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="swing" class="control-label">Swing Assigned To</label>
                            <select class="form-control" name="swing" id="swing">
                                <option value="" selected>- Select -</option>
                                <?php
                                $sql = "SELECT * FROM swing_master";
                                $query = $conn->query($sql);
                                while ($prow = $query->fetch_assoc()) {
                                    echo "
                                                        <option value='" . $prow['name'] . "'>" . $prow['name'] . "</option>
                                                         ";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="note" class="control-label">Note</label>
                            <textarea class="form-control" name="note" id="note" cols="30" rows="4"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Add Now</button>
                </form>
            </div>
        </div>
    </div>
</div>