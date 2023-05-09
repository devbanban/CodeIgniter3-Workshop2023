<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มแก้ไขข้อมูลบุคลากร
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php echo validation_errors(); ?>

                        <form action="<?=site_url('personnel/editData');?>" method="post" class="form-horizontal">

                            <div class="form-group">
                                <div class="col-sm-1 control-label">Level</div>
                                <div class="col-sm-3">
                                    <select name="personnel_level" class="form-control" required>
                                        <?php 
                                         
                                        if($rsedit->personnel_level == 'A'){
                                            $personnel_level = 'ผู้ดูแลระบบ';
                                        } else if($rsedit->personnel_level == 'T'){
                                            $personnel_level = 'อาจารย์';
                                        }else{
                                            $personnel_level = 'บุคลากร';
                                        }

                                        ?>
                                        <option value="<?=$rsedit->personnel_level;?>">-<?=$personnel_level;?></option>
                                        <option disabled>-เลือกข้อมูลใหม่- </option>
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
                                  <input type="email" name="username" class="form-control" value="<?php echo $rsedit->username;?>" disabled placeholder="email บุคลากร">
                                </div>
                            </div>
 
                        
                        <div class="form-group">
                                <div class="col-sm-1 control-label">ตำแหน่ง</div>
                                <div class="col-sm-3">
                                    <select name="ref_position_id" class="form-control" required>
                                        <option value="<?=$rsedit->position_id;?>">-<?=$rsedit->position_name;?></option>
                                        <option disabled>-เลือกข้อมูลใหม่- </option>
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
                                        <option value="<?=$rsedit->prefix_id;?>">-<?=$rsedit->prefix_name;?></option>
                                        <option disabled>-เลือกข้อมูล- </option>
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
                                  <input type="text" name="name" class="form-control" required placeholder="ชื่อ" value="<?php echo $rsedit->name;?>" >
                                    <span class="fr"><?php echo form_error('name'); ?></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-1 control-label">นามสกุล</div>
                                <div class="col-sm-3">
                                  <input type="text" name="lastname" class="form-control"  required placeholder="นามสกุล" value="<?php echo $rsedit->lastname;?>" >
                                    <span class="fr"><?php echo form_error('lastname'); ?></span>
                                </div>
                            </div>


                             <div class="form-group">
                                <div class="col-sm-1 control-label">เบอร์โทร.</div>
                                <div class="col-sm-3">
                                  <input type="text" name="phone" class="form-control" minlength="4" maxlength="10"   required placeholder="เบอร์โทร" value="<?php echo $rsedit->phone;?>" >
                                    <span class="fr"><?php echo form_error('phone'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-2">
                                     <input type="hidden" name="personnel_id" value="<?php echo $rsedit->personnel_id;?>" >
                                    <span class="fr"><?php echo form_error('personnel_id '); ?></span>
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