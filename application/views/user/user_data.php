<section class="content-header">
    <h1>
        User
        <small>Data User</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">User</li>
    </ol>
</section>

<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-tittle">Data User</h3>
            <div class="pull-right">
                <a href="<?= site_url('user/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create Manual User
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <div class="col-xs-12 table-responsive" style="align-items:center; justify-content:center;">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->username ?></td>
                                <td><?= $data->name ?></td>
                                <td><?= $data->address ?></td>
                                <td><?= $data->phone ?></td>
                                <td><?= $data->gender == 1 ? "Male" : "Female" ?></td>
                                <td><?= $data->level == 1 ? "Super Admin" : "User" ?></td>
                                <td class="text-center" width="160px">
                                    <form action="<?= site_url('user/delete') ?>" method="post">
                                        <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-primary btn-xs btn-flat">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                        <button onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-xs btn-flat">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>