<section class="content-header">
    <h1>
    Items
    <small>Data barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Items</li>
    </ol>
</section>

<?php if ($this->session->userdata('user_id')) { ?>
<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-tittle">Data Product Items</h3>
            <div class="pull-right">
                <a href="<?=site_url('item/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create Product Item
                </a>
            </div>
        </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <!-- <th>Stock</th> -->
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?= $no++ ?></td>
                        <td><?=$data->barcode?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->category_name?></td>
                        <td><?=$data->unit_name?></td>
                        <td><?=$data->price?></td>
                        <!-- <td><?=$data->stock?></td> -->
                        <td>
                            <?php if($data->image != null){ ?>
                                <img src="<?=base_url('uploads/product/'.$data->image)?>" style="width:100px">
                            <?php } ?>
                        </td>
                        <td class="text-center"width="160px">
                            <a href="<?=site_url('item/edit/'.$data->item_id)?>" class="btn btn-primary btn-xs btn-flat">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <a href="<?=site_url('item/delete/'.$data->item_id)?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-xs btn-flat">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php } else { ?>
    <section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-tittle">Data Product Items</h3>
            <div class="pull-right">
                <a href="<?=site_url('item/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create Product Item
                </a>
            </div>
        </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach($user_id->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?= $no++ ?></td>
                        <td><?=$data->barcode?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->category_name?></td>
                        <td><?=$data->unit_name?></td>
                        <td><?=$data->price?></td>
                        <td><?=$data->stock?></td>
                        <td>
                            <?php if($data->image != null){ ?>
                                <img src="<?=base_url('uploads/product/'.$data->image)?>" style="width:100px">
                            <?php } ?>
                        </td>
                        <td class="text-center"width="160px">
                            <a href="<?=site_url('item/edit/'.$data->item_id)?>" class="btn btn-primary btn-xs btn-flat">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <a href="<?=site_url('item/delete/'.$data->item_id)?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-xs btn-flat">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php } ?>