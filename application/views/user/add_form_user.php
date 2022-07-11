<section class="content-header">
    <h1>
    Add Admin
    <small></small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">User data</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="pull-right" style="margin-right:20px;">
                <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
            <h3 class="box-tittle" style="margin-left:20px;">Add User</h3>
        </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                    <form action="" method="post">
                        <div class="col-md-6">
                            <div class="form-group <?=form_error('fullname') ? 'has-error' : null ?>">
                                <label for="name">Name*</label>
                                <input type="text" name="fullname" id="fullname" class="form-control" value="<?=set_value('fullname') ?>">
                                <span class="help-block"><?=form_error('fullname')?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?=form_error('user_name') ? 'has-error' : null ?>">
                                <label for="name">User Name*</label>
                                <input type="text" name="user_name" id="user_name" class="form-control" value="<?=set_value('user_name') ?>">
                                <span class="help-block"><?=form_error('user_name')?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                                <label for="name">Password*</label>
                                <div class="icon-show-pass">
                                    <i class="fa fa-eye-slash text-muted"></i>
                                </div>
                                <input type="password" name="password" id="password" class="form-control password-input" value="<?=set_value('password') ?>">
                                <span class="help-block"><?=form_error('password')?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?=form_error('repassword') ? 'has-error' : null ?>">
                                <label for="name">Password Confirmation*</label>
                                <div class="icon-show-pass2">
                                    <i class="fa fa-eye-slash text-muted"></i>
                                </div>
                                <input type="password" name="repassword" id="repassword" class="form-control password-input2">
                                <span class="help-block"><?=form_error('repassword')?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Address</label>
                                <textarea name="address" id="address" class="form-control" value="<?=set_value('address') ?>"></textarea>
                                <?=form_error('address')?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?=form_error('level') ? 'has-error' : null ?>">
                                <label for="name">Level*</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="1" <?=set_value('level') == 1 ? "selected" : null ?>>Super Admin</option>
                                    <option value="2" <?=set_value('level') == 2 ? "selected" : null ?>>Admin</option>
                                </select>
                                <span class="help-block"><?=form_error('level')?></span>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Save</button>
                                <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    //password1
    const passwordInput = document.querySelector(".password-input");
    const eyeBtn = document.querySelector(".icon-show-pass");
    const passwordInput2 = document.querySelector(".password-input2");
    const eyeBtn2 = document.querySelector(".icon-show-pass2");
    eyeBtn.addEventListener("click", () => {
        if(passwordInput.type === "password")
        {
            passwordInput.type = "text";
            eyeBtn.innerHTML = "<i class='fa fa-eye'></i>";
        }
        else
        {
            passwordInput.type = "password";
            eyeBtn.innerHTML = "<i class='fa fa-eye-slash'></i>";
        }
        });
    // password2
    eyeBtn2.addEventListener("click", () => {
        if(passwordInput2.type === "password")
        {
            passwordInput2.type = "text";
            eyeBtn2.innerHTML = "<i class='fa fa-eye'></i>";
        }
        else
        {
            passwordInput2.type = "password";
            eyeBtn2.innerHTML = "<i class='fa fa-eye-slash'></i>";
        }
        });
</script>