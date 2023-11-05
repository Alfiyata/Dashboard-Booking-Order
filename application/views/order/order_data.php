<section class="content-header">
    <h1>
        Booking
        <!-- <small>Order System</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Order</li>
    </ol>
</section>

<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-tittle">History Booking</h3>
            <div class="pull-right">
                <a href="<?= site_url('order/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create Booking
                </a>
            </div>
            <div class="pull-right" style="margin-right:20px !important;">
                <?php if ($this->fungsi->user_login()->level == 1) { ?> <!-- membatasi hak akses -->
                    <a href="<?= site_url('order/reporting') ?>" class="btn btn-success btn-flat">
                        <i class="fa fa-file"></i> Download Report
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Invoice</th>
                        <th>Type Booking</th>
                        <th>Date Booking</th>
                        <th>Total</th>
                        <th>Status</th>
                        <?php if ($this->fungsi->user_login()->level == 1) { ?> <!-- membatasi hak akses -->
                            <th <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>>
                                Bukti Transfer
                            </th>
                        <?php } ?>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($row as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?></td>
                            <td><?= $data->booking_name ?></td>
                            <td><?= $data->invoice ?></td>
                            <td><?= $data->type_name ?></td>
                            <td><?= $data->date ?></td>
                            <td><?= $data->grand_total ?></td>
                            <td><?= $data->status ?></td>
                            <td>
                                <?php if ($data->transfer_image != null) { ?>
                                    <img src="<?= base_url('uploads/orders/' . $data->transfer_image) ?>" style="width:100px">
                                <?php } ?>
                            </td>
                            <td class="text-center" width="160px">
                                <!-- <a href="<?= site_url('order/update_status/' . $data->order_id) ?>" onclick="return confirm('Are you sure you want to update the status?')" class="btn btn-success btn-xs btn-flat">
                                    <i class="fa fa-pencil"></i> Confirm
                                </a> -->
                                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                    <a href="<?= site_url('order/update_status/' . $data->order_id) ?>" onclick="return confirm('Are you sure you want to update the status?')" class="btn btn-success btn-xs btn-flat">
                                        <i class="fa fa-pencil"></i> Confirm
                                    </a>
                                <?php } ?>

                                <a href="<?= site_url('order/upload_transfer/' . $data->order_id) ?>" class="btn btn-primary btn-xs btn-flat">
                                    <i class="fa fa-pencil"></i> Upload Bukti Transfer
                                </a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>