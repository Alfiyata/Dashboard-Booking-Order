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
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Booking</th>
                        <th>Type Booking</th>
                        <th>Date Booking</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <!-- <tbody>
                    <?php
                    $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?></td>
                            <td><?= $data->barcode ?></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->category_name ?></td>
                            <td><?= $data->unit_name ?></td>
                            <td><?= $data->price ?></td>
                            <td><?= $data->stock ?></td>
                            <td>
                                <?php if ($data->image != null) { ?>
                                    <img src="<?= base_url('uploads/product/' . $data->image) ?>" style="width:100px">
                                <?php } ?>
                            </td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('item/edit/' . $data->item_id) ?>" class="btn btn-primary btn-xs btn-flat">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?= site_url('item/delete/' . $data->item_id) ?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-xs btn-flat">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody> -->
            </table>
        </div>
    </div>
</section>