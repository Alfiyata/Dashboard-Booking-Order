<section class="content-header">
    <h1>
    unit
    <small>Unit Satuan Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">unit</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="pull-right" style="margin-right:20px;">
                <a href="<?=site_url('unit')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
            <h3 class="box-tittle" style="margin-left:20px;"><?=ucfirst($page)?> unit</h3>
        </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                    <form action="<?=site_url('unit/process')?>" method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">unit Name*</label>
                                <input type="hidden" name="id" value="<?=$row->unit_id?>">
                                <input type="text" name="unit_name" id="unit_name" class="form-control" value="<?=$row->name?>" required>
                            </div>
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>