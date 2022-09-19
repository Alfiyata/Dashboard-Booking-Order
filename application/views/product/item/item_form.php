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
                    <form action="<?=site_url('item/process')?>" method="post">
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
                                <select name="category" class="form-control">
                                    <option value="">-Pilih-</option>
                                    <?php foreach($category->result()as $key => $data) { ?>
                                        <option value="<?=$data->category_id?>"><?=$data->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Unit*</label>
                                
                            </div>
                            <div class="form-group">
                                <label>Price*</label>
                                <input type="number" name="price" id="price" class="form-control" value="<?=$row->price?>" required>
                            </div>
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>