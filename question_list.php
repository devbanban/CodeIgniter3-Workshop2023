<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    รายการคำถาม
    <a href="<?=site_url('question/adding');?>" class="btn btn-primary"> +ข้อมูล </a>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr class="danger">
                  <th width="5%">ID</th>
                  <th width="15%">รูปแบบ</th>
                  <th width="75%">คำถาม</th>
                  <th width="5%">แก้ไข</th>
                  <th width="5%">ลบ</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs as $row) { ?>
                <tr>
                  <td align="center"><?=$row->id_question ;?></td>
                  <td><?php 
                  if($row->group_question == 1){
                    echo 'เกณฑ์คะแนน 1 - 5';
                  }else{
                    echo 'คำถามปลายเปิด';
                  }
                  ?></td>
                  <td><?=$row->name_question;?></td>
                  <td><a href="<?=site_url('question/edit/'.$row->id_question);?>" class="btn btn-warning btn-xs">แก้ไข</a></td>
                  <td><a href="<?=site_url('question/delete/'.$row->id_question);?>" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยันการลบข้อมูล ?');">ลบ</a></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
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