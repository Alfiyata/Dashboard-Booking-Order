<section class="content-header">
    <h1>
    Items
    <small>Item Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Items</li>
    </ol>
</section>

<section class="content">
<?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <div class="pull-right" style="margin-right:20px;">
                <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
            <h3 class="box-tittle" style="margin-left:20px;"><?=ucfirst($page)?> Items</h3>
        </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                    <?php echo form_open_multipart('item/process') ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Barcode*</label>
                                <input type="hidden" name="id" value="<?=$row->item_id?>">
                                <input type="text" name="barcode" id="barcode" class="form-control" value="<?=$row->barcode?>" required>
                            </div>
                            <div class="form-group">
                                <label for="product_name">Product Name*</label>
                                <input type="text" name="product_name" id="product_name" class="form-control" value="<?=$row->name?>" required>
                            </div>
                            <div class="form-group">
                                <label>Category*</label>
                                <select name="category" class="form-control" required>
                                    <option value="">-Pilih-</option>
                                    <?php foreach($category->result()as $key => $data) { ?>
                                        <option value="<?=$data->category_id?>" <?=$data->category_id == $row->category_id ? "selected" : null ?>><?=$data->name?></option>
                                        
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Unit*</label>
                                <?php echo form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control', 'required' => 'required']) ?>
                            </div>
                            <div class="form-group">
                                <label>Price*</label>
                                <input type="number" name="price" id="price" class="form-control" value="<?=$row->price?>" required>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <?php if($page == 'edit') {
                                    if($row->image != null){ ?>
                                        <div style="margin-bottom: 5px">
                                        <img src="<?=base_url('uploads/product/'.$row->image)?>" style="width:100px">
                                        </div>
                                    <?php
                                    }
                                } ?>
                                <input type="file" name="image" id="price" class="form-control" value="">
                                <small>(Biarkan kosong jika tidak <?=$page == 'edit' ? 'diganti' : 'ada' ?>)</small>
                            </div>
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">Save</button>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>