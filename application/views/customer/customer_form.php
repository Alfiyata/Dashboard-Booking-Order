<section class="content-header">
    <h1>
    customer
    <small>Pemasok barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">customers</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="pull-right" style="margin-right:20px;">
                <a href="<?=site_url('customer')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
            <h3 class="box-tittle" style="margin-left:20px;"><?=ucfirst($page)?> customer</h3>
        </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                    <form action="<?=site_url('customer/process')?>" method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Customer Name*</label>
                                <input type="hidden" name="id" value="<?=$row->customer_id?>">
                                <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?=$row->name?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Gender</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="L" <?= $row->gender == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                    <option value="P" <?= $row->gender == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Phone*</label>
                                <input type="number" name="customer_phone" id="customer_phone" class="form-control" value="<?=$row->phone?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Address*</label>
                                <textarea type="text" name="customer_address" id="customer_address" class="form-control" required><?=$row->address?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>