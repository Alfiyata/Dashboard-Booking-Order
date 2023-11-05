<section class="content-header">
    <h1>
    Booking
    <small>Booking order</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Booking</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="pull-right" style="margin-right:20px;">
                <a href="<?=site_url('order')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                    <form action="<?=site_url('order/create')?>" method="post" target="_blank">
                    <div class="col-md-12" style="margin-bottom:30px;">
                    <h1>Invoice Code</h1>
                        <input type="text" name="invoice" id="invoice" value="<?= $invoice ?>" class="form-control" readonly>
                    </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Date Booking</label>
                                <input type="datetime-local" name="datetime" id="datetime" value="<?= date('Y-m-d\TH:i') ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name Booking</label>
                                <input type="text" name="booking_name" id="booking_name" value="<?= $this->fungsi->user_login()->name ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Type Booking*</label>
                                <select name="typebooking" id="typebooking" class="form-control" onchange="change()" required>
                                <option disabled selected value>Empty</option>'
                                <?php foreach ($item as $itm => $value) {
                                                echo '<option value="' . $value->item_id . '|' . $value->price . '">' . $value->name . '</option>';
                                            } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Person Booking</label>
                                <input name="person_booking" type="number" id="person_booking" value="1" min="1" class="form-control" onchange="change()">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Grand Total</label>
                                <input type="number" name="grand_total" id="grand_total" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    change = () => {
        let price = $('#typebooking').val()
        let priceArray = price.split("|");
        let secondPart = priceArray[1];
        let qty = $('#person_booking').val()
        $('#grand_total').val(qty * secondPart)
    }

    reset = () => {
        $('#grand_total').val('')
        $('#person_booking').val(1)
    }
</script>