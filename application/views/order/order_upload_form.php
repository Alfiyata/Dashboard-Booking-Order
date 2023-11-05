<section class="content-header">
    <h1>
        Upload Bukti Transfer
        <small>Order Upload</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Order Upload Transfer</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="pull-right" style="margin-right:20px;">
                <a href="<?= site_url('category') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <?php echo form_open_multipart('order/upload_transfer_file') ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- <label>Image</label> -->
                            <input type="hidden" name="order_id" id="order_id" class="form-control" value="<?= $order_id ?>">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" id="price" class="form-control" value="">
                        </div>
                        <button type="submit" class="btn btn-success btn-flat">Upload</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>