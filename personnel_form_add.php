<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มเพิ่มข้อมูลบุคลากร
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="<?=site_url('personnel/addData');?>" method="post" class="form-horizontal">

                            <div class="form-group">
                                <div class="col-sm-1 control-label">Level</div>
                                <div class="col-sm-3">
                                    <select name="personnel_level" class="form-control" required>
                                        <option value="">-เลือกข้อมูล- </option>
                                        <option value="A">-ผู้ดูแลระบบ</option>
                                        <option value="T">-อาจารย์</option>
                                        <option value="S">-บุคลากร</option>
                                    </select>
                                    <span class="fr"><?php echo form_error('personnel_level'); ?></span>
                                </div>
                            </div>



                        <div class="form-group">
                                <div class="col-sm-1 control-label">Username</div>
                                <div class="col-sm-3">
                                  <input type="email" name="username" class="form-control" value="<?php echo set_value('username'); ?>" required placeholder="email บุคลากร">
                                    <span class="fr"><?php echo form_error('username'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-1 control-label">Password</div>
                                <div class="col-sm-3">
                                  <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" required placeholder="Password">
                                    <span class="fr"><?php echo form_error('password'); ?></span>
                                </div>
                            </div>
                        
                        
                        <div class="form-group">
                                <div class="col-sm-1 control-label">ตำแหน่ง</div>
                                <div class="col-sm-3">
                                    <select name="ref_position_id" class="form-control" required>
                                        <option value="">-เลือกข้อมูล- </option>
                                        <?php foreach($rsPo AS $rsPo){ ?>
                                        <option value="<?=$rsPo->position_id;?>">-<?=$rsPo->position_name;?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="fr"><?php echo form_error('ref_position_id'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-1 control-label">คำนำหน้าชื่อ</div>
                                <div class="col-sm-3">
                                    <select name="ref_prefix_id" class="form-control" required>
                                        <option value="">-เลือกข้อมูล- </option>
                                        <?php foreach($rsPre AS $rsPre){ ?>
                                        <option value="<?=$rsPre->prefix_id;?>">-<?=$rsPre->prefix_name;?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="fr"><?php echo form_error('ref_prefix_id'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-1 control-label">ชื่อ</div>
                                <div class="col-sm-3">
                                  <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" required placeholder="ชื่อ">
                                    <span class="fr"><?php echo form_error('name'); ?></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-1 control-label">นามสกุล</div>
                                <div class="col-sm-3">
                                  <input type="text" name="lastname" class="form-control" value="<?php echo set_value('lastname'); ?>" required placeholder="นามสกุล">
                                    <span class="fr"><?php echo form_error('lastname'); ?></span>
                                </div>
                            </div>


                             <div class="form-group">
                                <div class="col-sm-1 control-label">เบอร์โทร.</div>
                                <div class="col-sm-3">
                                  <input type="text" name="phone" class="form-control" minlength="4" maxlength="10" value="<?php echo set_value('phone'); ?>" required placeholder="เบอร์โทร">
                                    <span class="fr"><?php echo form_error('phone'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
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