<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มแก้ไขคำถาม
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="<?=site_url('question/editData');?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-1 control-label">คำถาม</div>
                                <div class="col-sm-7">
                                    <textarea name="name_question" cols="30" rows="2" class="form-control" placeholder="คำถาม" required><?php echo $rsedit->name_question; ?></textarea>
                                    <span class="fr"><?php echo form_error('name_question'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-2">
                                    <input type="hidden" name="id_question" value="<?php echo $rsedit->id_question;?>">
                                    <span class="fr"><?php echo form_error('id_question'); ?></span>
                                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->