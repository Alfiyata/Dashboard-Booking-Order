<section class="content-header">
    <h1>
    Reporting
    <small>Reporting order</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Reporting</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="pull-right" style="margin-right:20px;">
                <a href="<?=site_url('order')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                    <form action="<?=site_url('order/data_report')?>" method="post" target="_blank">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" disabled min>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Download</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    $(function() {
        $('#start_date').on('change', function() {
            var startDate = $(this).val();
            $('#end_date').removeAttr('disabled').attr('min', startDate);
        });
    });

</script>