<section class="content-header">
    <h1>
    Customer
    <small>Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">customers</li>
    </ol>
</section>

<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-tittle">Data customers</h3>
            <div class="pull-right">
                <a href="<?=site_url('customer/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create
                </a>
            </div>
        </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->gender?></td>
                        <td><?=$data->phone?></td>
                        <td><?=$data->address?></td>
                        <td class="text-center"width="160px">
                            <a href="<?=site_url('customer/edit/'.$data->customer_id)?>" class="btn btn-primary btn-xs btn-flat">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <a href="<?=site_url('customer/delete/'.$data->customer_id)?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-xs btn-flat">
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