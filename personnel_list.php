<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            รายการข้อมูลบุคลากร
            <a href="<?=site_url('personnel/adding');?>" class="btn btn-primary"> +ข้อมูล </a>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                    <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="danger">
                                        <th width="5%">No.</th>
                                        <th width="15%">ตำแหน่ง</th>
                                        <th width="25%">ชื่อ-สกุล</th>
                                        <th width="15%">เบอร์โทร.</th>
                                        <th width="20%">อีเมล</th>
                                        <th width="7%">แก้รหัส</th>
                                        <th width="5%">แก้ไข</th>
                                        <th width="5%">ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rs as $row) { ?>
                                        <tr>
                                            <td><?=$row->personnel_id;?></td>
                                            <td><?=$row->position_name;?></td>
                                            <td><?=$row->prefix_name.$row->name.' '.$row->lastname;?></td>
                                            <td><?=$row->phone;?></td>
                                            <td><?=$row->username;?></td>
                                            <td><a href="" class="btn btn-info btn-xs">แก้รหัส</a></td>
                                            <td><a href="<?=site_url('personnel/edit/'.$row->personnel_id);?>" class="btn btn-warning btn-xs">แก้ไข</a></td>
                                            <td><a href="" class="btn btn-danger btn-xs">ลบ</a></td>
                                            
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                         </div>
    
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